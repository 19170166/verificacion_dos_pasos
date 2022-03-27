<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Verification;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class Login extends Controller
{
    public function LoginAction(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        $user = User::where('email', $request->email)->first();
        if(!$user||!Hash::check($request->password, $user->password)){
            throw ValidationException::withMessages([
                'correo | password' => ['Datos incorrectos']
            ]);
        }else{
            $token = $user->createToken($request->email)->plainTextToken;
            $verificacion = [
                'code'=>$this->GenCode($request)
            ];
            Mail::to($user->email)->send(new Verification($verificacion));
            return redirect('Verification-code/'.(string)$user->id);
        }
        return response()->json(['Error al realizar el token'],400);
    }

    public function GenCode(Request $request){
        $user = User::where('email', $request->email)->first();
        $code = random_int(100000, 999999);
        $codeId = random_int(100000, 999999);
        $hashCode = Hash::make($code);
        DB::table('codes')->insert([
            'user_id'=>$user->id,
            'user_code'=>$hashCode,
        ]);
        Storage::disk('digitalocean')->put($codeId.'.txt',$code);
        return $codeId;

    }
}
