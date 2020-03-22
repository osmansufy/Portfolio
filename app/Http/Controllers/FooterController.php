<?php

namespace App\Http\Controllers;

use App\Footer;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function index(){

        $footer= Footer::first();
//        return view('back-end.footer.footer',[
//
//            'footer'=>$footer
//        ]);

        return view('back-end.footer.footer')->with(compact('footer'));
    }


    public function edit(){
        $footer= Footer::first();
        return view('back-end.footer.edit-footer',[
            'footer'=>$footer
        ]);
    }
    public function saveFooter(Request $request){



        $footer= Footer::first();

        $footer->facebook = $request->facebook ;
        $footer->twitter = $request->twitter ;
        $footer->linkdin = $request->linkdin ;
        $footer->youtube = $request->youtube ;
        $footer->copyright = $request->copyright ;

        $footer->save();


    }

//    publis


}
