<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class OperatorController extends Controller
{
    //List of Operators
    public function allOperators()
    {
        $operators = DB::table('users')->where('role', 'operator')->get();

        return $operators;
    }

    //Add Operator
    public function addOperator(Request $request)
    {
        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'password' => 'required',
        ]);
        
        $request = request()->all();
        $request['role'] = 'operator';

        $operator = User::create($request);
        return $operator;
    }

    //Update Operator
    public function updateOperator(Request $request)
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

    //Delete Operator
    public function deleteOperator(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);
        $user = User::where('id', $request->id)->delete();

        return $user;
    }
}
