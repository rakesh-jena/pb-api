<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Area;

class AreaController extends Controller
{
    //All Areas
    public function allAreas()
    {
        $areas = DB::table('areas')->get();

        return $areas;
    }

    //Add Area
    public function addArea(Request $request)
    {
        $request->validate([
            'area' => 'required'
        ]);

        $request = $request->all();

        $area = Area::create($request);

        return $area;
    }

    //Update Area
    public function updateArea(Request $request)
    {
        $request->validate([
            'area' => 'required',
            'id' => 'required'
        ]);

        $area = Area::where('id', $request->id);
        $area = $area->update([
            'area' => $request->area
        ]);

        return $area;
    }

    //Delete Area
    public function deleteArea(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);
        $area = Area::where('id', $request->id)->delete();

        return $area;
    }
}
