@extends('panel.layouts.master')

@section('content')
			
<div class="bred">
    <a class="bred" href="{{ route('index') }}">Dashboard ></a>
    <a class="bred" href="{{ route('brands.index') }}">Marcas</a>
    <a class="bred" href="{{ route('planes.index') }}">Aviões</a>
</div>

<div class="title-pg">
    <h1 class="title-pg">Aviões da marca <strong>{{ $brand->name }}</strong></h1>
</div>

<div class="content-din bg-white">

    <div class="form-search">

        @include('panel.planes.search') <!-- Search -->        

    </div> <!-- form-search -->
    
    <table class="table table-striped">

        <tr>
            <th>#</th>
            <th>Classe</th>
            <th>Total de Passageiros</th>
        </tr>

        @forelse ($planes as $plane)

            <tr>

                <td>
                    <a href="{{ route('planes.edit', $plane->id) }}">{{ $plane->id }}</a>
                </td>

                <td>
                    <a href="{{ route('planes.edit', $plane->id) }}">{{ $plane->class_id }}</a>
                </td>
                
                <td>
                    <a href="{{ route('planes.edit', $plane->id) }}">{{ $plane->qty_passengers }}</a>
                </td>

            </tr> <!-- -->

        @empty

            <tr>
                <td colspan="200">Nenhum registro encontrado!</td>
            </tr>
        
        @endforelse

    </table> <!-- table table-striped -->

</div> <!-- content-din -->
    
@endsection