<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{

	public function index (Request $request) 
	{
		if($request->session()->get('username')) {
			return redirect('home');
		}
		else
			return view('login');
	}

	public function login (Request $request) 
	{

		$name = $request->name;
		$password = $request->password;

		$users = User::all();

		foreach ($users as $user) 
		{
			if($user->name == $name && $user->password == $password) 
			{
				$request->session()->put('username', $user->id);
				$request->session()->put('logged in', TRUE);
				return redirect('home');
			}
		}

		return back()->withErrors(['Incorrect Details, please try again.']);

	}

	public function logout(Request $request)
	{
		$request->session()->flush();
		return redirect('/');
	}

	
}

