<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\VehicleType;

class VehicleTypeController extends Controller
{
    //All Types
    public function allVehicleTypes()
    {
        $types = DB::table('vehicle_types')->get();

        return $types;
    }

    //Add Vehicle Type
    public function addVehicleType(Request $request)
    {
        $request->validate([
            'type' => 'required'
        ]);

        $request = $request->all();

        $type = VehicleType::create($request);

        return $type;
    }

    //Update Vehicle Type
    public function updateVehicleType(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'id' => 'required'
        ]);

        $type = VehicleType::where('id', $request->id);
        $type = $type->update([
            'type' => $request->type
        ]);

        return $type;
    }

    //Delete Vehicle Type
    public function deleteVehicleType(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);
        $type = VehicleType::where('id', $request->id)->delete();

        return $type;
    }
}
