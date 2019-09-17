@extends('panel.layouts.master')

@section('content')
			
<div class="bred">
    <a class="bred" href="{{ route('index') }}">Dashboard ></a>
    <a class="bred" href="{{ route('users.index') }}">Usuários</a>
</div>

<div class="title-pg">
    <h1 class="title-pg">Usuários</h1>
</div>

<div class="content-din bg-white">

    <div class="messages">

        @include('panel.includes.alerts') <!-- Alerts -->
        @include('panel.includes.errors') <!-- Errors -->

    </div> <!-- messages -->

    <div class="content-din">

        <div class="text-right">
            <a class="btn btn-success" href="{{ route('users.create') }}">
                <span class="glyphicon glyphicon-plus"></span>
                Cadastrar
            </a>
        </div>

    </div> <!-- content-din -->

    <div class="form-search">

        @include('panel.users.search') <!-- Search -->        

    </div> <!-- form-search -->
    
    <table class="table table-striped">

        <tr>
            <th>#</th>
            <th>Imagem</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th width="150"></th>
        </tr>

        @forelse ($users as $user)

            <tr>

                <td>
                    <a href="{{ route('users.edit', $user->id) }}">{{ $user->id }}</a>
                </td>

                <td>
                    <a href="{{ route('users.edit', $user->id) }}">
                        @if($user->image)
                            <img src="{{ url("storage/users/{$user->image}") }}" alt="{{ $user->id }}" style="max-width: 100px;">
                        @else
                            <img src="{{ url('assets/panel/imgs/no-image.png') }}" alt="{{ $user->id }}" style="max-width: 60px;">
                        @endif
                    </a>
                </td>

                <td>
                    <a href="{{ route('users.edit', $user->id) }}">{{ $user->name }}</a>
                </td>

                <td>
                    <a href="{{ route('users.edit', $user->id) }}">{{ $user->email }}</a>
                </td>

                <td>
                    {!! Form::open(['class' => 'form form-search form-ds', 'method' => 'DELETE', 'route' => ['users.destroy', $user->id]]) !!}
                    
                        <button type="submit" class="delete">
                            <i class="fa fa-trash"></i>
                        </button>
                    
                    {!! Form::close() !!}
                    <a class="edit" href="{{ route('users.show', $user->id) }}">View</a>
                </td>

            </tr> <!-- -->

        @empty

            <tr>
                <td colspan="200">Nenhum registro encontrado!</td>
            </tr>
        
        @endforelse

    </table> <!-- table table-striped -->

    @if(isset($dataForm))
        {!! $users->appends($dataForm)->links() !!}
    @else
        {!! $users->links() !!}
    @endif

</div> <!-- content-din -->
    
@endsection