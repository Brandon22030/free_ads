<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Mail\ForgotPasswordMail;

class emailVerify extends Controller
{

    public function showForgetPasswordForm(){

        return view('auth.forgetPassword');

    }

    public function submitForgotPasswordForm(Request $request){

        $request->validate([

            'email' => 'required|email|exists:users',

        ]);

        $token = Str::random(64);

        DB::table('password_resets')->insert([

                'email' => $request->email, 
                'token' => $token, 
                'created_at' => Carbon::now()
            
            ]);
    
            // Mail::send('email.forgetPassword', ['token' => $token], function($message) use($request){
            //     $message->to($request->email);
            //     $message->subject('Reset Password');
            // });

            $title = 'This is the reset mail';

            $body = 'Reset your password here';
    
            Mail::to('brandonmedehou2203@gmail.com')->send(new ForgotPasswordMail($title, $body));
        
            return back()->with('message', 'We have e-mailed your password reset link!');
        }


        public function ShowResetPasswordForm($token){

            return view('auth.forgetPasswordLink', ["token"=>$token]);

        }

        public function SubmitResetPasswordForm(Request $request){

            $updatePassword = DB::table('password_resets')
                            ->where([
                                'email' => $request->email, 
                                'token' => $request->token
                                ])
                            ->first();

            if(!$updatePassword){
                return back()->withInput()->with('error', 'Invalid token!');
            }

            $user = User::where('email', $request->email)
                        ->update(['password' => Hash::make($request->password)]);

            DB::table('password_resets')->where(['email'=> $request->email])->delete();

            return redirect('/login')->with('message', 'Your password has been changed!');
        }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
