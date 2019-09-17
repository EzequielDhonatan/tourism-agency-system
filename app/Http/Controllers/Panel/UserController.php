<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Http\Requests\Panel\User\StoreUpdateFormRequest;

class UserController extends Controller
{
    private $user;
    private $totalPage = 10;

    public function __construct(User $user)
    {
        $this->user = $user;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Usuários';

        $users = $this->user->paginate($this->totalPage);

        return view('panel.users.index', compact('title', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Cadastrar Novo Usuário';
        
        return view('panel.users.create-edit', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateFormRequest $request)
    {
        if ($this->user->newUser($request))
            return redirect()
                        ->route('users.index')
                        ->with('success', 'Cadastro realizado com sucesso!');
        else
            return redirect()
                        ->back()
                        ->with('error', 'Falha ao cadastrar!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!$user = $this->user->find($id))
            return redirect()->back();

        $title = "Detalhes do Usuário: {$user->name}";
            
        return view('panel.users.show', compact('title', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if( !$user = $this->user->find($id) )
            return redirect()->back();

        $title = "Editar Usuário: {$user->name}";

        return view('panel.users.create-edit', compact('title', 'user'));
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
        if( !$user = $this->user->find($id) )
            return redirect()->back();

        if ($user->updateUser($request))
            return redirect()
                        ->route('users.index')
                        ->with('success', 'Atualizado com sucesso!');
        else
            return redirect()
                        ->back()
                        ->with('error', 'Falha ao atualizar!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if( !$user = $this->user->find($id) )
            return redirect()->back();

        if($user->delete())
            return redirect()
                ->route('users.index')
                ->with('success', 'Deletado com sucesso!');
        else
            return redirect()
                ->back()
                ->with('error', 'Falha ao deletar!');
    }

    public function search(Request $request)
    {
        $dataForm = $request->except('_token');

        $users = $this->user->search($request->key_search, $this->totalPage);

        $title = "Users, filtros para: {$request->key_search}";

        return view('panel.users.index', compact('title', 'users', 'dataForm'));
    }
}
