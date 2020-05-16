<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ClassTeachingRequest;
use App\Models\ClassInformation;
use App\Models\Student;
use App\Models\Teaching;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ClassTeachingsController extends Controller
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
        if (!$request->ajax()) {
            return view('admin.class_information.class_teaching')
                ->with('classinformation', $classinformation);
        }

        return $classinformation->teachings()->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ClassTeachingRequest $request
     * @param ClassInformation $classinformation
     * @return Student|Student[]|Collection|Model
     */
    public function store(ClassTeachingRequest $request, ClassInformation $classinformation)
    {
        return $classinformation->teachings()->create([
            'subject_id' => $request->subject_id,
            'teacher_id' => $request->teacher_id,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ClassInformation $classinformation
     * @param ClassTeaching $teaching
     * @return JsonResponse
     */
    public function destroy(ClassInformation $classinformation, ClassTeaching $teaching)
    {
        $teaching->delete();
        return response()->json([], 204);
    }
}
