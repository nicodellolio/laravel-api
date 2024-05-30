<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|min:3|max:150',
            'slug'=> 'min:3|max:150',
            'technologies'=>'exists:technologies,id',
            'description' => 'nullable',
            'type_id' => 'nullable|exists:types,id',
            'project_start_date' => 'nullable|date ',
            'project_end_date' => 'nullable|date',
            'link_to_source_code' => 'required|starts_with:http',
            'link_to_project_view' => 'nullable|starts_with:http',
            'preview_image' => 'nullable'
        ];
    }
}
