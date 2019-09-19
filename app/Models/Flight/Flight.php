<?php

namespace App\Models\Flight;

use Illuminate\Database\Eloquent\Model;
use App\Models\Airport\Airport;
use App\Models\Plane\Plane;
use App\Models\Reserve\Reserve;
use Carbon\Carbon;

class Flight extends Model
{
    ## CHECKBOX
    protected $casts = [
        'is_promotion' => 'boolean',
    ];

    protected $fillable = [
        'plane_id',
        'airport_origin_id',
        'airport_destination_id',
        'date',
        'time_duration',
        'hour_output',
        'arrival_time',
        'old_price',
        'price',
        'total_plots',
        'is_promotion',
        'image',
        'qty_stops',
        'description',
    ];

    ## INDEX
    public function getItems()
    {
        return $this
                    ->with(['origin', 'destination'])
                    ->orderBy('id', 'DESC')
                    ->paginate($this->totalPage);
    }

    ## STORE
    public function newFlight($request, $nameFile = '')
    {
        /*
        $data = $request->all();
        $data['airport_origin_id'] = $request->origin;
        $data['airport_destination_id'] = $request->destination;
        //dd($data);
        */
        $data = $request->all();
        $data['image'] = $nameFile;
        return $this->create($data);
    }

    ## UPDATE
    public function updateFlight($request, $nameFile = '')
    {
        /*
        $data = $request->all();
        $data['airport_origin_id']          = $request->origin;
        $data['airport_destination_id']     = $request->destination;
        */
        $data = $request->all();
        $data['image'] = $nameFile;
        
        return $this->update($data);
    }

    public function origin()
    {
        return $this->belongsTo(Airport::class, 'airport_origin_id');
    }

    public function destination()
    {
        return $this->belongsTo(Airport::class, 'airport_destination_id');
    }

    public function plane()
    {
        return $this->belongsTo(Plane::class);
    }

    public function reserves()
    {
        return $this->hasMany(Reserve::class)
                        ->where('reserves.status', '<>', 'canceled');
    }

    /*
    public function getDateAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }
    */

    public function search($request, $totalPage)
    {
        $flights = $this->where(function ($query) use ($request) {

            if ($request->code)
                $query->where('id', $request->code);
            
            if ($request->date)
                $query->where('date', '>=', $request->date);

            if ($request->hour_output)
                $query->where('hour_output', $request->hour_output);

            if ($request->qty_stops)
                $query->where('qty_stops', $request->qty_stops);

            if ($request->plane_id)
                $query->where('plane_id', $request->plane_id);

            if ($request->airport_origin_id)
                $query->where('airport_origin_id', $request->airport_origin_id);

            if ($request->airport_destination_id)
                $query->where('airport_destination_id', $request->airport_destination_id);

        })
        ->paginate($totalPage);
        // ->toSql();

        return $flights;
    }

    public function searchFlights($origin, $destination, $date)
    {
        return $this->where('flights.airport_origin_id', $origin)
                ->where('flights.airport_destination_id', $destination)
                ->where('flights.date', $date)
                ->get();
    }

    public function promotions()
    {
        return $this->where('is_promotion', true)
                ->where('date', '>=', date('Y-m-d'))
                ->with(['origin.city', 'destination.city'])
                ->get();
    }
}
