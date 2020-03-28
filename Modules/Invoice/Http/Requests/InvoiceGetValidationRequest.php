<?php

namespace Modules\Invoice\Http\Requests;

use App\Http\Requests\Request;

/**
 * Class InvoiceGetValidationRequest
 * @package Modules\Invoice\Http\Requests
 */
class InvoiceGetValidationRequest extends Request {
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
            'predicates' => 'array|nullable',
            'predicates.*.name' => 'string|required',
            'predicates.*.comparison' => 'string|required',
            'predicates.*.attribute' => 'string|required',
            'predicates.*.value' => 'required',
            'sorts' => 'array|nullable',
            'sorts.*.attribute' => 'string|required',
            'sorts.*.direction' => 'string|required',
            'page' => 'integer|required',
            'per_page' => 'integer|required',
        ];
    }
}
