<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClassTeachingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $classinformation = $this->route('classinformation');
        return [
            'teacher_id' => 'required|existis:teachers,id',
            'subject_id' => [
                'required',
                'exists:subjects,id',
                Rule::unique('class_teaching', 'subject_id')
                    ->where('class_information_id', $classinformation->id)
                    ->where('teacher_id', $this->get('teacher_id'))
            ]
        ];
    }
}