<?php

namespace App\Http\Controllers;

use App\Match;
use App\Team;
use Illuminate\Http\Request;

class MatchController extends Controller{

    public function addteam(Request $request){
//        $this -> validate($request, [
//            'roll' => 'required|unique:users',
//            'password' => 'required|min:4'
//        ]);
        $team1 = $request->input('team1');
        $team2 = $request->input('team2');
        $team1g = $request->input('team1g');
        $team2g = $request->input('team2g');
        $winner = $request->input('winner');

        $team = Team::where('teamname', '=', $team1)->first();
        if ($team === null) {
            // team doesn't exist
            $team = new Team();
            $team->teamname = $team1;
            $team->games = 1;
            $team->wins = $winner == 1 ? 1 : 0;
            $team->loss = $winner == 2 ? 1 : 0;;
            $team->draws = $winner == 0 ? 1 : 0;;
            $team->points = $winner == 1 ? 4 : -1;
            $team->goals = $team1g;
            $team->save();
        }
        else{
            $team->games += 1;
            $team->wins += $winner == 1 ? 1 : 0;
            $team->loss += $winner == 2 ? 1 : 0;;
            $team->draws += $winner == 0 ? 1 : 0;;
            $team->points += $winner == 1 ? 4 : -1;
            $team->goals += $team1g;
            $team->update();
        }

        $team = Team::where('teamname', '=', $team2)->first();
        if ($team === null) {
            // team doesn't exist
            $team = new Team();
            $team->teamname = $team2;
            $team->games = 1;
            $team->wins = $winner == 2 ? 1 : 0;
            $team->loss = $winner == 1 ? 1 : 0;;
            $team->draws = $winner == 0 ? 1 : 0;;
            $team->points = $winner == 2 ? 4 : -1;
            $team->goals = $team2g;
            $team->save();
        }
        else{
            $team->games += 1;
            $team->wins += $winner == 2 ? 1 : 0;
            $team->loss += $winner == 1 ? 1 : 0;;
            $team->draws += $winner == 0 ? 1 : 0;;
            $team->points += $winner == 2 ? 4 : -1;
            $team->goals += $team2g;
            $team->update();
        }
        $match = new Match();
        $match->team1= $team1;
        $match->team2 = $team2;
        $match->winner = $winner;
        $match->team1g = $team1g;
        $match->team2g = $team2g;
        $match->save();
//        $tags = Tag::all();
        $teams = Team::all();
        $match = Match::all();
        return view('welcome', ['teams' => $teams, 'matches' => $match]);
        //return redirect()->route('home.feeds')->with(['message' => $message]);

    }
    public function gaddteam(){
        $teams = Team::all();
        $match = Match::all();
        return view('welcome', ['teams' => $teams, 'matches' => $match]);
    }
}