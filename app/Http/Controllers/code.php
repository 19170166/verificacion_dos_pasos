<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class code extends Controller
{
    public function verifyCode(Request $request,$id){
        $code = DB::table('codes')->select('user_code')->where('user_id',$id)->get();
        
        if(Hash::check($request->code,$code[0]->user_code)){
            DB::delete('delete from codes where user_id = ?', [$id]);
            return redirect('/');
        }else{
            return '<script type="text/javascript">alert("Codigo incorrecto!");</script>';
        }
    }
}
