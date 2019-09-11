<?php

namespace App\Http\Requests\Panel\Brand;

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
            
            /* DADOS DA MARCA
            ================================================== */
            'name'                            => "required|unique:brands,name,{$id},id",

        ];
    }
}
