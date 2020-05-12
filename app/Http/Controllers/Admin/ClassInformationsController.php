<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ClassInformationRequest;
use App\Models\ClassInformation;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
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
     * @param ClassInformationRequest $request
     * @return RedirectResponse
     */
    public function store(ClassInformationRequest $request)
    {
        $classInformation = ClassInformation::create($request->all());

        if ($classInformation) {
            toastr('success', 'Cadastro realizado com sucesso');
            return redirect()->to(route('admin.classinformation.index'));
        }

        toastr('error', 'Não foi possível adicionar o cadastro');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param ClassInformation $classInformation
     * @return void
     */
    public function show(ClassInformation $classInformation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ClassInformation $classinformation
     * @return Application|Factory|Response|View
     */
    public function edit(ClassInformation $classinformation)
    {
        return view('admin.class_information.edit')
            ->with('classInformation', $classinformation);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ClassInformationRequest $request
     * @param ClassInformation $classinformation
     * @return RedirectResponse
     */
    public function update(ClassInformationRequest $request, ClassInformation $classinformation)
    {
        if ($classinformation->fill($request->all())->save()) {
            toastr('success', 'Cadastro atualizado com sucesso');
            return redirect()->to(route('admin.classinformation.index'));
        }

        toastr('error', 'Não foi possível atualizado o cadastro');
        return back();
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
