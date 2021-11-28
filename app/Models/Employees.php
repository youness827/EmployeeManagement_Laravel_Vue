<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    use HasFactory;
    protected $fillable = [
        "firstname",
        "lastname",
       "middlename",
        "adress",
        "zipcode",
        "country_id",
        "state_id",
        "city_id",
        "departement_id",
        "birthdate",
        "datehierd",
    ];

    public function country(){
        return $this->belongsTo(countries::class);
    }

    public function state(){
        return $this->belongsTo(States::class);
    }
    public function departement(){
        return $this->belongsTo(Departement::class);
    }
    public function city(){
        return $this->belongsTo(Cities::class);
    }
}
