<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class EventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
           'image' => "required|image",
           "title" => "required", 
           "date" => "required",
           "city" => "required",
           "private" => "required|nullable",
           "description" => "required",
        ];
    }
    
     protected function failedValidation(Validator $validator) {
        $response = back()->with([
            "status" => "danger",
            "message" => "Erro ao processar a ação, verifique os campos digitados e tente novamente"
        ])->withErrors($validator)->withInput();

        throw (new ValidationException($validator, $response))
            ->errorBag($this->errorBag)
            ->redirectTo($this->getRedirectUrl());
    }
}
