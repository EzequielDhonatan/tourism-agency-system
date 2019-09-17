@extends('panel.layouts.master')

@section('content')
			
<div class="bred">
    <a class="bred" href="{{ route('index') }}">Dashboard ></a>
    <a class="bred" href="{{ route('airports.index', $city->id) }}">Aeroportos ></a>
</div>

<div class="title-pg">
    <h1 class="title-pg">Aeroportos da cidade: {{ $city->name }}</h1>
</div>

<div class="content-din bg-white">

    <div class="content-din">

        <div class="text-right">
            <a class="btn btn-success" href="{{ route('airports.create', $city->id) }}">
                <span class="glyphicon glyphicon-plus"></span>
                Cadastrar
            </a>
        </div>

    </div> <!-- content-din -->

    <div class="form-search">

        @include('panel.airports.search') <!-- Search -->

    </div> <!-- form-search -->
    
    <table class="table table-striped">

        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Endereço</th>
            <th width="150"></th>
        </tr>

        @forelse ($airports as $airport)

            <tr>

                <td>
                    <a href="{{ route('airports.edit', [$city->id, $airport->id]) }}">
                        {{ $airport->id }}
                    </a>
                </td>

                <td>
                    <a href="{{ route('airports.edit', [$city->id, $airport->id]) }}">
                        {{ $airport->name }}
                    </a>
                </td>

                <td>
                    <a href="{{ route('airports.edit', [$city->id, $airport->id]) }}">
                        {{ $airport->address }}
                    </a>
                </td>

                <td>
                    <a class="edit" href="{{ route('airports.show', [$city->id, $airport->id]) }}">View</a>
                    <a class="delete" href="{{ route('airports.destroy', [$city->id, $airport->id]) }}">Delete</a>
                </td>

            </tr> <!-- -->

        @empty

            <tr>
                <td colspan="200">Nenhum registro encontrado!</td>
            </tr>
        
        @endforelse

    </table> <!-- table table-striped -->

    @if(isset($dataForm))
        {!! $airports->appends($dataForm)->links() !!}
    @else
        {!! $airports->links() !!}
    @endif

</div> <!-- content-din -->
    
@endsection