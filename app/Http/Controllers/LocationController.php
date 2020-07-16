<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        $locations=Location::All();
       // dd($locations);
        return view('home',['locations'=>$locations]);
       // return $locations;
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
        $loc=new Location();
        $loc->adresse=$request->adresse;
        $loc->capacity=$request->capacity;
        $loc->wifi=$request->wifi=='on'?1:0;
        $loc->imge=base64_encode(file_get_contents($request->file('imge')));
        $loc->lat=$request->latitude;
        $loc->long=$request->longtitude;
        $loc->price=$request->price;
        $loc->superficie=$request->superficie;
        $loc->user_id=auth()->user()->id;

        $loc->save();
        $locations=Location::All();

         return view('home',['locations'=>$locations]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      //  dd($id);
        $thisloc= Location::findOrFail($id);
        return view('show_location',['loc'=>$thisloc]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
