<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\User;
Use \stdClass;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class AuthController extends Controller
{
    //

    public function register(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8'
        ]);

        if($validator->fails()){
            return response()->json([
                 'type_response' => '0',
                 'No se puede usar este email, ya se encuentra registrado.'
            ]);
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'type_response' => '1',
            'data' => $user, 'access_token' => $token, 'token_type' => 'Bearer'
        ]);
    }

    public function getUserWithID(Request $request){
        $user = User::where('id', $request->UserID)->first();
        return response()->json([
            'type_response' => '1',
            'user' => $user,
        ]);
    }


    Public function login(Request $request)
    {
        if(!Auth::attempt($request->only('email', 'password'))){
            return response()->json(['type_response' => '0','message' => 'Unauthorized'], 401);
        }

        $user = User::where('email', $request['email'])->firstOrFail();
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'type_response' => '1',
            'message' => 'Bienvenido '.$user->name.' Comedor Universitario',
            'accessToken' => $token,
            'token_type' => 'Bearer',
            'user' => $user
        ]);
    }

    public function logout(){
        auth()->user()->tokens()->delete();
        return [
            'message' => 'El token ha sido eliminado correctamente' 
        ];
    }
}
