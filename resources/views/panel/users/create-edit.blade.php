@extends('panel.layouts.master')

@section('content')
			
<div class="bred">
    <a class="bred" href="{{ route('index') }}">Dashboard ></a>
    <a class="bred" href="{{ route('users.index') }}">Usuários ></a>
    <a class="bred" href="#">Dados do usuário</a>
</div>

<div class="title-pg">
    <h1 class="title-pg">Dados do usuário</h1>
</div>

<div class="content-din">

    <div class="messages">

        @include('panel.includes.alerts') <!-- Alerts -->
        @include('panel.includes.errors') <!-- Errors -->

    </div> <!-- messages -->

    @if (isset($user))

        {!! Form::model($user, ['class' => 'form form-search form-ds', 'method' => 'PUT', 'route' => ['users.update', $user->id]]) !!}

    @else

        {!! Form::open(['class' => 'form form-search form-ds', 'method' => 'POST', 'route' => 'users.store']) !!}

    @endif

        {{ csrf_field() }}

        @include('panel.users._partials.general') <!-- General -->

        <div class="form-group">
            <button class="btn btn-success">Salvar</button>
            <a class="btn btn-danger" href="{{ route('users.index') }}">Cancelar</a>
        </div>

    {!! Form::close() !!} <!-- form form-search form-ds -->

</div> <!-- content-din -->
    
@endsection