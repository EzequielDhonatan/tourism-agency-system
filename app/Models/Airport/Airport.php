<?php

namespace App\Models\Airport;

use Illuminate\Database\Eloquent\Model;
use App\Models\City\City;

class Airport extends Model
{
    protected $fillable = [
        'city_id', 'name', 'zip_code', 'address', 'number', 'complement', 'latitude', 'longitude'
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function search(City $city, $request, $totalPage)
    {
        $airports = $city->airport()
                            ->where('name', 'LIKE', "%{$request->key_search}%")
                            ->paginate($totalPage);

        return $airports;
    }
}
