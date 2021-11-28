<?php

namespace App\Http\Controllers;

use App\Http\Requests\StateStoreRequest;
use App\Models\States;
use App\Models\countries;
use Illuminate\Http\Request;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   $states = States::all();
        if($request->has('search')){
            $states = States::where('name','like',"%{$request->search}%")->get();

        }

        return view('states.index',compact('states'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {    $countries = countries::all();
        return view('states.create',compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StateStoreRequest $request)
    {
        $newstate = new States;
        $newstate->name= $request->statename;
        $newstate->country_id = $request->countryid;
        $newstate->save();

        return redirect()->route('states.index')->with('message','State has been added successfully');
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
    public function edit(States $state)
    {   $countries = countries::all();
        return view('States.edit',compact('state','countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, States $state)
    {

        $state->name= $request->statename;
        $state->country_id = $request->countryid;
        $state->save();

        return redirect()->route('states.index')->with('message','State has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(States $state)
    {
        $state->delete();
        return redirect()->route('states.index')->with('message','State has been deleted successfully');

    }
}
