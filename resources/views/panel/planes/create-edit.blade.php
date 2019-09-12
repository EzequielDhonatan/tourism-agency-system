@extends('panel.layouts.master')

@section('content')
			
<div class="bred">
    <a class="bred" href="{{ route('index') }}">Dashboard ></a>
    <a class="bred" href="{{ route('planes.index') }}">Aviões ></a>
    <a class="bred" href="#">Dados do avião</a>
</div>

<div class="title-pg">
    <h1 class="title-pg">Dados do avião</h1>
</div>

<div class="content-din">

    <div class="messages">

        @include('panel.includes.alerts') <!-- Alerts -->
        @include('panel.includes.errors') <!-- Errors -->

    </div> <!-- messages -->

    @if (isset($plane))

        <form class="form form-search form-ds" method="POST" action="{{ route('planes.update', $plane->id) }}">
            
        {!! method_field('PUT') !!}

    @else

        <form class="form form-search form-ds" method="POST" action="{{ route('planes.store') }}">

    @endif

        {{ csrf_field() }}

        @include('panel.planes._partials.general') <!-- General -->

        <div class="form-group">
            <button class="btn btn-success">Salvar</button>
            <a class="btn btn-danger" href="{{ route('planes.index') }}">Cancelar</a>
        </div>

    </form> <!-- form form-search form-ds -->

</div> <!-- content-din -->
    
@endsection