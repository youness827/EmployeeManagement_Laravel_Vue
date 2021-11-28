<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class countries extends Model
{
    use HasFactory;

    protected $fillable = [
        'countrycode',
        'name'
    ];

    // countru has many state
    public function state(){
        return $this->hasMany(States::class);
    }
    public function employee(){
        return $this->hasMany(Employees::class);
    }
}
