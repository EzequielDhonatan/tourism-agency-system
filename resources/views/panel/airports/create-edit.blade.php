@extends('panel.layouts.master')

@section('content')
			
<div class="bred">
    <a class="bred" href="{{ route('index') }}">Dashboard ></a>
    <a class="bred" href="{{ route('airports.index', $city->id) }}">Cidade {{ $city->name }} ></a>
    <a class="bred" href="#">Dados do aeroporto</a>
</div>

<div class="title-pg">
    <h1 class="title-pg">Dados do aeroporto para a cidade {{ $city->name }}</h1>
</div>

<div class="content-din">

    <div class="messages">

        @include('panel.includes.alerts') <!-- Alerts -->
        @include('panel.includes.errors') <!-- Errors -->

    </div> <!-- messages -->

    @if (isset($airport))

        <form class="form form-search form-ds" method="POST" action="{{ route('airports.update', [$city->id, $airport->id]) }}">
            
        {!! method_field('PUT') !!}

    @else

        <form class="form form-search form-ds" method="POST" action="{{ route('airports.store', $city->id) }}">

    @endif

        {{ csrf_field() }}

        @include('panel.airports._partials.general') <!-- General -->

        <div class="form-group">
            <button class="btn btn-success">Salvar</button>
            <a class="btn btn-danger" href="{{ route('airports.index', $city->id) }}">Cancelar</a>
        </div>

    </form> <!-- form form-search form-ds -->

</div> <!-- content-din -->
    
@endsection