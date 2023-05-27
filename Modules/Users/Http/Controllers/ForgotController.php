<?php

namespace Modules\Users\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use Modules\Users\Entities\User;
use Symfony\Component\HttpFoundation\Response;
use Modules\Users\Services\UserService;

class ForgotController extends Controller
{
    /**
     * @var UserService
     */
    protected UserService $service;

    /**
     * Create a new ForgotController instance.
     *
     * @param UserService $service The UserService instance.
     * @return void
     */
    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    /**
     * Handle the forgot password request.
     *
     * @param Request $request The HTTP request object.
     * @return JsonResponse The JSON response indicating the result of the request.
     */
    public function forgot(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
        ]);

        $validatedData = $validator->validated();
        $email = $validatedData['email'];

        if (User::where('email', $email)->doesntExist()) {
            return response([
                'message' => 'User doeesn\'t exists!'
            ], Response::HTTP_NOT_FOUND);
        }

        $token = Str::random(30);

        try {
            $this->service->insertPasswordResetToken($email, $token);

            //TODO:
            // If token already exists, remove and create new.
            //Provide limits of possibility to reset password (2 per hour).
            $this->service->sendForgotPasswordEmail($email, $token);

            return response([
                'message' => 'Check your email!'
            ]);
        } catch (\Exception $exception) {
            return response([
                'message' => $exception->getMessage()
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function reset(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'token' => 'required',
            'password' => 'required|string|confirmed|min:6',
        ]);

        $data = $validator->validated();
        $token = $data['token'];

        if(!$passwordsReset = $this->service->validatePasswordResetToken($token)){
            return response([
                'message' => 'Invalid token!',
            ], Response::HTTP_BAD_REQUEST);
        }

        if(!$user = $this->service->getUserByEmail($passwordsReset->email)){
            return response([
                'message' => 'User doeesn\'t exists!',
            ], Response::HTTP_BAD_REQUEST);
        }

        $this->service->updatePassword($user, $data['password']);

        return response([
            'message' => 'Password changed successfully!',
        ], Response::HTTP_OK);
    }
}
