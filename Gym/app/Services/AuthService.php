<?php

namespace App\Services;

use App\Http\Requests\AuthRequest;
use App\Models\User;
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






}
