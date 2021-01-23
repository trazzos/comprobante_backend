<?php

namespace Modules\User\Http\Requests;

use App\Http\Requests\Request;
use Config;
use Modules\User\Models\User;

/**
 * Class UserGetValidationRequest
 * @package Modules\User\Http\Requests
 */
class UserGetValidationRequest extends Request {
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
                'name' => 'user_company_id',
                'comparison' => 'equals',
                'attribute' => 'user.company_id',
                'value' => $this->user()->company_id,
            ];
            $currentPredicates = $this->input()['predicates'] ?? [];
            array_push($currentPredicates, $companyPredicates);
            $this->merge(['predicates'=> $currentPredicates]);
        }
    }
}
