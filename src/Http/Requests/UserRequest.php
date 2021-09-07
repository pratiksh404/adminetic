<?php

namespace Pratiksh\Adminetic\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $id = $this->user->id ?? '';
        $rules = [
            'name' => 'required|max:100',
            'email' => 'required|email|unique:users,email,'.$id,
        ];
        if ($this->getMethod() == 'POST') {
            $rules += ['password' => 'required|confirmed|min:8|max:30'];
        }

        if ($this->getMethod() == 'PATCH' || $this->getMethod() == 'PUT') {
            if ($this->password) {
                $rules += ['password' => 'required|confirmed|min:8|max:30'];
            }
        }

        return $rules;
    }
}
