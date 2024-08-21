<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\AuthRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Api\RegisterRequest;
use App\Http\Requests\Api\VerifyRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $validatedData = $request->validated();
        $verificationCode = rand(100000, 999999);

        $user = User::create(array_merge($validatedData, [
            'password' => Hash::make($validatedData['password']),
            'verification_code' => $verificationCode,
        ]));

        Log::info('Verification Code for ' . $user->email . ': ' . $verificationCode);

        $data = [
            'token' => $user->createToken('auth_token')->plainTextToken,
            'name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone,
        ];

        // Return the response
        return ApiResponse::sendResponse($data, 'User Created Successfully', 201);
    }


    public function login(AuthRequest $request)
    {

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            $user = Auth::user();

            if (!$user->email_verified_at) {
                return ApiResponse::sendResponse([], 'Account not verified', 403);
            }
            $data['token'] = $user->createToken('auth_token')->plainTextToken;
            $data['name'] = $user->name;
            $data['email'] = $user->email;
            $data['phone'] = $user->phone;

            return ApiResponse::sendResponse($data, 'User Login Successful', 200);
        }

        return ApiResponse::sendResponse([], 'Invalid credentials', 401);
    }

    public function verify(VerifyRequest $request)
    {

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return ApiResponse::sendResponse([], 'User not found', 404);
        }

        if ($user->verification_code === $request->verification_code) {
            $user->email_verified_at = now();
            $user->verification_code = null;
            $user->save();

            return ApiResponse::sendResponse([], 'Account verified successfully', 200);
        }
        return ApiResponse::sendResponse([], 'Invalid verification code', 400);
    }
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return ApiResponse::sendResponse([], 'Logged Out Successfully', 200);
    }
}