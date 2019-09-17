<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Airport\Airport;
use App\Models\City\City;
use App\Http\Requests\Panel\Airport\StoreUpdateFormRequest;

class AirportController extends Controller
{
    private $airport, $city;
    private $totalPage = 10;

    public function __construct(Airport $airport, City $city)
    {
        $this->middleware('auth');

        $this->airport  = $airport;
        $this->city     = $city;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idCity)
    {
        ## CIDADE
        if(!$city = $this->city->find($idCity))
            return redirect()->back();

        ## TÍTULO
        $title = "Aeroportos da cidade {$city->name}";

        ## AEROPORTOS
        $airports = $city->airports()->paginate($this->totalPage);

        ##  RETORNO
        return view('panel.airports.index', compact('city', 'title', 'airports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idCity)
    {
        ## CIDADE
        $city = $this->city->find($idCity);

        $cities = $this->city->all();

        ## TÍTULO
        $title = "Aeroportos para a cidade {$city->name}";

        ##  RETORNO
        return view('panel.airports.create-edit', compact('city', 'cities', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateFormRequest $request, $idCity)
    {
        if (!$city = $this->city->find($idCity))
            return redirect()-back();

        if ( $city->airports()->create($request->all()) )
            return redirect()
                            ->route('airports.index', $idCity)
                            ->withSuccess('Cadastro realizado com sucesso!');

        return redirect()
                        ->back()
                        ->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idCity, $id)
    {
        if(!$airport = $this->airport->with('city')->find($id))
            return redirect()->back();

        $city = $airport->city;

        $title = "Editar Aeroporto {$airport->name}";

        return view('panel.airports.show', compact('airport', 'city', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idCity, $id)
    {
        if(!$airport = $this->airport->with('city')->find($id))
            return redirect()->back();

        $city = $airport->city;
        $cities = $this->city->all();

        $title = "Editar Aeroporto {$airport->name}";

        return view('panel.airports.create-edit', compact('airport', 'city', 'cities', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateFormRequest $request, $id, $idCity)
    {
        if(!$airport = $this->airport->find($id))
            return redirect()->back();
        
        if( $airport->update($request->all()) )
            return redirect()
                            ->route('airports.index', $idCity)
                            ->withSuccess('Registro atualizado com sucesso!');

        return redirect()
                        ->back()
                        ->withError('Falha ao atualizar!')
                        ->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idCity, $id)
    {
        if ( !$airport = $this->airport->find($id) )
            return redirect()->back();

        if ( $airport->delete() )
            return redirect()
                        ->route('airports.index', $idCity)
                        ->withSuccess( 'Registro deletado com sucesso!');
        
        return redirect()
                        ->back()
                        ->withError( 'Ops... Falha ao deletar!');
    }

    public function search($idCity, Request $request)
    {
        if( !$city = $this->city->find($idCity) )
            return redirect()->back();

        $airports = $this->airport->search($city, $request, $this->totalPage);

        $title = "Aeroportos da cidade {$city->name}";

        $dataForm = $request->except('_token');

        return view('panel.airports.index', compact('city', 'title', 'airports', 'dataForm'));
    }
}
