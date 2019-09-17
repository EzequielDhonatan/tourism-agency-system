{!! Form::open(['route' => 'flights.search', 'class' => 'form form-inline']) !!}

    {!! Form::number('code', null, ['class' => 'form-control', 'placeholder' => 'Código']) !!}
    {!! Form::date('date', null, ['class' => 'form-control']) !!}
    {!! Form::time('hour_output', null, ['class' => 'form-control']) !!}
    {!! Form::number('total_stops', null, ['class' => 'form-control', 'placeholder' => 'Total Paradas']) !!}

    {!! Form::select('origin', $airports, null, ['class' => 'form-control']) !!}
    {!! Form::select('destination', $airports, null, ['class' => 'form-control']) !!}

    <button class="btn btn-info">Pesquisar</button>

{!! Form::close() !!} <!-- form form-inline -->

@if( isset($dataForm) )

    <div class="alert alert-info">

        <p>

            <a href="{{route('flights.index')}}"><i class="fa fa-refresh" aria-hidden="true"></i></a>

            @if( isset($dataForm['code']) )
                <p>Código: <strong>{{ $dataForm['code'] }}</strong></p>
            @endif
            
            @if( isset($dataForm['date']) )
                <p>Data: <strong>{{ formatDateAndTime($dataForm['date']) }}</strong></p>
            @endif
            
            @if( isset($dataForm['hour_output']) )
                <p>Hora de Saída: <strong>{{ $dataForm['hour_output'] }}</strong></p>
            @endif

            @if( isset($dataForm['qty_stops']) )
                <p>Total de Paradas: <strong>{{ $dataForm['qty_stops'] }}</strong></p>
            @endif
            
            @if( isset($dataForm['plane_id']) )
                <p>Marca: <strong>{{ $dataForm['plane_id'] }}</strong></p>
            @endif

            @if( isset($dataForm['airport_origin_id']) )
                <p>Origem: <strong>{{ $dataForm['airport_origin_id'] }}</strong></p>
            @endif

            @if( isset($dataForm['airport_destination_id']) )
                <p>Destino: <strong>{{ $dataForm['airport_destination_id'] }}</strong></p>
            @endif
        </p>

    </div> <!-- alert alert-info -->

@endif