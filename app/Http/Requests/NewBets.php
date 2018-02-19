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
            'letter' => 'max:1|regex:/[a-f]/|nullable',
            'even_num' => [
                'nullable',
                Rule::in(['0', '2', '4', '6', '8'])
            ],
            'odd_num' => [
                'nullable',
                Rule::in(['1', '3', '5', '7', '9'])
            ],
            'select' => [
                'nullable',
                Rule::in(['letter', 'odd_num', 'even_num'])
            ]
        ];
    }
}
