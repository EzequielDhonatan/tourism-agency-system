@extends('panel.layouts.master')

@section('content')
			
<div class="bred">
    <a class="bred" href="{{ route('index') }}">Dashboard ></a>
    <a class="bred" href="{{ route('flights.index') }}">Voos</a>
    <a class="bred" href="#">{{ $flight->id }}</a>
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
        
        <ul>

            <li>
                Código: <strong>{{ $flight->id }}</strong>
            </li>

            <li>
                Avião: <strong>{{ $flight->plane_id }}</strong>
            </li>

            <li>
                Origem: <strong>{{ $flight->airport_origin_id }}</strong>
            </li>

            <li>
                Destino: <strong>{{ $flight->airport_destination_id }}</strong>
            </li>

            <li>
                Data: <strong>{{ formatDateAndTime($flight->date) }}</strong>
            </li>

            <li>
                Duração: <strong>{{ formatDateAndTime($flight->time_duration, 'H:i') }}</strong>
            </li>

            <li>
                Saída: <strong>{{ formatDateAndTime($flight->hour_output, 'H:i') }}</strong>
            </li>

            <li>
                Chegada: <strong>{{ formatDateAndTime($flight->arrival_time, 'H:i') }}</strong>
            </li>

            <li>
                Valor anterior: <strong>{{ 'R$ ' . number_format($flight->old_price, 2, ',', '.') }}</strong>
            </li>

            <li>
                Valor atual: <strong>{{ 'R$ ' . number_format($flight->price, 2, ',', '.') }}</strong>
            </li>
            
            <li>
                Total de parcelas: <strong>{{ $flight->total_plots }}</strong>
            </li>

            <li>
                Promoção: <strong>{{ $flight->is_promotion ? 'Sim' : 'Não' }}</strong>
            </li>

            <li>
                Paradas: <strong>{{ $flight->qty_stops }}</strong>
            </li>

            <li>
                Descrição: <strong>{{ $flight->description }}</strong>
            </li>

        </ul>

    </div> <!-- content-din -->

</div> <!-- content-din -->
    
@endsection