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
            'estado_animo' => 'required|string',

            //la IA ahora selecciona automaticamente el genero
            'plataforma' => 'required|string|in:Netflix,Max,Disney+,Prime Video,Hulu'
        ];
    }

    //en esta funcion estan los mensajes de aviso que se le mostraran al usuario si no cumple con las reglas de validacion de arriba
    public function messages(): array
    {
        return [
            'estado_animo.required' => 'Debes de escribir como te sientes para que se te pueda recomendar una pelicula',

            'plataforma.required' => 'Debes de seleccionar una plataforma',
            'plataforma.in' => 'Selecciona una plataforma que sea valida'
        ];
    }
}