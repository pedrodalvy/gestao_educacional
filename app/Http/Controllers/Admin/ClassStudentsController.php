<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClassInformation;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class ClassStudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @param ClassInformation $classinformation
     * @return Application|Factory|Collection|View
     */
    public function index(Request $request, ClassInformation $classinformation)
    {
        if (! $request->ajax()) {
            return view('admin.class_information.class_students')
                ->with('classinformation', $classinformation);
        }

        return $classinformation->students()->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}