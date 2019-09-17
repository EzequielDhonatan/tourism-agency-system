@extends('panel.layouts.master')

@section('content')
			
<div class="bred">
    <a class="bred" href="{{ route('index') }}">Dashboard ></a>
    <a class="bred" href="{{ route('flights.index') }}">Voos</a>
</div>

<div class="title-pg">
    <h1 class="title-pg">Voos</h1>
</div>

<div class="content-din bg-white">

    <div class="messages">

        @include('panel.includes.alerts') <!-- Alerts -->
        @include('panel.includes.errors') <!-- Errors -->

    </div> <!-- messages -->

    <div class="content-din">
        
        <div class="text-right">
            <a class="btn btn-success" href="{{ route('flights.create') }}">
                <span class="glyphicon glyphicon-plus"></span>
                Cadastrar
            </a>
        </div>

    </div> <!-- content-din -->

    <div class="form-search">

        @include('panel.flights.search') <!-- Search -->        

    </div> <!-- form-search -->
    
    <table class="table table-striped">

        <tr>
            <th>#</th>
            <th>Imagem</th>
            <th>Origem</th>
            <th>Destino</th>
            <th>Paradas</th>
            <th>Data</th>
            <th>Saída</th>
            <th width="150"></th>
        </tr>

        @forelse ($flights as $flight)

            <tr>

                <td>
                    <a href="{{ route('flights.edit', $flight->id) }}">{{ $flight->id }}</a>
                </td>

                <td>
                    <a href="{{ route('flights.edit', $flight->id) }}">
                        @if ($flight->image)
                            <img src="{{ asset("storage/flights/{$flight->image}") }}" alt="{{ $flight->id }}" style="max-width: 100px;">
                        @else
                            <img src="{{ asset("assets/panel/imgs/no-image.png") }}" alt="{{ $flight->id }}" style="max-width: 60px;">
                        @endif
                    </a>
                </td>

                <td>
                    <a href="{{ route('flights.edit', $flight->id) }}">{{ $flight->origin->name }}</a>
                </td>

                <td>
                    <a href="{{ route('flights.edit', $flight->id) }}">{{ $flight->destination->name }}</a>
                </td>

                <td>
                    <a href="{{ route('flights.edit', $flight->id) }}">{{ $flight->qty_stops }}</a>
                </td>

                <td>
                    <a href="{{ route('flights.edit', $flight->id) }}">{{ formatDateAndTime($flight->date) }}</a>
                </td>

                <td>
                    <a href="{{ route('flights.edit', $flight->id) }}">{{ formatDateAndTime($flight->hour_output, 'H:i') }}</a>
                </td>

                <td>

                    <a class="edit" href="{{ route('flights.show', $flight->id) }}">
                        <i class="fa fa-info"></i>
                    </a>

                    {!! Form::open(['route' => ['flights.destroy', $flight->id], 'class' => 'form form-search form-ds', 'method' => 'DELETE']) !!}

                        <div class="form-group">
                            {{-- <button class="delete btn btn-danger">Deletar o voo {{ $flight->id }}</button> --}}
                            <button class="delete btn btn-danger">
                                <i class="fa fa-trash"></i>
                            </button>
                        </div>

                    {!! Form::close() !!} <!-- form -->
                </td>

            </tr> <!-- -->

        @empty

            <tr>
                <td colspan="200">Nenhum registro encontrado!</td>
            </tr>
        
        @endforelse

    </table> <!-- table table-striped -->

    @if(isset($dataForm))
        {!! $flights->appends($dataForm)->links() !!}
    @else
        {!! $flights->links() !!}
    @endif

</div> <!-- content-din -->
    
@endsection