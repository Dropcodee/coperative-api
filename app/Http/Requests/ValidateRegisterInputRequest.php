<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ValidateRegisterInputRequest extends FormRequest
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
     * If validator fails return the exception in json form
     * @param Validator $validator
     * @return array
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(['errors' => $validator->errors()], 422));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'guarantor_mail' => 'required|email',
            'password' => 'required|min:6',
            'phone_number' => 'required|unique:users',
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'first name is required',
            'last_name.required' => 'last name is required',
            'email.unique' => 'this email is already taken',
            'email.required' => 'email is required',
            'phone_number.unique' => 'this phone number is already taken',
            'guarantor_mail.required' => 'please you need a guarantor',
        ];
    }
}
