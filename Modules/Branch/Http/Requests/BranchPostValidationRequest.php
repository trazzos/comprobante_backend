<?php

namespace Modules\Branch\Http\Requests;

use App\Http\Requests\Request;
use Auth;

/**
 * Class BranchPostValidationRequest
 * @package Modules\Branch\Http\Requests
 */
class BranchPostValidationRequest extends Request {
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
            'zip_code' => 'string|required|',
        ];
    }
}
