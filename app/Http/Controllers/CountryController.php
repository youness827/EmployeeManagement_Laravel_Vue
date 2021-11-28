<?php

namespace App\Http\Controllers;

use App\Http\Requests\CountryStoreRequest;
use App\Models\countries;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $countries = countries::all();
        if($request->has('search')){
            $countries = countries::where('countrycode','like',"%{$request->search}%")->get();
        }
        return view('countries.index',compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('countries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountryStoreRequest $request)
    {
        $newCountry = new countries();
        $newCountry->countrycode = $request->countrycode;
        $newCountry->name   = $request->countryname;
        $newCountry->save();
        return redirect()->route('countries.index')->with('message','Country has been added successfully');

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
    public function edit(countries $country)
    {
        return view('countries.edit',compact('country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, countries $country)
    {

        $country->countrycode = $request->countrycode;
        $country->name   = $request->countryname;
        $country->save();
        return redirect()->route('countries.index')->with('message','Country has been updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(countries $country)
    {
      $country->delete();
      return redirect()->route('countries.index')->with('message','Country has been deleted successfully');

    }
}
