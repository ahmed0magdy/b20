<?php

namespace App\Http\Controllers\Api\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Admin\Auth\RegisterRequest;
use App\Models\Admin;
use App\Traits\ApiResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    use  ApiResponses;
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(RegisterRequest $request)
    {
        // validation
        $data = $request->validated();
        $data['password'] = Hash::make($request->password);
        $admin = Admin::create($data);
        $admin->token = "Bearer ".$admin->createToken($request->device_name)->plainTextToken;
        return $this->data(compact('admin'));
    }
}
