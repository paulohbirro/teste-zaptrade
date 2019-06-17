<?php

namespace App\Http\Controllers;

use App\Repositories\UnitRepositorie;
use App\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.unidades.index');
    }

    public function getUnitsJson(Request $request, UnitRepositorie $unitRepositorie)
    {

        return $unitRepositorie->getUnitsJson($request->all());

    }

}
