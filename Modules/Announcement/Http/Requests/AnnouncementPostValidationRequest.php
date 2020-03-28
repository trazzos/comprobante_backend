<?php

namespace Modules\Announcement\Http\Requests;

use App\Http\Requests\Request;

/**
 * class AnnouncementPostValidationRequest
 * @package Modules\Announcement\Http\Requests
 */
class AnnouncementPostValidationRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' =>'required|string',
            'announcement_type_id' =>'required|integer',
            'date' =>'required',
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
