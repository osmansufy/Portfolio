<?php

namespace App\Http\Controllers;

use App\Services;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Services::all();
//        return $services;
        return view('back-end.services.services',[
            'services' => $services
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back-end.services.add_services');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $serviceImage = $request->file('service_img');
        $imageName = $serviceImage->getClientOriginalName();
        $directory = 'backend/images/';
        $imageUrl = $directory.$imageName;
        $serviceImage->move($directory,$imageName);


        $services= new Services();
         $services->service_title=$request->service_title;
         $services->service_title=$request->service_title;
         $services->service_desc=$request->service_desc;
         $services->status=$request->status;
        $services->service_img = $imageUrl ;

        $services->save();

        return redirect('/services')->with('message','services added Successfully');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function show(Services $services)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $services=Services::find($id);
        return view('back-end.services.editServices',[
            'services'=>$services
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request , $id )
    {

        $services= Services::find($id);

        $servicesImage = $request->file('service_img');

        if ($servicesImage){
            if(!empty($services->service_img)){
                unlink($services->service_img);
            }


            $imageName = $servicesImage->getClientOriginalName();
            $directory = 'backend/images/';
            $imageUrl = $directory.$imageName;
            $servicesImage->move($directory,$imageName);

            $services->service_title = $request->service_title;
            $services->service_desc = $request->service_desc;
            $services->service_img = $imageUrl;
            $services->status = $request->status;
            $services->save();

        } else{
            $services->service_title = $request->service_title;
            $services->service_desc = $request->service_desc;
            $services->status = $request->status;
            $services->save();
        }

//return $request;
        return back()->with('message','services Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
$services=Services::find($id);

        $services->delete();
        return back()->with('message','Deleted  Service successfully');
    }

    public function published($id){
        $services = Services::find($id);

        $services->status = 1;
        $services->save();

        return back();

    }
    public function unpublished($id){
        $services= Services::find($id);

        $services->status = 0;
        $services->save();

        return back();

    }
}
