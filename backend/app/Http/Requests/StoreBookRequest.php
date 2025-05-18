<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
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
            'title' => 'required|string|min:3|max:50',
            'author_id' => 'required|exists:authors,id',
            'publisher_id' => 'required|exists:publishers,id',
            'published_year' => 'required|integer|regex:/^\d{1,4}$/',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'img_url' => 'sometimes|url',
            'genres' => 'required|array|min:1|max:3',
            'genres.*' => 'integer|exists:genres,id'
        ];
    }
}
