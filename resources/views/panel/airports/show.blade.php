@extends('panel.layouts.master')

@section('content')
			
<div class="bred">
    <a class="bred" href="{{ route('index') }}">Dashboard ></a>
    <a class="bred" href="{{ route('airports.index', $city->id) }}">Cidade {{ $city->name }} ></a>
    <a class="bred" href="#">Dados do aeroporto</a>
</div>

<div class="title-pg">
    <h1 class="title-pg">Aeroporto: {{ $airport->name }} - {{ $city->name }}</h1>
</div>

<div class="content-din bg-white">

    <div class="messages">

        @include('panel.includes.alerts') <!-- Alerts -->
        @include('panel.includes.errors') <!-- Errors -->

    </div> <!-- messages -->

    <div class="content-din">
        
        <ul>

            <li>
                Cidade: <strong>{{ $airport->city_id }}</strong>
            </li>

            <li>
                Nome: <strong>{{ $airport->name }}</li></strong>
            </li>

            <li>
                CEP: <strong>{{ $airport->zip_code }}</strong>
            </li>

            <li>
                Endereço: <strong>{{ $airport->address }}</strong>
            </li>

            <li>
                Número: <strong>{{ $airport->number }}</strong>
            </li>

            <li>
                Complemento: <strong>{{ $airport->complement }}</strong>
            </li>

            <li>
                Latitude: <strong>{{ $airport->latitude }}</strong>
            </li>

            <li>
                Longitude: <strong>{{ $airport->longitude }}</strong>
            </li>

        </ul>

    </div> <!-- content-din -->

</div> <!-- content-din -->
    
@endsection