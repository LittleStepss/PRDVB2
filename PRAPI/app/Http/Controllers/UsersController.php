<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;


class UsersController extends Controller
{
    public function index()
    {
        $users = Users::all();
        return response()->json($users);
    }

    public function store(Request $request)
    {
        $user = new Users;
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->mail = $request->mail;
        $user->password = $request->password;
        $user->company = $request->company;
        $user->save();
        return response()->json([
            "message" => "User Added"
        ], 201);
    }

    public function show($id)
    {
        $user = Users::find($id);
        if (!empty($users)) {
            return response()->json($user);
        } else {
            return response()->json([
                "message" => "User not found"
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        if (Users::where('id', $id)->exists()) {
            $user = Users::find($id);
            $user->firstname = is_null($request->firstname) ? $user->firstname : $request->firstname;
            $user->lastname = is_null($request->lastname) ? $user->lastname : $request->lastname;
            $user->mail = is_null($request->mail) ? $user->mail : $request->mail;
            $user->password = is_null($request->password) ? $user->password : $request->password;
            $user->company = is_null($request->company) ? $user->company : $request->company;
            $user->save();
            return response()->json([
                "message" => "User Updated"
            ], 404);
        } else {
            return response()->json([
                "message" => "User not found"
            ], 404);
        }
    }
    public function destroy($id)
    {
        if (Users::where('id', $id)->exists()) {
            $user = Users::find($id);
            $user->delete();
            return response()->json([
                "message" => "user deleted"
            ], 202);
        } else {
            return response()->json([
                "message" => "user not found"
            ], 404);
        }
    }
}


//['firstname', 'lastname', 'mail', 'password', 'company'];