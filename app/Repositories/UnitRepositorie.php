<?php

namespace App\Repositories;

use App\Unit;
use Illuminate\Http\Request;

class UnitRepositorie
{


    public function getUnitsJson(array $request)
    {

        $type = $request['units'];
        $keyWord = $request['keyword'];

        switch ($type) {

            case $type == "name":
                $units = Unit::where('name', 'like', '%' . $keyWord . '%')->get();
                return response()->json($units);
                break;

            case  $type == "place":
                $units = Unit::where('place', 'like', '%' . $keyWord . '%')->get();
                return response()->json($units);
                break;

            case  $type == "neighborhood":
                $units =  Unit::where('neighborhood', 'like', '%' . $keyWord . '%')->get();
                return response()->json($units);
                break;

            case  $type == "city":
                $units = Unit::where('city', 'like', '%' . $keyWord . '%')->get();
                return response()->json($units);
                break;

            default:
                $units = Unit::all();
                return response()->json($units);
        }


    }
}
