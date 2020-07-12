<?php

namespace Modules\Company\Http\Requests;

use App\Http\Requests\Request;
use Config;
use Auth;

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
       if(Auth::user()->role !== 'admin') {
           $extra['name'] = 'company_id';
           $extra['comparison'] = 'equals';
           $extra['attribute'] = 'company.id';
           $extra['value'] = Auth::user()->company_id;
           $inputs=  $this->input();
           $currentPredicates = array_key_exists('predicates', $inputs) ? $inputs['predicates'] : $inputs['predicates'] = [];
           array_push($currentPredicates, $extra);
           $this->merge(['predicates' => $currentPredicates]);
        }
    }
}
