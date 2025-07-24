<?php

namespace App\Services;

use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

public Function Register(AuthRequest $request){

$data = $request->validated();

$data['password'] = Hash::make($data['password']);

    $user = User::create($data);

return 'success';


}


public Function Login (Request $request){

  $data =   $request->validate([
'email' => "string|required|email|",
'password' => "string|min:8"
    ]);
    
    if(!Auth::attempt($request->only('email' , 'password')));
    $user= User::where('email' , $request->email)->FirstOrFail();
    $token =$user->createToken('auth-Token')->plainTextToken;

   return [
"message" =>"success",
"token" => $token
   ];
    
    
    
    }
    
    







}
