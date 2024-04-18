<?php

namespace App\Http\Controllers;

use Mail;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PasswordResetController extends Controller
{
    public function forgetPassword()
    {
        return view('accounts.password.forget_password');
    }
    /*
    public function forgetPasswordPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(64);
        
        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now(),
        ]);

        Mail::send('emails.forget_password', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Password');        
        });

        return redirect()->to(route('forget_password'))
            ->with('success', 'We have send an email to reset password');
    }*/

    public function forgetPasswordPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        // Verificar si ya existe un registro para esta dirección de correo electrónico
        $existingToken = DB::table('password_reset_tokens')
                            ->where('email', $request->email)
                            ->first();

        // Si ya existe un registro, podrías actualizar el token en lugar de insertar uno nuevo
        if ($existingToken) {
            $token = $existingToken->token;
        } else {
            $token = Str::random(64);
            
            DB::table('password_reset_tokens')->insert([
                'email' => $request->email,
                'token' => $token,
                'created_at' => Carbon::now(),
            ]);
        }

        Mail::send('emails.forget_password', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Password');        
        });

        return redirect()->to(route('forget_password'))
            ->with('success', 'We have sent an email to reset password');
    }


    public function resetPassword($token)
    {
        return view('accounts.password.reset_password', compact('token'));
    }
    public function resetPasswordPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);

        $updatePassword = DB::table('password_reset_tokens')
            ->where([
                'email' => $request->email,
                'token' => $request->token,
            ])->first();

        if (!$updatePassword) {
            return redirect()->to(route('reset_password'))->with('error', 'Invalid');
        }

        User::where('email', $request->email)->update(['password' => Hash::make($request->password)]);
        DB::table('password_reset_tokens')->where(['email' => $request->email])->delete();

        return redirect()->to(route('login'))->with('success', 'Password reset success');
    }
}
