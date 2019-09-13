<?php

namespace App\Models\City;

use Illuminate\Database\Eloquent\Model;
use App\Models\State\State;

class City extends Model
{
    public function search($keySearch, $totalPage = 10)
    {
        return $this
                    ->where('name', 'LIKE', "%{$keySearch}%")
                    ->paginate($totalPage);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }
}
