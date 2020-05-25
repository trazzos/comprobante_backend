<?php

namespace Modules\Label\Http\Requests;

use App\Http\Requests\Request;

/**
 * Class LabelPostValidationRequest
 * @package Modules\Label\Http\Requests
 */
class LabelPostValidationRequest extends Request {
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
            'branch_id' => 'integer|required|exists:branch,id',
            'invoice_type_id' => 'integer|required|exists:invoice_type,id',
            'current' => 'integer|required',
        ];
    }
}
