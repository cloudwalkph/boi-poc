<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUsersRequest extends FormRequest
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
            'email'                  => 'required|email',
            'profile.first_name'     => 'required',
            'profile.last_name'      => 'required',
            'profile.birthday'       => 'required|date',
            'profile.gender'         => 'required',
            'profile.address'        => 'required'
        ];
    }
}
