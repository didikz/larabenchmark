<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Cache;
use App\User;

class UserController extends Controller
{
    public function index(User $user)
    {
        $data = Cache::remember('users', 60, function () use ($user) {
            $data['user_count'] = $user->count();
            $data['users'] = $user->orderBy('email')->get();
            return $data;
        });
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
