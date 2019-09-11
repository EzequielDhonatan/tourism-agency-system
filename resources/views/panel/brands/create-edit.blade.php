@extends('panel.layouts.master')

@section('content')
			
<div class="bred">
    <a class="bred" href="{{ route('index') }}">Dashboard ></a>
    <a class="bred" href="{{ route('brands.index') }}">Marcas ></a>
    <a class="bred" href="#">Dados da marca</a>
</div>

<div class="title-pg">
    <h1 class="title-pg">Dados da marca</h1>
</div>

<div class="content-din">

    @include('includes.alerts') <!-- Alerts -->
    @include('includes.errors') <!-- Errors -->

    @if (isset($brand))

        <form class="form form-search form-ds" method="POST" action="{{ route('brands.update', $brand->id) }}">
            
        {!! method_field('PUT') !!}

    @else

        <form class="form form-search form-ds" method="POST" action="{{ route('brands.store') }}">
        {{ csrf_field() }}

    @endif

        <div class="form-group">
            <input type="text" class="form-control" name="name" value="{{ $brand->name ?? old('name') }}" placeholder="Nome">
        </div>

        <div class="form-group">
            <button class="btn btn-success">Salvar</button>
            <a class="btn btn-danger" href="{{ route('brands.index') }}">Cancelar</a>
        </div>

    </form> <!-- form form-search form-ds -->

</div> <!-- content-din -->
    
@endsection