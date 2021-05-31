<?php

namespace Pratiksh\Adminetic\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PermissionRequest extends FormRequest
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
            'browse' => 'sometimes|boolean',
            'read' => 'sometimes|boolean',
            'edit' => 'sometimes|boolean',
            'add' => 'sometimes|boolean',
            'delete' => 'sometimes|boolean',
            'name' => 'sometimes|max:255',
            'can' => 'sometimes|boolean',
            'role_id' => 'required|numeric',
            'model' => 'sometimes|max:255',
        ];
    }
}
