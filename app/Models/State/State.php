<?php

namespace App\Models\State;

use Illuminate\Database\Eloquent\Model;
use App\Models\City\City;

class State extends Model
{
    public function search($keySearch, $totalPage = 10)
    {
        return $this
                    ->where('name', 'LIKE', "%{$keySearch}%")
                    ->orWhere('initials', $keySearch)
                    ->paginate($totalPage);
    }

    public function cities()
    {
        return $this->hasMany(City::class);
    }

    public function searchCities($cityName, $totalPage = 10)
    {
        return $this->cities()
                            ->where('name', 'LIKE', $cityName)
                            ->paginate($totalPage);
    }
}
