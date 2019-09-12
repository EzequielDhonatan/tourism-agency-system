<?php

namespace App\Http\Requests\Panel\Plane;

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
            
            /* DADOS DO AVIÃO
            ================================================== */
            'brand_id'                          => 'required',
            'qty_passengers'                    => 'required|integer',
            // 'class_id'                          => 'required|in:economic,luxury',
            'class_id'                          => 'required',

        ];
    }
}
