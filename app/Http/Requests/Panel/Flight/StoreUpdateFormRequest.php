<?php

namespace App\Http\Requests\Panel\Flight;

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
            
            /* DADOS DO VOO
            ================================================== */
            'plane_id'                          => "required|exists:planes,id",
            'airport_origin_id'                 => "required|exists:airports,id",
            'airport_destination_id'            => "required|exists:airports,id",

            // 'date'                              => 'required|date|after:tomorrow',
            'date'                              => 'required|date|after:today',
            'time_duration'                     => 'required',
            'hour_output'                       => 'required',
            'arrival_time'                      => 'required',
            'old_price'                         => 'required',
            'price'                             => 'required',
            'total_plots'                       => 'required|integer|between:1,12', ## DIGTOS ENTRE 1 E 12
            // 'is_promotion'                      => 'bollean',
            'is_promotion'                      => '',
            'image'                             => 'image',
            'qty_stops'                         => 'numeric',
            'description'                       => 'min:3|max:1000',

        ];
    }
}
