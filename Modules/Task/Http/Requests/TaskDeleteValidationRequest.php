<?php

namespace Modules\Task\Http\Requests;

use App\Http\Requests\Request;

/**
 * Class TaskDeleteValidationRequest
 * @package Modules\Task\Http\Requests
 */
class TaskDeleteValidationRequest extends Request
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
            'id' => 'integer|required',
        ];
    }
}
