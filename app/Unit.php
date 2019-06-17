<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{


    protected $fillable = ['name', 'place', 'neighborhood', 'city', 'state', 'zipcode'];

    public function getZipcodeAttribute($value)
    {
        return preg_replace("/^(\d{5})(\d{3})$/", "\\1-\\2", $value);
    }

    public function getLocationAttribute($value)
    {
        return $this->city . '/' . $this->state;
    }
}
