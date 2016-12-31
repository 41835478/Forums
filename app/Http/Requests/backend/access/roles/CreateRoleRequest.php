<?php

namespace App\Http\Requests\backend\access\roles;

use Illuminate\Foundation\Http\FormRequest;

class CreateRoleRequest extends FormRequest
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
            'role.name' => 'required|unique:roles,name|max:30',
            'role.display_name' => 'required|unique:roles,display_name|max:30',
            'role.description' => 'max:255'
        ];
    }


    /**
     * Sets the attributes to human friendly names
     *
     * @return array
     */
    public function attributes(){
        return [
            'role.name' => 'name',
            'role.display_name' => 'display name',
            'role.description' => 'description'
        ];
    }
}
