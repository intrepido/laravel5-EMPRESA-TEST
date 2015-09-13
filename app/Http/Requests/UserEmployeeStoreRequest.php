<?php

namespace Company\Http\Requests;

use Company\Http\Requests\Request;

class UserEmployeeStoreRequest extends Request
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
            'direction' => 'required_with:expertise_area|min:6|max:255',
            'expertise_area' => 'required_with:direction|in:Back-End Developer,Front-End Developer,Marketing,Designer' //Enum, no se puede dejar espacio luego de la coma, si no da error
        ];
    }
}
