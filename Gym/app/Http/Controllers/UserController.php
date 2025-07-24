<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\AuthService;
use App\Services\UserService;
use Exception;

class UserController extends Controller
{

protected $authservice;
protected $userservice;

public function __construct(AuthService $authservice , UserService $userservice) {
    $this->authservice =$authservice;
    $this->userservice = $userservice;
}



public function Register (AuthRequest $request){
try{
$result = $this->authservice->Register($request);
return response()->json([
"message" => $result
]);

}catch(Exception $err){

return $err->getMessage();

}
}


public function Login(Request $request)
{
try{
    $result = $this->authservice->Login($request);

    return response()->json([
$result

    ]);
}catch(Exception $ex){

return $ex->getMessage();

}
}

public Function index(){

$users =  User::all();

return response()->json([
$users
]);

}

public function CreateUser(AuthRequest $request){
try{
$result = $this->userservice->CreateUser($request);

return response()->json([
    "message" => $result
    ]);
    
    }catch(Exception $err){
    
    return $err->getMessage();
    
    }

}

public function DeleteUser($userid){
$result = $this->userservice->DeleteUser($userid);

return response()->json([
$result

]);


}
















}
