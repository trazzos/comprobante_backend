<?php

namespace Modules\AnnouncementType\Http\Requests;

use App\Http\Requests\Request;

/**
 * Class AnnouncementTypeGetValidationRequest
 * @package Modules\AnnouncementType\Http\Requests
 */
class AnnouncementTypeGetValidationRequest extends Request {
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
        return [];
    }
}
