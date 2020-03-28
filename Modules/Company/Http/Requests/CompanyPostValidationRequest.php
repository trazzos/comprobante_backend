<?php

namespace Modules\Company\Http\Requests;

use App\Http\Requests\Request;

/**
 * Class CompanyPostValidationRequest
 * @package Modules\Company\Http\Requests
 */
class CompanyPostValidationRequest extends Request {
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
            'ftr' => 'string|required|min:12|max:13|unique:company',
            'name' => 'string|required',
            'observation' => 'string|required',
            'email' => 'string|required',
            'phone' => 'string|required',
            'mobile' => 'string|required',
            'postal_code' => 'string|required',
            'address' => 'string|required',
            'exterior_number' => 'string|required',
            'interior_number' => 'string|required',
            'suburb' => 'string|required',
            'location_id' => 'string|required',
            'municipio_id' => 'string|required',
            'state_id' => 'string|required',
        ];
    }
}
