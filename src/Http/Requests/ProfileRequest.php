<?php

namespace Pratiksh\Adminetic\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->id == $this->profile->id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id' => 'required|numeric',
            'username' => 'sometimes|max:100',
            'profile_pic' => 'sometimes|file|image|max:5000',
            'status' => 'sometimes|numeric|max:10',
            'gender' => 'sometimes|numeric|max:3',
            'martial_status' => 'sometimes|numeric|max:8',
            'blood_group' => 'sometimes|numeric|max:15',
            'country' => 'sometimes|max:50',
            'address' => 'sometimes|max:255',
            'phone_no' => 'sometimes|max:10',
            'email' => 'sometimes|max:255',
            'birthday' => 'sometimes|sometimes',
            'facebook' => 'sometimes|max:255',
            'instagram' => 'sometimes|max:255',
            'twitter' => 'sometimes|max:255',
            'linkedin' => 'sometimes|max:255',
            'father_name' => 'sometimes|max:255',
            'mother_name' => 'sometimes|max:255',
        ];
    }
}
