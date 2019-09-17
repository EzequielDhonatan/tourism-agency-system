<?php

namespace App\Http\Requests\Panel\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateFormRequest extends FormRequest
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
        $id = $this->segment(3);

        return [
            
            /* DADOS DO USUÁRIO
            ================================================== */
            'name'                            => 'required|min:3|max:100',
            'email'                           => "required|email|min:3|max:100|unique:users,email,{$id},id",
            'password'                        => 'max:15',
            'image'                           => '',

        ];
    }
}
