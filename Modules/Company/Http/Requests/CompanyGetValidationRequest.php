<?php

namespace Modules\Company\Http\Requests;

use App\Http\Requests\Request;
use Config;
use Auth;
use Modules\User\Models\User;

/**
 * Class CompanyGetValidationRequest
 * @package Modules\Company\Http\Requests
 */
class CompanyGetValidationRequest extends Request {

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
               'name' => 'company_id',
               'comparison' => 'equals',
               'attribute' => 'company.id',
               'value' => $this->user()->company_id,
           ];
           $currentPredicates = $this->input()['predicates'] ?? [];
           array_push($currentPredicates, $companyPredicates);
           $this->merge(['predicates'=> $currentPredicates]);
        }
    }
}
