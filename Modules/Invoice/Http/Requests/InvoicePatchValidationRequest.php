<?php

namespace Modules\Invoice\Http\Requests;

use App\Http\Requests\Request;

/**
 * Class InvoicePatchValidationRequest
 * @package Modules\Invoice\Http\Requests
 */
class InvoicePatchValidationRequest extends Request {
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
            'company_id' => 'integer|required',
            'name' => 'string|required',
            'start' => 'integer|required',
            'end' => 'integer|required',
            'file_name_header' => 'string',
            'file_name_footer' => 'string',
            'file_name_watermark' => 'string'            
        ];
    }
}
