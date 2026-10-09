<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class MovieRequest extends FormRequest
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
        return [
            'title'=>'required|min:3',
            'director'=>'required',
            'year'=>'required|numeric',
            'plot'=>'required|min:5',
            'img'=>'required|image'
        ];
    }

    public function messages(){
        return [
            'title.required'=>'Il titolo è obbligatorio',
            'title.min'=>'Il titolo richiede più di 3 caratteri',
            'director.required'=>'Il campo Regista è obbligatorio',
            'year.required'=>'Il campo anno è obbligatorio',
            'year.numeric'=>'Il campo anno deve essere composto da numeri',
            'plot.required'=>'La trama è obbligatoria',
            'plot.min'=>'Il campo trama richiede un minimo di 5 caratteri',
            'img.required'=>'L\'immagine è obbligatoria',
            'img.image'=>'Il file deve essere di tipo immagine'
        ];
    }
}
