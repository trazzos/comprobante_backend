<?php

namespace Modules\Project\Http\Requests;

use App\Http\Requests\Request;

/**
 * Class ProjectDeleteValidationRequest
 * @package Modules\Project\Http\Requests
 */
class ProjectDeleteValidationRequest extends Request {
    /**
     * Determine if the project is authorized to make this request.
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
