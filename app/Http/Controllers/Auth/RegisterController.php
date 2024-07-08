<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Hashing\BcryptHasher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();

        return view('auth.my_account', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Validation
        $input = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
            'number' => 'required|numeric|regex:/^[0-9]{8}$/'
        ]);

        // Data insert
        $user = User::create($request->all());
        Auth::login($user);

        event(new Registered($user));

        return redirect()->route('home');
    }

    public function verifyNotice()
    {

        return view('auth.verify-email');
    }

    public function verifyEmail(EmailVerificationRequest $request)
    {

        $request->fulfill();

        return redirect()->route('login');
    }

    public function verifyHandler(Request $request)
    {

        $request->user()->sendEmailVerificationNotification();

        return redirect()->back()->with('message', 'Verification link sent!');
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.register');
    }



    /**
     * Display the specified resource.
     */
    public function show()
    {
        $user = Auth::user();

        return view('auth.my_account', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $user = Auth::user();

        return view('auth.edit_user', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        // Validation
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
            'number' => 'required|numeric|regex:/^[0-9]{8}$/'
        ]);

        $user = User::find($id);
        $user->update($request->all());

        return redirect()->route('auth.my_account', ["user" => $user])->with('success', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);

        $user->delete();

        // if(Auth::guest()){

        return redirect()->route('prem_home', ["user" => $user])->with('success', 'Post deleted successfully');

        // }


    }
}
