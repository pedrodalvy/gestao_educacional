<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeachersController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->q;

        return !$search
            ? []
            : Teacher::whereHas('user', function ($query) use ($search) {
                $query->where('users.name', 'LIKE', "%{$search}%");
            })->take(10)->get();
    }
}
