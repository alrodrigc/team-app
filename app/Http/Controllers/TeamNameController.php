<?php

namespace App\Http\Controllers;

use App\Models\TeamName;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TeamNameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $teamNames = TeamName::withCount('votes')
                   ->orderBy('votes_count', 'desc')
                   ->orderBy('name')
                   ->get();

        return view('teamName.index', [
            'teamNames' => $teamNames,
            'userVotes' => (auth()->user()
                            ? array_map(
                                function($item) {
                                    return $item->team_name_id;
                                },
                                auth()->user()
                                      ->votes
                                ->where('team_name_id', '>', Carbon::now()->subWeek())
                                ->all())
                            : array())
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('teamName.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'name' => [
                'required',
                'unique:team_names,name',
                'between:3,191'
            ],
            'description' => ''
        ]);

        auth()
            ->user()
            ->teamNames()
            ->create($data);

        return redirect()->route('teamNames.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TeamName  $teamName
     * @return \Illuminate\Http\Response
     */
    public function show(TeamName $teamName)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TeamName  $teamName
     * @return \Illuminate\Http\Response
     */
    public function edit(TeamName $teamName)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TeamName  $teamName
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TeamName $teamName)
    {
        //

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TeamName  $teamName
     * @return \Illuminate\Http\Response
     */
    public function destroy(TeamName $teamName)
    {
        //
    }
}
