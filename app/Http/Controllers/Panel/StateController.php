<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\State\State;

class StateController extends Controller
{
    private $state;
    private $totalPage = 10;

    public function __construct(State $state)
    {
        $this->state = $state;
    }

    public function index()
    {
        $states = $this->state->paginate($this->totalPage);

        $title = 'Exibição dos estados brasileiros';

        return view('panel.states.index', compact('states', 'title'));
    }


    public function search(Request $request)
    {
        $dataForm = $request->all();

        $keySearch = $request->key_search;

        $states = $this->state->search($keySearch);

        $title = "Resultados de estado: {$keySearch}";

        return view('panel.states.index', compact('title', 'states','dataForm'));
    }
}
