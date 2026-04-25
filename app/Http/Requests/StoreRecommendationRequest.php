<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreRecommendationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        //Aqui estoy definiendo las reglas de validacion para los campos del formularoi del moodCine
        return [
            'estado_animo'=>'required|string',
            //la regla in se coloco porque como son selects, se debe de validar que el valor o seleccion sea una que se encuentre dentro de las opciones que tiene cada select
            'genero'=>'required|string|in:Comedia,Drama,Acción,Romance,Terror,Suspenso,Ciencia ficción,Animación',
            'plataforma'=>'required|string|in:Netflix,Max,Disney+,Prime Video,Hulu'
        ];
    }

    //en esta funcion estan los mensajes de aviso que se le mostraran al usuario si no cumple con las reglas de validacion de arriba
    public function messages():array
    {
        return[
            'estado_animo.required'=>'Debes de Escribir como te sientes para que se te pueda recomendar una pelicula',
            'genero.required'=>'Debes de seleccionar un genero ',
            'genero.in'=>'Selecciona un genero que sea valido',
            'plataforma.required'=>'Debes de seleccionar una plataforma',
            'plataforma.in'=>'Selecciona una plataforma que sea valida'
        ];
    }
}
