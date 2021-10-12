<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use DB;

class UsersController extends Controller
{

    public function index() {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function show($id) {
		$user = User::find($id);
        return view('admin.users.details',compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);
		return view('admin.users.edit',compact('user'));
    }

    public function update($id) {
		$user = User::find($id);

        //echo $user['status'];

if($user['status'] == "Active") {
                DB::table('users')
                ->where('id', $user->id)
                ->update(['status' => 'Inactive']);
}

if($user['status'] == "Inactive") {
                DB::table('users')
                ->where('id', $user->id)
                ->update(['status' => 'Active']);
}

return redirect()->route('users.index')
                        ->with('success','User status updated successfully');

    }

}
