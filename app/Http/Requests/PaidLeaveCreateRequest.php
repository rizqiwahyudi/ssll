<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaidLeaveCreateRequest extends FormRequest
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
            'description' => ['required'],
            'start_date' => ['required', 'after:today'],
            'end_date' => ['required', 'after_or_equal:start_date'],
        ];
    }
}
