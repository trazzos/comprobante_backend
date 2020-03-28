<?php

namespace Modules\User\Http\Requests;

use App\Http\Requests\Request;
use Gate;
use Illuminate\Validation\Rule;
use Modules\User\Models\User;

/**
 * Class UserPatchValidationRequest
 * @package Modules\User\Http\Requests
 */
class UserPatchValidationRequest extends Request {
    /**
     * Determine if the user is authorized to make this request.
     * @return bool
     */
    public function authorize() {
        return Gate::allows('admin'); //Si el usuario no es admin, no podra acceder (error 401)
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'id' => 'integer|required',
            'name' => 'string|nullable',
            'email' => 'email|nullable',
            //Si pasas password vacio el password no cambia. Si pasas algo en password, tiene que ser minimo 6 caracteres
            'password' => 'string|min:6|nullable',
            'role' => [
                'required',
                'string',
                Rule::in(User::ROLES)
            ],
        ];
    }
}
