<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;

class code extends Controller
{
    public function verifyCode(Request $request,$id){
        $code = DB::table('codes')->select('user_code')->where('user_id',$id)->get();
        
        if($request->code == $code[0]->user_code){
            return redirect('/');
        }else{
            return '<script type="text/javascript">alert("Codigo incorrecto!");</script>';
        }
    }
}
