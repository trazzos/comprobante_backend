<?php

namespace Modules\User\Http\Requests;

use App\Http\Requests\Request;

/**
 * Class UserDeleteValidationRequest
 * @package Modules\User\Http\Requests
 */
class UserDeleteValidationRequest extends Request {
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
            'id' => 'integer|required'
        ];
    }
}
