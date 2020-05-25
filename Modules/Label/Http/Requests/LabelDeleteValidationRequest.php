<?php

namespace Modules\Label\Http\Requests;

use App\Http\Requests\Request;

/**
 * Class LabelDeleteValidationRequest
 * @package Modules\Label\Http\Requests
 */
class LabelDeleteValidationRequest extends Request {
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
            'id' => 'integer|required',
        ];
    }
}
