<?php

namespace Modules\Branch\Http\Requests;

use App\Http\Requests\Request;
use Config;
use Modules\User\Models\User;

/**
 * Class BranchGetValidationRequest
 * @package Modules\Branch\Http\Requests
 */
class BranchGetValidationRequest extends Request {
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
        return Config::get('validation.default_http_get');
    }
    /*
     * @return void
     */
    protected function prepareForValidation() :void {
        if($this->user()->role !== User::ROLE_ADMIN) {
            $companyPredicates = [
                'name' => 'branch_company_id',
                'comparison' => 'equals',
                'attribute' => 'branch.company_id',
                'value' => $this->user()->company_id,
            ];
            $currentPredicates = $this->input()['predicates'] ?? [];
            array_push($currentPredicates, $companyPredicates);
            $this->merge(['predicates'=> $currentPredicates]);
        }
    }
}
