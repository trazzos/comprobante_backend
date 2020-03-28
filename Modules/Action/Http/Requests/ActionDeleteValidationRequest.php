<?php

namespace Modules\Action\Http\Requests;

use App\Http\Requests\Request;

/**
 * Class ActionDeleteValidationRequest
 * @package Modules\Action\Http\Requests
 */
class ActionDeleteValidationRequest extends Request
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
     * @return array
     */
    public function rules()
    {
        return [
            'id' => 'required',
        ];
    }
}
