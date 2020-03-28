<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

abstract class Request extends FormRequest
{
    /**
     * @param Validator $validator
     */
    protected function failedValidation(Validator $validator) {
        $responseData = [
            "message" => null,
        ];

        $this->setErrorMessage($responseData, $validator->errors()->toArray());

        throw new HttpResponseException(response()->json($responseData, Response::HTTP_UNPROCESSABLE_ENTITY));
    }

    /**
     * @param $responseData
     * @param array $errors
     */
    private function setErrorMessage(&$responseData, array $errors) {
        foreach($errors as $error){
            $responseData['message'] .= $error[0]."<br>";
        }
        $responseData['message'] = rtrim($responseData['message'], "<br>");
    }

    public function messages() {
        return [
            //'in_array_valid_keys' => trans('api::api.validatorMessages.inArrayValidKeys'),
            //'in_array_valid_values' => trans('api::api.validatorMessages.inArrayValidValues'),
        ];
    }
}
