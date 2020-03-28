<?php

namespace Modules\Announcement\Http\Requests;

use App\Http\Requests\Request;

/**
 * Class AnnouncementDeleteValidationRequest
 * @package Modules\Announcement\Http\Requests
 */
class AnnouncementDeleteValidationRequest extends Request
{
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

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
