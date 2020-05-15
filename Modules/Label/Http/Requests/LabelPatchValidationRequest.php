<?php

namespace Modules\Label\Http\Requests;

use App\Http\Requests\Request;

/**
 * Class LabelPatchValidationRequest
 * @package Modules\Label\Http\Requests
 */
class LabelPatchValidationRequest extends Request {
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
            'name' => 'string|required',
            'branch_id' => 'integer|required',
            'invoice_type_id' => 'integer|required|exists:invoice_type,id',
            'current' => 'integer|required',
        ];
    }
}
