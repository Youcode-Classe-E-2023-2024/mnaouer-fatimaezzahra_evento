<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEventRequest extends FormRequest
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
            'title' => 'required|string|unique:events,title,' . request()->get('id'),
            'description' => 'required|string|min:10',
            'started_at' => 'required|date',
            'location' => 'required|string',
            'tickets_available' => 'required|integer',
//            'category' => 'required|integer'
        ];
    }
}
