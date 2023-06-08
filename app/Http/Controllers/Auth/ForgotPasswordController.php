<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
// use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Str;
use Illuminate\Http\Request; 
use Mail; 
use DB; 
use Carbon\Carbon; 
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    // use SendsPasswordResetEmails;
    public function showForgetPasswordForm()
    {
        return view('auth.passwords.email');
    }

    public function submitForgetPasswordForm(Request $request)
    {
        $request->validate([
            'user_email' => 'required|email|exists:users',
        ]);
        $token = random_int(100000, 999999);

        $email = $request->user_email;
        DB::table('password_resets')->insert([
            'email' => $request->user_email, 
            'token' => $token, 
            'created_at' => Carbon::now()
        ]);
  
        Mail::send('auth.passwords.token', ['token' => $token], function($message) use($request){
            $message->to($request->user_email);
            $message->subject('Reset Password');
        });

        return redirect()->route('verification.password.get', compact('email'));
    }

    public function showverificationfrom() { 
        return view('auth.passwords.confirm');
    }

    public function submitverificationfrom(Request $request)
    {
        $email = $request->email;
        $users = DB::table('password_resets')
        ->where('email', '=', $email)
        ->orderBy('created_at', 'desc')
        ->limit(1)
        ->get();
        $token = $users->first()->token;
        $verification = $request->verification;
        $verification = implode("", $verification);

        if($token == $verification){
            return redirect()->route('reset.password.get');
        }else{
            return 'Salah Token';
        }
    }

    public function showResetPasswordForm() { 
        return view('auth.passwords.reset');
    }

    public function submitResetPasswordForm(Request $request)
    {
        $email = $request->user_email;
        $password = $request->user_password;

        $request->validate([
            'user_email' => 'required|email',
            'user_password' => 'required|string|min:8'
        ]);

        $user = User::where('user_email','==', $email)->update(
            ['user_password' => Hash::make($password)],
            ['user_passwordUpdateDate' => now()]
        );

        DB::table('password_resets')->where(['email'=> $email])->delete();

        return view('auth.login');
    }
}
