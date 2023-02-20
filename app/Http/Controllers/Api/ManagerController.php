<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class ManagerController extends Controller
{
    //List of Managers
    public function allManagers()
    {
        $managers = DB::table('users')->where('role', 'manager')->get();

        return $managers;
    }

    //Add Manager
    public function addManager(Request $request)
    {
        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'password' => 'required',
        ]);
        
        $request = request()->all();
        $request['role'] = 'manager';

        $manager = User::create($request);
        return $manager;
    }

    //Update Manager
    public function updateManager(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required',
            'mobile' => 'required',
        ]);

        $user = User::where('id', $request->id);
        $user = $user->update([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'email' => $request->email,
            'mobile' => $request->mobile,
        ]);

        return $user;
    }

    //Delete Manager
    public function deleteManager(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);
        $user = User::where('id', $request->id)->delete();

        return $user;
    }
}
