<?php

namespace App\Models\Plane;

use Illuminate\Database\Eloquent\Model;
use App\Models\Brand\Brand;
use App\Models\Classe\Classe;

class Plane extends Model
{
    protected $fillable = [
        'brand_id', 'qty_passengers', 'class_id'
    ];

    public function search($keySearch, $totalPage = 10)
    {
        return $this
                    ->where('qty_passengers', 'LIKE', "%{$keySearch}%")
                    ->paginate($totalPage);
    }

    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
