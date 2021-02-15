<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProfile extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id= $this->segment(3); // pega o codigo do id que esta setado na url 
        return [
            'name' => "required|min:3|max:255|unique:profiles,name,{$id},id", // faz  a validação de unique se o name é de outro id(ou seja outro registo)
            'description' => 'nullable|min:3|max:255',            
        ];
    }
}
