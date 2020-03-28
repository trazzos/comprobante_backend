<?php

namespace Modules\Project\Http\Requests;

use App\Http\Requests\Request;

/**
 * Class ProjectPostValidationRequest
 * @package Modules\Project\Http\Requests
 */
class ProjectPostValidationRequest extends Request {
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
            'number' => 'integer|required',
            'name' => 'string|required',
            'company_id' => 'integer|required',
            'observations' => 'string|nullable',
            'execution_mode_id' => 'integer|nullable',
            'resource_id' => 'integer|nullable',
            'award_type' => 'integer|nullable',
            'fund_id' => 'integer|nullable',
            'start_date' => 'timestamp|nullable',
            'end_date' => 'timestamp|nullable',
            'fiscal_exercise' => 'integer|nullable',
            'benefited_inhabitants' => 'integer|nullable',
            'goals' => 'string|nullable',
            'unit_of_measurement' => 'string|nullable',
            'federal_resource' => 'integer|nullable',
            'state_resource' => 'integer|nullable',
            'municipal_resource' => 'integer|nullable',
            'other_resources' => 'integer|nullable',
            'beneficiary_contribution' => 'integer|nullable',
            'total_budgeted_amount' => 'integer|nullable',
            'macro_location' => 'string|nullable',
            'micro_location' => 'string|nullable',
            'location' => 'string|nullable',
            'address' => 'string|nullable',
            'between_street' => 'string|nullable',
            'and_street' => 'string|nullable',
            'latitude' => 'string|nullable',
            'longitude' => 'string|nullable',
            'who_elaborated' => 'string|nullable',
            'position_elaborated' => 'string|nullable',
        ];
    }
}
