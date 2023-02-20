<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserController extends Controller
{
    //List of Users
    public function allUsers()
    {
        $users = DB::table('users')->where('role', 'user')->get();

        return $users;
    }

    //Add User
    public function addUser(Request $request)
    {
        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'password' => 'required',
        ]);

        $request = request()->all();
        $user = User::create($request);
        return $user;
    }

    //Update User
    public function updateUser(Request $request)
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

    //Delete User
    public function deleteUser(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);
        $user = User::where('id', $request->id)->delete();

        return $user;
    }
}
