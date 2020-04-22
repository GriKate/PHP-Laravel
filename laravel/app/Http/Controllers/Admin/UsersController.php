<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\User;

class UsersController extends Controller
{
    public function show() {
        $users = User::all();
        return view('admin.allUsers', ['users' => $users]);
    }

    public function changeAdmin($id) {
        $user = User::find($id);
        if ($user->is_admin) {
            $user->is_admin = false;
            $result = $user->save();
        } else {
            $user->is_admin = true;
            $result = $user->save();
        }
        $users = User::all();
        if ($result) {
            return redirect()->route('admin.allUsers', ['users' => $users])
                    ->with('success', 'Права админа успешно изменены');
        }
    }

    public function noAdmin($id) {
        $user = User::find($id);
        $user->is_admin = '0';
        $user->save();

        $users = User::all();
        return view('admin.allUsers', ['users' => $users]);
    }
}
