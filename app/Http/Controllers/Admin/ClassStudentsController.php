<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ClassStudentRequest;
use App\Models\ClassInformation;
use App\Models\Student;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
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
     * @param ClassStudentRequest $request
     * @param ClassInformation $classinformation
     * @return Student|Student[]|Collection|Model
     */
    public function store(ClassStudentRequest $request, ClassInformation $classinformation)
    {
        $student = Student::findOrFail($request->student_id);
        $classinformation->students()->save($student);

        return $student;
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
