<?php

namespace App\Http\Controllers\Api\Admin\Auth;

use App\Traits\ApiResponses;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Admin\Auth\VerificationCodeRequest;
use Illuminate\Support\Facades\Auth;

class VerificationController extends Controller
{
    use ApiResponses;
    public function send(Request $request)
    {
        $admin = $request->user('sanctum');
        $token = $request->header('Authorization');
        $verification_code = rand(10000,99999);
        $admin->verification_code = $verification_code;
        $admin->save();
        // send mail
        $admin->token = $token;
        return $this->data(compact('admin'));
    }

    public function verify(VerificationCodeRequest $request)
    {
        $admin = $request->user('sanctum');
        $token = $request->header('Authorization');

        if($admin->verification_code == $request->verification_code){
            $admin->email_verified_at = date('Y-m-d H:i:s');
            $admin->save();
            $admin->token = $token;
            return $this->data(compact('admin'));
        }else{
            return $this->error(['verification_code'=>'Wrong'],"Please Try Again",401);
        }
    }
}
