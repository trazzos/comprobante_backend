<?php

namespace Modules\Announcement\Http\Requests;

use App\Http\Requests\Request;

/**
 * Class AnnouncementPatchValidationRequest
 * @package Modules\Announcement\Http\Requests
 */
class AnnouncementPatchValidationRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return[
            'id'=> 'required|integer',
            'name' =>'required|string',
            'announcement_type_id' =>'required|integer',
            'announcement_type_name' =>'required|string',
            'fecha' =>'required',
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
