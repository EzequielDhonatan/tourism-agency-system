<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Flight\Flight;
use App\Models\Plane\Plane;
use App\Models\Airport\Airport;
use App\Http\Requests\Panel\Flight\StoreUpdateFormRequest;

class FlightController extends Controller
{
    private $flight;
    private $totalPage = 10;

    public function __construct(Flight $flight)
    {
        $this->middleware('auth');

        $this->flight = $flight;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        ## TÍTULO
        $title = 'Voos disponíveis';

        ## RECUPERA
        $flights = $this->flight->getItems();

        ## MARCA
        $planes = Plane::all();

        ## CLASSE
        $airports = Airport::all();
        // $airports->prepend('Escolha o aeroporto', '');

        ##  RETORNO
        return view('panel.flights.index', compact('title', 'flights', 'planes', 'airports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        ## TÍTULO
        $title = 'Cadastrar voo';

        ## MARCA
        $planes = Plane::all();

        ## CLASSE
        $airports = Airport::all();

        return view('panel.flights.create-edit', compact('title', 'planes', 'airports'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateFormRequest $request)
    {
        $nameFile = '';

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            
            $nameFile = uniqid(date('dmYHis')).'.'.$request->image->extension();

            if (!$request->image->storeAs('flights', $nameFile))
                return redirect()
                            ->back()
                            ->withError('Ops... Falha ao fazer upload!')
                            ->withInput();

        }

        if ( $this->flight->newFlight($request, $nameFile) )
            return redirect()
                            ->route('flights.index')
                            ->withSuccess('Cadastro realizado com sucesso!');
            else
                return redirect()
                            ->back()
                            ->withError('Ops... Falha ao cadastrar!')
                            ->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        ## RECUPERA
        if (!$flight = $this->flight->with(['origin', 'destination'])->find($id))
            return redirect()
                            ->back()
                            ->withError('Ops... Registro não encontrado!')
                            ->withInput();

        ## TÍTULO
        $title = "Detalhes do voo: {$flight->id}";

        return view('panel.flights.show', compact('flight', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        ## RECUPERA
        if (!$flight = $this->flight->find($id))
            return redirect()
                            ->back()
                            ->withError('Ops... Registro não encontrado!')
                            ->withInput();

        ## TÍTULO
        $title = "Editar avião: {$flight->name}";

        ## MARCA
        $planes = Plane::all();

        ## CLASSE
        $airports = Airport::all();

        return view('panel.flights.create-edit', compact('flight', 'title', 'planes', 'airports'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateFormRequest $request, $id)
    {
        if(!$flight = $this->flight->find($id))
            return redirect()
                            ->back()
                            ->withError('Ops... Registro não encontrado!');

        $nameFile = $flight->image;

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            
            if($flight->image)
                $nameFile = $flight->image;
            else
                $nameFile = uniqid(date('dmYHis')).'.'.$request->image->extension();

            if (!$request->image->storeAs('flights', $nameFile))
                return redirect()
                            ->back()
                            ->withError('Ops... Falha ao fazer upload!')
                            ->withInput();

        }

        if ( $flight->updateFlight($request, $nameFile) )
            return redirect()
                            ->route('flights.index')
                            ->withSuccess('Registro atualizado com sucesso!');
            else
                return redirect()
                            ->back()
                            ->withError('Ops... Falha ao atualizar!')
                            ->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ## RECUPERA
        if (!$flight = $this->flight->find($id))
            return redirect()
                            ->back()
                            ->withError('Ops... Registro não encontrado!');
        ## VERIFICA
        if (!$flight->delete())
            return redirect()
                            ->back()
                            ->withError('Ops... Falha ao atualizar!');
        ## RETORNO
        return redirect()
                        ->route('flights.index')
                        ->withSuccess('Registro deletado com sucesso!');
    }

    public function search(Request $request)
    {
        $dataForm = $request->except('_token');

        $flights = $this->flight->search($request, $this->totalPage);

        $title = 'Voos pesquisado';

        ## MARCA
        $planes = Plane::all();

        ## CLASSE
        $airports = Airport::all();

        return view('panel.flights.index', compact('dataForm', 'title', 'flights', 'planes', 'airports'));
    }
}
