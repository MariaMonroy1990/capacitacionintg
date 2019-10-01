<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

     // esta funcion es opara validar funciones de usuario , roles, o condiciones de hacer tal cosa
     // si es TRUE continua con las reglas de validacion
     // si es false muere el proceso
    public function authorize()
    {

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */


     // aqui viene las reglas de validacionn
    public function rules()
    {
        return [ 
            'name'=>'required|min:6|max:15', // estas son acciones, eje: que es requerida, minimo 6 caracteres y maximo 15 caracteres
            'description'=>'required|max:40',
             
            //
        ];
    }

   //nombre de los atributos
    public function atrributes(){
        return [
            'name'=>'nombre',
            'description'=>'descripcion'
        ];


    }
    //mensajes de las validaciones
    public function messages(){
        return [
            'name.required'=>'Debes ingresar el nombre',
        ];


    }

}
