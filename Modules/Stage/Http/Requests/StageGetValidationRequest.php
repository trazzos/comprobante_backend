<?php

namespace Modules\Stage\Http\Requests;

use App\Http\Requests\Request;
use Config;

/**
 * Class StageGetValidationRequest
 * @package Modules\Stage\Http\Requests
 */
class StageGetValidationRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array, rules defined into Config/validation.php
     */
    public function rules() {
        return Config::get('validation.default_http_get');
    }

}
