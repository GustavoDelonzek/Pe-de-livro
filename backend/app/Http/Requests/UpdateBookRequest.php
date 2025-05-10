<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
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
            'title' => 'sometimes|string|min:3|max:50',
            'author_id' => 'sometimes|exists:authors,id',
            'publisher_id' => 'sometimes|exists:publishers,id',
            'published_year' => 'sometimes|integer|regex:/^\d{1,4}$/',
            'price' => 'sometimes|numeric',
            'stock' => 'sometimes|integer',
            'img_url' => 'sometimes|url'
        ];
    }
}
