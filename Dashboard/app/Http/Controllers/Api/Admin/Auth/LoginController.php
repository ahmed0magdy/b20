<?php

namespace App\Http\Controllers\Api\Admin\Auth;

use App\Models\Admin;
use App\Traits\ApiResponses;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Api\Admin\Auth\LoginRequest;

class LoginController extends Controller
{
    use ApiResponses;

    public function login(LoginRequest $request)
    {
        $admin = Admin::where('email', $request->email)->first();
        if (! $admin || ! Hash::check($request->password, $admin->password)) {
            return $this->error(['email' => 'The provided credentials are incorrect.'],"Unauthorized",401);
        }
        if(is_null($admin->email_verified_at)){
            return $this->error(['email' => 'Not Verified.'],"Unauthorized",401);
        }
        $admin->token = "Bearer ".$admin->createToken($request->device_name)->plainTextToken;
        return $this->data(compact('admin'));
    }

    public function logoutCurrentToken(Request $request)
    {
        $request->user('sanctum')->currentAccessToken()->delete();
        return $this->success("Successfull Operation");
    }

    public function logoutOtherToken(Request $request)
    {
        $array = explode('|',$request->header('Authorization'));
        $tokenId = explode(' ',$array[0])[1];
        $request->user('sanctum')->tokens()->where('id',$tokenId)->delete();
        return $this->success("Successfull Operation");
    }

    public function logoutAllTokens(Request $request)
    {
        $request->user('sanctum')->tokens()->delete();
        return $this->success("Successfull Operation");
    }
}
