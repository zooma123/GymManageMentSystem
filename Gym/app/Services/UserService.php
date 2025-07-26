<?php

namespace App\Services;

use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }


    public function CreateUser(AuthRequest $request){

        $data = $request->validated();

        $data['password'] = Hash::make($data['password']);
        $data['role'] = 'user';
        $user = User::create($data);
        
        return 'success';


    }

    public function DeleteUser($userid){

$user = User::findOrfail($userid);
$user->delete();

return "success";

    }

}
