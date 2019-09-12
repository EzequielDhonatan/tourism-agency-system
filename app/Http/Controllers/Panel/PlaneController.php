<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Plane\Plane;
use App\Models\Brand\Brand;
use App\Models\Classe\Classe;
use App\Http\Requests\Panel\Plane\StoreUpdateFormRequest;

class PlaneController extends Controller
{
    private $plane;
    private $totalPage = 10;

    public function __construct(Plane $plane)
    {
        $this->middleware('auth');

        $this->plane = $plane;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        ## TÍTULO
        $title = 'Listagem de Aviões';

        ## RECUPERA
        $planes = $this->plane
                            ->with(['brand', 'classe'])
                            ->orderBy('id', 'DESC')
                            ->paginate($this->totalPage);

        ##  RETORNO
        return view('panel.planes.index', compact('title', 'planes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        ## TÍTULO
        $title = 'Cadastrar novo avião';

        ## MARCA
        $brands = Brand::all();

        ## CLASSE
        $classes = Classe::all();

        return view('panel.planes.create-edit', compact('title', 'brands', 'classes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateFormRequest $request)
    {
        ## VERIFICA
        if (!$this->plane->create($request->all()))
            return redirect()
                            ->back()
                            ->withError('Ops... Falha ao cadastrar!')
                            ->withInput();

        ## RETORNO
        return redirect()
                        ->route('planes.index')
                        ->withSuccess('Cadastro realizado com sucesso!')
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
        ## RECUPERA
        if (!$plane = $this->plane->find($id))
            return redirect()
                            ->back()
                            ->withError('Ops... Registro não encontrado!')
                            ->withInput();

        ## TÍTULO
        $title = "Editar avião: {$plane->name}";

        ## MARCA
        $brands = Brand::all();

        ## CLASSE
        $classes = Classe::all();

        return view('panel.planes.create-edit', compact('title', 'plane', 'brands', 'classes'));
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
        ## RECUPERA
        if (!$plane = $this->plane->find($id))
            return redirect()
                            ->back()
                            ->withError('Ops... Registro não encontrado!')
                            ->withInput();
        ## VERIFICA
        if (!$plane->update($request->all()))
            return redirect()
                            ->back()
                            ->withError('Ops... Falha ao atualizar!')
                            ->withInput();
        ## RETORNO
        return redirect()
                        ->route('planes.index')
                        ->withSuccess('Registro atualizado com sucesso!')
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
        if (!$plane = $this->plane->find($id))
            return redirect()
                            ->back()
                            ->withError('Ops... Registro não encontrado!');
        ## VERIFICA
        if (!$plane->delete())
            return redirect()
                            ->back()
                            ->withError('Ops... Falha ao atualizar!');
        ## RETORNO
        return redirect()
                        ->route('planes.index')
                        ->withSuccess('Registro deletado com sucesso!');
    }

    public function search(Request $request)
    {
        $dataForm = $request->except('_token');

        $planes = $this->plane->search($request->key_search, $this->totalPage);

        $title = "Pesquisado: {$request->key_search}";

        return view('panel.planes.index', compact('dataForm', 'planes', 'title'));
    }
}
