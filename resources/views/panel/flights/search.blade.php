<form class="form form-inline" method="POST" action="{{ route('flights.search') }}">

    {{ csrf_field() }}

    <input type="number" class="form-control" id="code" name="code" placeholder="Código">
    <input type="date" class="form-control" id="date" name="date" placeholder="Data">
    <input type="time" class="form-control" id="hour_output" name="hour_output" placeholder="Hora de Saída">
    <input type="text" class="form-control" id="qty_stops" name="qty_stops" placeholder="Paradas">

    <select class="form-control" id="plane_id" name="plane_id">
        <option value="">Marca</option>
        @foreach($planes as $plane_id)
            <option value="{{ $plane_id->id }}"
            @if( (isset($flight) && $flight->plane_id == $plane_id->id) || old('plane_id') == $plane_id->id )
                selected
            @endif
            >{{ $plane_id->brand_id }}</option>
        @endforeach
    </select>

    <select class="form-control" id="airport_origin_id" id="" name="airport_origin_id">
        <option value="">Origem</option>
        @foreach($airports as $airport_origin_id)
            <option value="{{ $airport_origin_id->id }}"
            @if( (isset($flight) && $flight->airport_origin_id == $airport_origin_id->id) || old('airport_origin_id') == $airport_origin_id->id )
                selected
            @endif
            >{{ $airport_origin_id->name }}</option>
        @endforeach
    </select>
    
    <select class="form-control" id="airport_destination_id" name="airport_destination_id">
        <option value="">Selecione</option>
        @foreach($airports as $airport_destination_id)
            <option value="{{ $airport_destination_id->id }}"
            @if( (isset($flight) && $flight->airport_destination_id == $airport_destination_id->id) || old('airport_destination_id') == $airport_destination_id->id )
                selected
            @endif
            >{{ $airport_destination_id->name }}</option>
        @endforeach
    </select>

    <br> <br>

    <button class="btn btn-primary">Pesquisar</button>

</form> <!-- form form-inline -->

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