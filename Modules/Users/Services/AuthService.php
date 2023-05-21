<?php

namespace Modules\Users\Services;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\DB;
use Modules\Users\Entities\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class AuthService
{   

    /**
     * Creating new user
     * 
     * @param array $userData
     * @return User
     */
    public function createUser(array $userData) : User
    {
        return User::create($userData);
    }
}
