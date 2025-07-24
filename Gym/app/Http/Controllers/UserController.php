<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;
use App\Services\AuthService;
use App\Services\UserService;

class UserController extends Controller
{

protected $authservice;
protected $userservice;

public function __construct(AuthService $authservice , UserService $userservice) {
    $this->authservice =$authservice;
    $this->userservice = $userservice;
}


public function Register (AuthRequest $request){





}










}
