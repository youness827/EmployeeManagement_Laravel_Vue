<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    use HasFactory;
 protected $fillable = [
    'citiyname',
    'stateid'
 ];



// city has belongs to state
    public function state(){
        return $this->belongsTo(States::class);
    }

    public function employee(){
        return $this->hasMany(Employees::class);
    }
}
