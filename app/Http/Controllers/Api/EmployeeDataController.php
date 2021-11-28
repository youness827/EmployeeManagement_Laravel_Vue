<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\countries;
use App\Models\Departement;
use App\Models\States;
use App\Models\Cities;

use Illuminate\Http\Request;
use NunoMaduro\Collision\Adapters\Phpunit\State;

class EmployeeDataController extends Controller
{
    public function countries(){
        $countries = countries::all();
        return response()->json($countries);
    }

    public function departements(){
        $departements = Departement::all();
        return response()->json($departements);
    }

    public function states(countries $country){

        $states = States::where('country_id',$country->id)->get();
        return response()->json($states);

    }

    public function cities(States $state){
        $cities = Cities::where('state_id',$state->id)->get();

        return response()->json($cities);
    }
    public function departmentname(Departement $department){

            $departements = Departement::where('id',$department->id)->get();
            return response()->json($departements);
    }
}
