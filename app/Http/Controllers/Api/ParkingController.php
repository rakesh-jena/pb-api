<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Area;
use App\Models\PlacesType;
use App\Models\Parking;

class ParkingController extends Controller
{
    //All Parkings
    public function allParkings()
    {
        $parkings = DB::table('parkings')->get();
        $data = [];
        foreach($parkings as $parking)
        {
            $area = Area::where('id', $parking->area)->first();
            $placeType =PlacesType::where('id', $parking->placeType)->first();
            $data['id'] = $parking->id;
            $data['name'] = $parking->name;
            $data['area'] = $area->area;
            $data['placeType'] = $placeType->type;
            $data['city'] = $parking->city;
            $data['state'] = $parking->state;
            $data['pin'] = $parking->pin;
            $data['address'] = $parking->address;
            $data['created_at'] = $parking->created_at;
            $data['updated_at'] = $parking->updated_at;
        }

        return $data;
    }

    //Add Parking
    public function addParking(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'placeType' => 'required',
            'city' => 'required',
            'state' => 'required',
            'pin' => 'required',
            'address' => 'required',
            'area' => 'required',
        ]);

        $request = $request->all();

        $parking = Parking::create($request);

        return $parking;
    }

    //Update Parking
    public function updateParking(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'placeType' => 'required',
            'city' => 'required',
            'state' => 'required',
            'pin' => 'required',
            'address' => 'required',
            'area' => 'required',
        ]);

        $parking = Parking::where('id', $request->id);
        $parking = $parking->update([
            'name' => $request->name,
            'placeType' => $request->placeType,
            'city' => $request->city,
            'state' => $request->state,
            'pin' => $request->pin,
            'address' => $request->address,
            'area' => $request->area,
        ]);

        return $parking;
    }

    //Delete Parking
    public function deleteParking(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);
        $parking = Parking::where('id', $request->id)->delete();

        return $parking;
    }
}
