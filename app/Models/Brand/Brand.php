<?php

namespace App\Models\Brand;

use Illuminate\Database\Eloquent\Model;
use App\Models\Plane\Plane;

class Brand extends Model
{
    protected $fillable = ['name'];

    public function search($keySearch, $totalPage = 10)
    {
        return $this
                    ->where('name', 'LIKE', "%{$keySearch}%")
                    ->paginate($totalPage);
    }

    ## SEARCH PLANE
    public function planes()
    {
        return $this->hasMany(Plane::class);
    }
}
