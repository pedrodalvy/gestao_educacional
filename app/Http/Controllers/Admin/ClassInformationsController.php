<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClassInformation;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class ClassInformationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|Response|View
     */
    public function index()
    {
        $classInformations = ClassInformation::paginate(10);

        return view('admin.class_information.index')
            ->with('classInformations', $classInformations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|Response|View
     */
    public function create()
    {
        $classInformation = new ClassInformation;

        return view('admin.class_information.create')
            ->with('classInformation', $classInformation);
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
     * Display the specified resource.
     *
     * @param ClassInformation $classInformation
     * @return Response
     */
    public function show(ClassInformation $classInformation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ClassInformation $classInformation
     * @return Response
     */
    public function edit(ClassInformation $classInformation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param ClassInformation $classInformation
     * @return Response
     */
    public function update(Request $request, ClassInformation $classInformation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ClassInformation $classInformation
     * @return Response
     */
    public function destroy(ClassInformation $classInformation)
    {
        //
    }
}
