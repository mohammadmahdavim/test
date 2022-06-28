<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventCreateRequest;
use App\Http\Requests\EventUpdateRequest;
use App\Http\Requests\MatchCreateRequest;
use App\Http\Requests\MatchUpdateRequest;
use App\Models\Player;
use App\Models\Profile;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MatchProfileController extends Controller
{
    public function index()
    {
        $rows = Profile::with('homeTeam')
            ->with('awayTeam')
            ->with('player')
            ->with('author')
            ->get();
        return view('panel.matches.index', ['rows' => $rows]);
    }

    public function create()
    {
        $teams = Team::all();
        $players = Player::all();
        return view('panel.matches.create', ['teams' => $teams, 'players' => $players]);
    }

    public function store(MatchCreateRequest $request)
    {

        Profile::create([
            'home_team_id' => $request->home_team_id,
            'away_team_id' => $request->away_team_id,
            'player_id' => $request->player_id,
            'date' => $request->input('date-picker-shamsi-list'),
            'time' => $request->time,
            'video_url' => $request->video_url,
            'author' => auth()->user()->id,
        ]);
        alert()->success('successful', 'new match create successfully');
        return redirect('/matches');
    }

    public function edit($id)
    {
        $teams = Team::all();
        $players = Player::all();
        $profile = Profile::find($id);
        return view('panel.matches.edit', ['row' => $profile, 'teams' => $teams, 'players' => $players]);
    }

    public function update($id, MatchUpdateRequest $request)
    {
        $profile = Profile::find($id);

        $profile->update([
            'home_team_id' => $request->home_team_id,
            'away_team_id' => $request->away_team_id,
            'player_id' => $request->player_id,
            'date' => $request->input('date-picker-shamsi-list'),
            'time' => $request->time,
            'video_url' => $request->video_url,
        ]);
        alert()->success('successful', 'match edit successfully');
        return redirect('/matches');
    }

    public function destroy($id)
    {
        $profile = Profile::find($id);
        $profile->delete();
    }

}
