<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactFormController extends Controller
{
    public function create(){
        return view('front-end.home.home');
    }
    public function store (){
dd(request()->all());
    }
}
