<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'username' => 'required',
            'password' => 'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        $user = User::create([
            'username'     => $request->username,
            'password'  => bcrypt($request->password)
        ]);

        if ($user) {
            return response()->json([
                'success' => true,
                'message' => 'Selamat Anda Berhasil Registrasi',
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Anda Gagal Registrasi'
        ], 401);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'username' => 'required',
            'password' => 'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        if (!Auth::attempt($request->only('username', 'password')))
        {
            return response()->json([
                'success' => false,
                'message' => 'Username atau Password Anda salah'
            ], 401);
        }

        $user = User::where('username', $request['username'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'success' => true,
            'message' => 'Selamat Anda Berhasil Login',
            'token'   => $token
        ], 200);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        return response()->json([
            'success' => true,
            'message' => 'Selamat Anda Berhasil Logout'
        ], 200);
    }
}
