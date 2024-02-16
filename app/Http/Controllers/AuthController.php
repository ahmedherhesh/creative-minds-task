<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangeMyPasswordRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\VerifyCodeRequest;
use App\Http\Resources\UserResource;
use App\Models\Code;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Twilio\Rest\Client;

class AuthController extends MasterController
{
    function webLogin()
    {
        if (auth()->user())
            return redirect('home');
        return view('login');
    }
    function _webLogin(LoginRequest $request)
    {
        $user = auth()->attempt($request->only('mobile', 'password'), true);
        if ($user)
            return redirect('home');
        return redirect()->back()->with('failed', 'Your Mobile Or Password Is Not Matched');
    }
    function login(LoginRequest $request)
    {
        $token = auth('api')->attempt($request->only('mobile', 'password'), true);
        if ($token) {
            $user = auth('api')->user();
            if (!$user->mobile_verified_at)
                return response()->json([
                    'status' => 400,
                    'msg' => 'Your account is not activation'
                ]);
            else {
                $user->token = $token;
                return response()->json([
                    'status' => 200,
                    'data'   => new UserResource($user)
                ]);
            }
        }
    }
    function register(RegisterRequest $request)
    {
        $user = User::create($request->all());
        if ($user) {
            $create_code = Code::create([
                'user_id'    => $user->id,
                'code'       => rand(100000, 999999),
                'expires_at' => Carbon::now()->addMinutes(10),
            ]);
            $this->sendMsg("Your verification code {$create_code->code}", $user->mobile);
            return response()->json([
                'status' => 200,
                'msg' => 'check your mobile messages for activate your '
            ]);
        }
    }
    function profile()
    {
        $user = auth('api')->user();
        return response()->json([
            'status' => 200,
            'data'   => new UserResource($user)
        ]);
    }
    function verifyCode(VerifyCodeRequest $request)
    {
        $code = Code::whereCode($request->code)->whereUserId($request->user_id)->first();
        if (Carbon::now()->greaterThan($code->expires_at) || $code->used)
            return response()->json([
                'status' => 400,
                'msg' => 'This code is expired do you want a code again'
            ]);
        $user = User::find($request->user_id)->update(['mobile_verified_at' => now()]);
        if ($user)
            $code->update(['used' => 1]);
        return response()->json([
            'status' => 200,
            'msg' => 'Your account is activated successfully'
        ]);
    }
    function changeMyPassword(ChangeMyPasswordRequest $request)
    {
        $hashed = $this->user()->password;
        if (Hash::check($request->old_password, $hashed)) {
            $this->user()->update([
                'password' => $request->password
            ]);
            return response()->json(['status' => 200, 'msg' => 'Your password is changed successfully']);
        }
        return response()->json(['status' => 400, 'msg' => 'Incorrect old password']);
    }
    function noAuth()
    {
        return response()->json([
            'status' => 400,
            'msg'    => 'Not authorized!'
        ]);
    }
    function sendMsg($message, $recipients)
    {
        $account_sid   = env("TWILIO_SID");
        $auth_token    = env("TWILIO_AUTH_TOKEN");
        $twilio_number = env("TWILIO_NUMBER");
        $client = new Client($account_sid, $auth_token);
        $client->messages->create(
            $recipients,
            ['from' => $twilio_number, 'body' => $message]
        );
    }
    public function logout()
    {
        auth('api')->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }
}
