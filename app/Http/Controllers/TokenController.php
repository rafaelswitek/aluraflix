<?php

namespace App\Http\Controllers;

use App\Models\User;
use Firebase\JWT\JWT;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TokenController extends Controller
{

    public function createToken(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $user = User::where('email', $request->email)->first();



        if (is_null($user) || !Hash::check($request->password, $user->password)) {
            return response()->json('Usuário ou senha inválidos!', 401);
        }

        $token = JWT::encode(['email' => $user->email], env('JWT_KEY'));

        return response()->json([
            'access_token' => $token
        ], 401);
    }
}
