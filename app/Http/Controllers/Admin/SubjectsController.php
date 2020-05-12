<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateSubjectsRequest;
use App\Models\Subject;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class SubjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|Response|View
     */
    public function index()
    {
        $subjects = Subject::paginate(10);

        return view('admin.subjects.index')
            ->with('subjects', $subjects);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
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
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|Response|View
     */
    public function edit($id)
    {
        $subject = Subject::findOrFail($id);

        return view('admin.subjects.edit')
            ->with('subject', $subject);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateSubjectsRequest $request
     * @param int $id
     * @return RedirectResponse|Response
     */
    public function update(UpdateSubjectsRequest $request, $id)
    {
        $subject = Subject::findOrFail($id);

        if ($subject->fill($request->all())->save()) {
            toastr('success', 'Cadastro alterado com sucesso');
            return redirect()->to(route('admin.subjects.index'));
        }

        toastr('error', 'Não foi possível atualizar o cadastro');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy($id)
    {
        $subject = Subject::findOrFail($id);

        if($subject->delete()) {
            toastr('success', 'Cadastro removido com sucesso.');
            return redirect()->to(route('admin.subjects.index'));
        }

        toastr('error', 'Não foi possível remover o cadastro');
        return back();
    }
}
