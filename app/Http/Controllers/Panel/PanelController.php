<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Brand\Brand;
use App\Models\Plane\Plane;
use App\Models\State\State;
use App\Models\City\City;
use App\Models\Airport\Airport;
use App\Models\Flight\Flight;
use App\Models\Reserve\Reserve;
use App\User;

class PanelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totalBrands = Brand::count();
        $totalPlanes = Plane::count();
        $totalStates = State::count();
        $totalCities = City::count();
        $totalAirports = Airport::count();
        $totalFlights = Flight::count();
        $totalUsers = User::count();
        $totalReserves = Reserve::count();

        return view('panel.home.index', compact(
            'totalBrands', 'totalPlanes', 'totalStates', 'totalCities', 
            'totalAirports', 'totalFlights', 'totalUsers', 'totalReserves', 
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
