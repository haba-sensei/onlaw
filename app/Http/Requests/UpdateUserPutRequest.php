<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class UpdateUserPutRequest extends FormRequest
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
            'document' => 'required',
            'num_document' => 'required|min:10|max:13|unique:users,num_document,' . Auth::user()->id . ',id',
            'fullname' => 'required|string',
            'email' => 'required|string|email|max:100|unique:users,email,' . Auth::user()->id . ',id',
            'dni_pasaporte' => 'required|min:9|max:13|unique:users,dni_pasaporte,' . Auth::user()->id . ',id',
            'telefono' => 'required|string|unique:users,telefono,' . Auth::user()->id . ',id',
            'direccion' => 'required|string|max:150',
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

    public function messages()
    {
        return [
            'num_document.unique' => 'El valor del numero de documento ya está en uso.',
        ];
    }

}