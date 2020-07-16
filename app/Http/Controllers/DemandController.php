<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Demand;
class DemandController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        $demands=Demand::All();
       // dd($locations);
        return view('demand',['Demands'=>$demands]);
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
        $loc=new Demand();
        $loc->budget=$request->budget;
        $loc->phone=$request->phone;
        $loc->ville=$request->ville;
        $loc->commentaire=$request->commentaire;
        $loc->user_id=auth()->user()->id;
        $loc->save();
        $demands=Demand::All();

        return view('demand',['Demands'=>$demands]);
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
        $thisdem= Demand::findOrFail($id);
        //dd($thisloc);
        return view('show_demand',['dem'=>$thisdem,'user'=>auth()->user()]);
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
