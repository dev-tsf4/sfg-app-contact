<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostAddMessageRequest extends FormRequest
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
            'first_name' => 'required|min:2|max:60',
            'last_name' => 'required|min:2|max:60',
            'email' => 'required|email',
            'content' => 'required|min:50',
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'Ce champ est obligatoire',
            'content.min' => 'Ce champ doit contenir au minimum 50 caractères',
            'first_name.min' => 'Ce champ doit contenir au minimum 2 caractères',
            'last_name.min' => 'Ce champ doit contenir au minimum 2 caractères',
            'max' => 'Ce champ doit contenir 2 caractères minimum, 60 maximum',
            'email' => 'Un email valide est requis',
        ];
    }
}
