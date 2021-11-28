<?php

namespace App\Http\Controllers;

use App\Http\Requests\CityStoreRequest;
use App\Models\Cities;
use App\Models\States;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {     $cities = Cities::all();

        if($request->search!=""){
        $cities = Cities::where('name','like',"%{$request->search}%")->get();
        }


        return view('Cities.index',compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = States::all();
        return view('Cities.create',compact('states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CityStoreRequest $request)
    {
        $city = new Cities;
        $city->name=$request->citiyname;
        $city->state_id=$request->stateid;
        $city->save();

        return redirect()->route('cities.index')->with('message','City has been addded successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Cities $city)
    {
        $states = States::all();
        return view('cities.edit',compact('city','states'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cities $city)
    {
        $city->name=$request->cityname;
        $city->state_id=$request->stateid;
        $city->save();

        return redirect()->route('cities.index')->with('message','City has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cities $city)
    {
        $city->delete();

        return redirect()->route('cities.index')->with('message','City has been deleted successfully');


    }
}
