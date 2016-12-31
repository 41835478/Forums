<?php

namespace App\Http\Requests\backend\access\roles;

use Illuminate\Foundation\Http\FormRequest;

class EditPermissionsRequest extends FormRequest
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
            'role.display_name' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'role.display_name' => 'Display Name'
        ];
    }
}
