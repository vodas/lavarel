<?php
namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class SettingsController extends Controller
{


    public function index()
    {
        return view('settings.settings');
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
        return redirect()->action('SettingsController@index');
    }
}