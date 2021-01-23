<?php

namespace Modules\User\Http\Requests;


use Illuminate\Validation\Factory;
use Illuminate\Validation\Validator;
use App\Http\Requests\Request;

/**
 * Class VerificationValidationRequest
 * @package Modules\User\Http\Requests
 */
class VerificationValidationRequest extends Request
{
    /**
     * VerificationValidationRequest constructor.
     */
    public function __construct() {
        parent::__construct([], [], [], [], [], [], null);
    }

    /**
     * Determine if the user is authorized to make this request.
     * @return bool
     */
    public function authorize() : bool {
        return true;
    }

    /**
     * @param Factory $factory
     * @return \Illuminate\Validation\Validator
     * By overriding the validator method on the factory you can add custom rules per each type of resource/api call
     */
    public function validator(Factory $factory) : Validator {
        $validator = $factory->make($this->input(), $this->rules(), $this->messages(), $this->attributes());

        //Hasta este momento las reglas del validador no han sido ejecutadas, es por eso que cualquier logica debe ir
        //dentro, al ejecutar ->passes() correremos las reglas
        if($validator->passes()) {
            //Para poder saber y encontrar mas facil los parametros agregados a un request lo que hacemos es por estandard
            //agregar "requested" al nombre
            $this->request->add(['requestedUser' => $this->user()]);

            //NOTA:: $this->user() < esta ruta esta dentro del middleware de jwt.auth, lo que significa que si no enviar
            // el token o envias un token invalido NI SIQUIERA llegaremos a esta validacion, el sistema enviaria una
            //exception de token invalido o algo parecido. Por lo tanto SI LLEGAMOS AQUI, sabemos que $this->user()
            // es valido
        }

        return $validator;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() : array
    {
        return [
        ];
    }
}
