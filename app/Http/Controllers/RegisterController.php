<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUsersRequest;
use App\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        return view('home', compact('user'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(CreateUsersRequest $request)
    {
        $id = Auth::user()->id;

        $input = $request->all();

        $profile = $input['profile'];
        unset($input['profile']);

        $user = User::find($id)->update($input);
        $user = User::find($id)->first();
        $user->profile()->update($profile);

        return redirect('/home');
    }
}
