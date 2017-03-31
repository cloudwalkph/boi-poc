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
        $alias = $input['alias'];
        $address = $input['address'];
        $travelInformation = $input['travelInformation'];
        $characterReference = $input['characterReference'];
        unset($input['profile']);
        unset($input['alias']);
        unset($input['address']);
        unset($input['travelInformation']);
        unset($input['characterReference']);

        $user = User::find($id)->update($input);
        $user = User::find($id)->first();
        $user->profile()->update($profile);
        $user->travelInformation()->firstOrCreate($travelInformation);
        $user->characterReference()->firstOrCreate($characterReference);
        $user->alias()->firstOrCreate($alias);
        $user->address()->firstOrCreate($address);

        return redirect('/home');
    }
}
