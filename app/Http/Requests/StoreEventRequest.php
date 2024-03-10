<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventRequest extends FormRequest
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
            'title' => 'required|string|unique:events',
            'description' => 'required|string|min:10',
            'price' => 'required|integer',
            'started_at' => 'required|date',
            'location' => 'required|string',
            'tickets_available' => 'required|integer',
            'picture' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }
}
