<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class NewBets extends FormRequest
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
            'letter' => 'max:1|regex:/[a-fA-f]/|nullable',
            'even_num' => 'max:9|numeric|nullable',
            'odd_num' => 'max:9|numeric|nullable',
            'select' => [
                'nullable',
                Rule::in(['letter', 'odd_num', 'even_num'])
            ]
        ];
    }
}
