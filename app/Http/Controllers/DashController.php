<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;

class DashController extends Controller
{
    /**
     * Create a new sessions controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $username
     * @return Response
     */
    public function show($username)
    {
        return view('dash.default');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $username
     * @return Response
     */
    public function edit($username)
    {
        $user = Auth::user();
        return view('dash.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $username
     * @return Response
     */
    public function update(Request $request)
    {
        $user = Auth::user();
        $user->website = $request->website;
        $user->organisation = $request->organisation;
        $user->save();
        flash('Profile updated.');
        return redirect()->back();
    }

public function editpass($username)
    {
        $user = Auth::user();
        return view('dash.editpass')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $username
     * @return Response
     */
    public function updatepass(Request $request)
    {
        $user = Auth::user();
        $user->password = bcrypt($request->password);
        $user->save();
        flash('Password updated.');
        return redirect('/@'.$user->name);
    }
 }
