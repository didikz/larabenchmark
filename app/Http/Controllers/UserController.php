<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index(User $user)
    {
        $data['user_count'] = $user->count();
        $data['users'] = $user->orderBy('email')->get();
        return response()->json($data);
    }

    public function add()
    {
        factory(User::class)->create();
        return response()->json([
            'status' => 'user added'
        ]);
    }
}
