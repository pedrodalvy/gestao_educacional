<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ClassInformationRequest extends FormRequest
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
        return [
            'date_start' => 'required|date',
            'date_end' => 'required|date',
            'cycle' => 'required|string',
            'subdivision' => 'string|nullable',
            'semester' => 'required|integer',
            'year' => 'required|integer'
        ];
    }
}
