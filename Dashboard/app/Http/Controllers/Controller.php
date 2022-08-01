<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function redirectBack(bool $status)
    {
        if($status){
            return redirect()->back()->with('success','Successfull Operation');
        }else{
            return redirect()->back()->with('error','Failed Operation');
        }
    }
}
