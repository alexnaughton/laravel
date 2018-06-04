<?php

namespace App\Http\Controllers;

use App\User;
use App\Game;
use App\Prediction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use File;

class AdminController extends Controller
{

	public function add_user (Request $request)
	{
		if($request->session()->get('username')) 
		{

			return view('add_user');

		}
		else
			return redirect('/');

	}

	public function save_user (Request $request)
	{

		if($request->session()->get('username')) 
		{ 

			$user = new User;
			$user->name = $request->name;
			$user->password = $request->password;
			$user->cs = 0;
			$user->cr = 0;
			$user->points = 0;
			$user->save();

			//Retrieve the newly created user
			$new_user = User::orderBy('id', 'DESC')->first();

			//Create Predictions and set them to 0-0 for created user.
			$games = Game::all();

			foreach ($games as $game)
			{
				$prediction = new Prediction;
				$prediction->user_id = $new_user->id;
				$prediction->game_id = $game->id;
				$prediction->home_score = 0;
				$prediction->away_score = 0;
				$prediction->result = "Default";
				$prediction->save();
			}

			$request->session()->flash('alert-success', 'User was succesfully added');

			return redirect('/');

		}
		else
			return redirect('/');

	}

	public function games (Request $request)
	{

		$games = Game::orderBy('id')->get();

		return view('games', compact('games'));

	}

	public function enter_result (Request $request, $game_id)
	{

		$game = Game::where('id', $game_id)->first();

		return view('enter_result', compact('game'));

	}

	public function submit_result (Request $request, $game_id)
	{

		//Code for changing result of game
		$game = Game::where('id', $game_id)->first();

		$game->home_score = $request->home_score;
		$game->away_score = $request->away_score;

		if($request->home_score > $request->away_score)
			$game->result = $request->home_team;
		elseif($request->away_score > $request->home_score)
			$game->result = $request->away_team;
		else
			$game->result = "Draw";

		$game->save();

		//Retrieve game for points calculation
		$game = Game::where('id', $game_id)->first();

		//Code for retrieving all predictions, updating user points.
		$predictions = Prediction::where('game_id', $game_id)->get();

		foreach ($predictions as $prediction)
		{
			$user = User::where('id', $prediction->user_id)->first();

			if($prediction->home_score == $game->home_score && $prediction->away_score == $game->away_score)
			{
				$user->points += 5;
				$user->cs += 1;
			}
			elseif($prediction->result == $game->result)
			{
				$user->points += 3;
				$user->cr += 1; 
			}

			$user->save();
		}

		return redirect('/');
	}

}
