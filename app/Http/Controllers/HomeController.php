	<?php

namespace App\Http\Controllers;

use App\User;
use App\Prediction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{

	public function index (Request $request) 
	{
		
		if($request->session()->get('username')) 
		{

			$users = User::orderBy('points', 'DESC')->get();

			$position = 1;

			foreach($users as $user)
			{
				$user->position = $position;
				$position += 1;
			}			

		    return view('home', compact('users'));

		}
		else
			return redirect('/');

	}

	public function my_predictions (Request $request)
	{

		if($request->session()->get('username')) 
		{

			$predictions = Prediction::with('Game')->where('user_id', $request->session()->get('username'))->get();

			return view('my_predictions', compact('predictions'));

		}
		else
			return redirect('/');

	}

	public function update_predictions (Request $request)
	{

		if($request->session()->get('username')) 
		{

			$predictions = Prediction::with('Game')->where('user_id', $request->session()->get('username'))->get();

			foreach ($predictions as $prediction)
			{
				$prediction->home_score = $request->input('home_score'."".$prediction->id);
				$prediction->away_score = $request->input('away_score'."".$prediction->id);

				if($prediction->home_score > $prediction->away_score)
					$prediction->result = $prediction->game->home_team;
				elseif($prediction->away_score > $prediction->home_score)
					$prediction->result = $prediction->game->away_team;
				else
					$prediction->result = "Draw";

				$prediction->save();

			}

			$request->session()->flash('alert-success', 'You have updated your predictions');

			return redirect('my_predictions');
		}
		else
			return redirect('/');

	}

	public function user_predictions (Request $request, $user_id)
	{

		if($request->session()->get('username')) 
		{

			$predictions = Prediction::with('Game')->where('user_id', $user_id)->get();

			return view('user_predictions', compact('predictions'));

		}
		else
			return redirect('/');

	}

}
