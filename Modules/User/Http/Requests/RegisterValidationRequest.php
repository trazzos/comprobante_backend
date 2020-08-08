<?php

namespace Modules\User\Http\Requests;

use App\Http\Requests\Request;
/**
 * Class RegisterValidationRequest
 * @package Modules\User\Http\Requests
 */
class RegisterValidationRequest extends Request {
    /**
     * Determine if the user is authorized to make this request.
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'name' => 'string|required',
            'taxpayer_id' => 'string|required|between:12,13',
            'zip_code' => 'string|min:5|max:5|required',
            'email' => 'required|email|unique:user,email',
            'password' => 'string|required|confirmed',

        ];
    }
}
