<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Brand\Brand;
use App\Http\Requests\Panel\Brand\StoreUpdateFormRequest;

class BrandController extends Controller
{
    private $brand;
    private $totalPage = 10;

    public function __construct(Brand $brand)
    {
        $this->middleware('auth');

        $this->brand = $brand;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        ## TÍTULO
        $title = 'Marcas de aviões';

        ## RECUPERA
        $brands = $this->brand
                            ->orderBy('id', 'DESC')
                            ->paginate($this->totalPage);

        ##  RETORNO
        return view('panel.brands.index', compact('title', 'brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Cadastrar novo avião';

        return view('panel.brands.create-edit', compact('title'));
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
        if (!$this->brand->create($request->all()))
            return redirect()
                            ->back()
                            ->withError('Ops... Falha ao cadastrar!');

        ## RETORNO
        return redirect()
                        ->route('brands.index')
                        ->withSuccess('Cadastro realizado com sucesso!');
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
        if (!$brand = $this->brand->find($id))
            return redirect()
                            ->back()
                            ->withError('Ops... Registro não encontrado!');

        ## TÍTULO
        $title = "Editar marca: {$brand->name}";

        return view('panel.brands.create-edit', compact('title', 'brand'));
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
        if (!$brand = $this->brand->find($id))
            return redirect()
                            ->back()
                            ->withError('Ops... Registro não encontrado!');
        ## VERIFICA
        if (!$brand->update($request->all()))
            return redirect()
                            ->back()
                            ->withError('Ops... Falha ao atualizar!');
        ## RETORNO
        return redirect()
                        ->route('brands.index')
                        ->withSuccess('Registro atualizado com sucesso!');
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
        if (!$brand = $this->brand->find($id))
            return redirect()
                            ->back()
                            ->withError('Ops... Registro não encontrado!');
        ## VERIFICA
        if (!$brand->delete())
            return redirect()
                            ->back()
                            ->withError('Ops... Falha ao atualizar!');
        ## RETORNO
        return redirect()
                        ->route('brands.index')
                        ->withSuccess('Registro deletado com sucesso!');
    }

    public function search(Request $request)
    {
        $dataForm = $request->except('_token');

        $brands = $this->brand->search($request->key_search, $this->totalPage);

        $title = "Pesquisado: {$request->key_search}";

        return view('panel.brands.index', compact('dataForm', 'brands', 'title'));
    }
}
