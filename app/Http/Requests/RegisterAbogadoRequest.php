<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class RegisterAbogadoRequest extends FormRequest
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
            'num_document' => 'required|min:9|max:13|unique:users,num_document',
            'fullname' => 'required|string',
            'email' => 'required|string|email|max:100|unique:users,email',
            'telefono' => 'required|string|unique:users,telefono',
            'direccion' => 'required|string|max:150',
            'password' => 'required|string|min:6',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = '';
        foreach ((new ValidationException($validator))->errors() as $key => $value) {
            $errors .= $value[0] . "\n";
        }

        throw new HttpResponseException(
            response()->json([
                'success' => false,
                'error' => $errors,
                'message' => "Error de validacion",
            ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY)
        );
    }
}
