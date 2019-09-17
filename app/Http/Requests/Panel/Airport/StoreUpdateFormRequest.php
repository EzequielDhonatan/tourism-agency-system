<?php

namespace App\Http\Requests\Panel\Airport;

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
        $id = $this->segment(5);

        return [
            
            /* DADOS DO AEROPORTO
            ================================================== */
            'city_id'                           => 'required',
            
            'name'                              => "required|min:3|max:100|unique:airports,name,{$id},id",
            'zip_code'                          => 'required',
            'address'                           => 'required|min:3|max:100',
            'number'                            => 'required|numeric',
            'complement'                        => 'max:191',
            'latitude'                          => 'required|integer',
            'longitude'                         => 'required|integer',

        ];
    }
}
