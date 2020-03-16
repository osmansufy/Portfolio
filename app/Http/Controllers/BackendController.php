<?php

namespace App\Http\Controllers;

use App\Backend;
use Illuminate\Http\Request;

class BackendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back-end.home.home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Backend  $backend
     * @return \Illuminate\Http\Response
     */
    public function show(Backend $backend)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Backend  $backend
     * @return \Illuminate\Http\Response
     */
    public function edit(Backend $backend)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Backend  $backend
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Backend $backend)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Backend  $backend
     * @return \Illuminate\Http\Response
     */
    public function destroy(Backend $backend)
    {
        //
    }
}
