<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthUserController extends ApiController
{
   public function login(Request $request)
   {
       $fields = $request->validate([
           'email' => 'required|email',
           'password' => 'required|min:6',
       ]);

       //check email
         $user = User::where('email', $fields['email'])->first();

         //check password
            if(!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Bad creds'
            ], 401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
   }
}
