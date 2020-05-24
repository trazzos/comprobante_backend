<?php

namespace Modules\Company\Http\Requests;

use App\Http\Requests\Request;

/**
 * Class CompanyPatchValidationRequest
 * @package Modules\Company\Http\Requests
 */
class CompanyPatchValidationRequest extends Request {
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
            'taxpayer_id' => 'string|required|min:12|max:13',
            'stamp_tax_limit' => 'integer|required|min:1'
        ];
    }
}
