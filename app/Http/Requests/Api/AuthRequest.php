<?php

namespace App\Http\Requests\Api;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response;

class AuthRequest extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required|size:8',
        ];
    }

    /**
     * @param Validator $validator
     */
    public function failedValidation(Validator $validator) {
        throw new HttpResponseException(response()->json(['message' => $validator->errors()->first()], Response::HTTP_UNPROCESSABLE_ENTITY));
    }

    public function attributes() {
        return [];
    }

    public function messages() {
        return [];
    }
}
