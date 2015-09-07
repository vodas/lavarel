<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;


class SettingsController extends Controller
{


    public function index()
    {
            if (Auth::guest()) {
                return redirect()->action('HomeController@index');
            } else {
                return view('settings.settings');
            }
    }

    public function changepassword()
    {
        return view('settings.changepassword');
    }

    public function change(Request $request) {
        $this->validate($request, [
            'password' => 'required|confirmed|min:6',
        ]);
        $user  = User::find($request->input('id'));
        $user->password =  bcrypt($request->input('password'));
        $user->save();
        return redirect()->action('SettingsController@index');

    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'name' => 'required',
        ]);

        $user  = User::find($request->input('id'));
        $user->email =  $request->input('email');
        $user->name =  $request->input('name');
        $user->save();
        Session::flash('status', 'zmodyfikowano poprawnie');
        return redirect()->action('SettingsController@index');
    }
}