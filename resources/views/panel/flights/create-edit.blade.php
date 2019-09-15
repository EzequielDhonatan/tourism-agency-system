@extends('panel.layouts.master')

@section('content')
			
<div class="bred">
    <a class="bred" href="{{ route('index') }}">Dashboard ></a>
    <a class="bred" href="{{ route('flights.index') }}">Voos ></a>
    <a class="bred" href="#">Dados do voo</a>
</div>

<div class="title-pg">
    <h1 class="title-pg">Dados do voo</h1>
</div>

<div class="content-din">

    <div class="messages">

        @include('panel.includes.alerts') <!-- Alerts -->
        @include('panel.includes.errors') <!-- Errors -->

    </div> <!-- messages -->

    @if (isset($flight))

        <form class="form form-search form-ds" method="POST" action="{{ route('flights.update', $flight->id) }}" enctype="multipart/form-data">
            
        {!! method_field('PUT') !!}

    @else

        <form class="form form-search form-ds" method="POST" action="{{ route('flights.store') }}" enctype="multipart/form-data">

    @endif

        {{ csrf_field() }}

        @include('panel.flights._partials.general') <!-- General -->

        <div class="form-group">
            <button class="btn btn-success">Salvar</button>
            <a class="btn btn-danger" href="{{ route('flights.index') }}">Cancelar</a>
        </div>

    </form> <!-- form form-search form-ds -->

</div> <!-- content-din -->
    
@endsection