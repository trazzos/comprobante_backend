<?php

namespace Modules\Task\Http\Requests;

use App\Http\Requests\Request;

/**
 * class TaskPostValidationRequest
 * @package Modules\Task\Http\Requests
 */
class TaskPostValidationRequest extends Request
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
            'name' =>'required|string',
            'comment' =>'string',
            'legal_basis' =>'string',
            'create_pdf' =>'boolean',
            'stage_id' => 'required',
        ];
    }
}
