<?php

namespace Company\Http\Requests;

use Company\Http\Requests\Request;

class UserEmployeeUpdateRequest extends Request
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
            'email' => 'required|email|max:255',
            'password' => 'sometimes|required|confirmed|min:6', //La validacion 'sometimes' quiere decir que en caso de no pasarse ese campo, entonces no se tenga en cuenta el resto de validaciones definidas para el mismo.
            'direction' => 'required_with:expertise_area|min:6|max:255',
            'expertise_area' => 'required_with:direction|in:Back-End Developer,Front-End Developer,Marketing,Designer' //Enum, no se puede dejar espacio luego de la coma, si no da error
        ];
    }
}
