<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class States extends Model
{
    use HasFactory;

    protected $fillable=[
        'statename',
        'countryid'
    ];
    //each state belongsTo Country
    public function country(){
        return $this->belongsTo(countries::class);
    }
    //state has many cities
    public function cities(){
        return $this->hasMany(Cities::class);
    }
    public function employee(){
        return $this->hasMany(Employees::class);
    }
}
