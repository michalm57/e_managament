<?php

namespace Modules\Users\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Users\Services\AuthService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    /**
     * @var AuthService
     */
    protected AuthService $authService;

    public function __construct(AuthService $service)
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
        $this->authService = $service;
    }


    /**
     * Registring new user to a system.
     * 
     * @param Request $request
     * @return JsonResponse
     */
    public function register(Request $request) : JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed|min:6',
        ]);
    
        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), RESPONSE::HTTP_BAD_REQUEST);
        };
    
        $userData = array_merge(
            $validator->validated(),
            ['password' => bcrypt($request->password)],
        );
    
        $user = $this->authService->createUser($userData);

        return response()->json([
            'message' => 'User successfully registered',
            'user' => $user,
        ], RESPONSE::HTTP_OK);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), RESPONSE::HTTP_UNPROCESSABLE_ENTITY);
        };

        if (!$token = auth()->attempt($validator->validated())){
            return response()->json(['error', 'Unauthorized'], RESPONSE::HTTP_UNAUTHORIZED);
        }

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60,
            'user' => auth()->user(),
        ]);
    }

    public function user()
    {
        return response()->json(auth()->user());
    }

    public function logout()
    {
        auth()->logout();

        return response()->json([
            'message' => 'User logged out'
        ]);
    }
}
