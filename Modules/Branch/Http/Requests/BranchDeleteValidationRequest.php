<?php

namespace Modules\Branch\Http\Requests;

use App\Http\Requests\Request;

/**
 * Class BranchDeleteValidationRequest
 * @package Modules\Branch\Http\Requests
 */
class BranchDeleteValidationRequest extends Request {
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
