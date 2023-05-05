<?php

namespace App\Http\Controllers;

use App\Http\Requests\MakeUser;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function add (MakeUser $request) {
        $users = session('users') ? session('users') : config('users.users');
        $ids = array_column($users, 'id');
        $max_id = max($ids);
        $users[] = ['id' => $max_id+1] + $request->all();
        session()->put('users', $users);

        user_logs(true, $request->email);
    }
}
