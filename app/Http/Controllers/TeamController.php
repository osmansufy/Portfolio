<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams=Team::all();
        return view('back-end.team.team',[
        'teams'=>$teams
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('back-end.team.addTeam');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $teamsImage=$request->file('member_image');
        $imageName=$teamsImage->getClientOriginalName();
        $directory='backend/teams/images/';
        $imagUrl=$directory.$imageName;
        $teamsImage->move($directory,$imageName);
        $teams= new Team();
        $teams->member_image=$imagUrl;
        $teams->member_name=$request->member_name;
        $teams->member_designation=$request->member_designation;
        $teams->member_facebook=$request->member_facebook;
        $teams->member_twitter=$request->member_twitter;
        $teams->member_github=$request->member_github;
        $teams->member_youtube=$request->member_youtube;
        $teams->status=$request->status;

        $teams->save();

        return redirect('/teams')->with('message','Team added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        //
    }

    public function published($id){
        $teams = Team::find($id);

        $teams->status = 1;
        $teams->save();

        return back();

    }
    public function unpublished($id){
        $teams= Team::find($id);

        $teams->status = 0;
        $teams->save();

        return back();

    }
}
