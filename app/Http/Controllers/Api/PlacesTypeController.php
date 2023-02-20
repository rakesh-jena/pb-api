<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PlacesType;

class PlacesTypeController extends Controller
{
    //All Types
    public function allPlacesTypes()
    {
        $types = DB::table('places_type')->get();

        return $types;
    }

    //Add Places Type
    public function addPlacesType(Request $request)
    {
        $request->validate([
            'type' => 'required'
        ]);

        $request = $request->all();

        $type = PlacesType::create($request);

        return $type;
    }

    //Update PlacesType
    public function updatePlacesType(Request $request)
    {
        $request->validate([
            'area' => 'required',
            'id' => 'required'
        ]);

        $type = PlacesType::where('id', $request->id);
        $type = $type->update([
            'type' => $request->type
        ]);

        return $type;
    }

    //Delete PlacesType
    public function deletePlacesType(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);
        $type = PlacesType::where('id', $request->id)->delete();

        return $type;
    }
}
