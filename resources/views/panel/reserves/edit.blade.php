@extends('panel.layouts.master')

@section('content')

<div class="bred">
    <a href="{{ route('index') }}" class="bred">Home > </a>
    <a href="{{ route('reserves.index') }}" class="bred">Reservas > </a>
    <a href="" class="bred">Editar</a>
</div>

<div class="title-pg">
    <h1 class="title-pg">Editar reserva do usuário {{ $user->name }}</h1>
</div>

<div class="content-din">

@include('panel.includes.errors')

{!! Form::model($reserve, ['class' => 'form form-search form-ds', 'method' => 'PUT', 'route' => ['reserves.update', $reserve->id] ]) !!}

    <div class="form-group">
        <label for="status">Status</label>
        {!! Form::select('status', $status, null, ['class' => 'form-control']) !!}
    </div>

    
    <div class="form-group">
        <button class="btn btn-success">Alterar o Status</button>
    </div>

{!! Form::close() !!}

</div> <!-- content-din -->

@endsection