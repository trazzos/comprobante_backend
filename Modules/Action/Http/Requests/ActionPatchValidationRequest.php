<?php

namespace Modules\Action\Http\Requests;

use App\Http\Requests\Request;

/**
 * Class ActionPatchValidationRequest
 * @package Modules\Action\Http\Requests
 */
class ActionPatchValidationRequest extends Request
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
        return[
            'id'=> 'required',
            'name' => 'required|string',
            'accepted_extension' => 'required|array|min:1',
        ];
    }
}
