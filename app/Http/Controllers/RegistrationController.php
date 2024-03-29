<?php namespace App\Http\Controllers;

use App\User;
use App\Mailers\AppMailer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegistrationController extends Controller
{
    /**
     * Create a new registration instance.
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the register page.
     *
     * @return \Response
     */
    public function register()
    {
        return view('auth.register');
    }

    /**
     * Perform the registration.
     *
     * @param  Request   $request
     * @param  AppMailer $mailer
     * @return \Redirect
     */
    public function postRegister(Request $request, AppMailer $mailer)
    {
        $this->validate($request, [
            'name' => 'required|alpha_dash',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);
        $password = $request['password'];
        $request['password'] = bcrypt($password);
        $user = User::create($request->all());

        $mailer->sendEmailConfirmationTo($user);

        flash('Please confirm your email address.');

        return redirect()->back();
    }

    /**
     * Confirm a user's email address.
     *
     * @param  string $token
     * @return mixed
     */
    public function confirmEmail($token)
    {
        User::whereToken($token)->firstOrFail()->confirmEmail();

        flash('You are now confirmed. Please login.');

        return redirect('login');
    }
}
