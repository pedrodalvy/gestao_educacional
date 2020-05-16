<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectsController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->q;

        return !$search
            ? []
            : Subject::where('name', 'LIKE', "%{$search}%")
                ->take(10)->get();
    }
}
