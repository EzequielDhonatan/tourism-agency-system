@extends('site.layouts.master')

@section('content')

<section class="slide"></section> <!-- slide -->

<div class="actions-form">
    <h2>Encontre: </h2>

    {!! Form::open(['route' => 'search.flights.site', 'class' => 'form-home text-center']) !!}

        <div class="form-group">
            {!! Form::text('origin', null, ['class' => 'form-control', 'list' => 'origin', 'required', 'placeholder' => 'Cidade Origem']) !!}
            <datalist id="origin">
                @forelse($airports as $airport)
                    <option value="{{ $airport->id }} - {{ $airport->city->name }} / {{ $airport->name }}">
                @empty
                @endforelse
            </datalist>
        </div>

        <div class="form-group">
            {!! Form::text('destination', null, ['class' => 'form-control', 'list' => 'destination', 'required', 'placeholder' => 'Cidade Destino']) !!}
            <datalist id="destination">
                @forelse($airports as $airport)
                    <option value="{{ $airport->id }} - {{ $airport->city->name }} / {{ $airport->name }}">
                @empty
                @endforelse
            </datalist>
        </div>

        <div class="form-group">
            {!! Form::date('date', null, ['class' => 'form-control', 'required']) !!}
        </div>

        <button class="btn" type="submit">
                Procurar <i class="fa fa-search" aria-hidden="true"></i>
        </button>

    {!! Form::close() !!} <!-- form-home text-center -->

</div> <!-- actions-form -->

<div class="rectangle"></div> <!-- rectangle -->

<div class="clear"></div>

<section class="banner">
    <div class="container banner-ctc-background-over-white card">

        <div class="row">

            <div class="col-md-3 text-center">
                <img class="banner-ctc-img" src="{{ url('assets/site/images/cards.png') }}">
            </div>

            <div class="col-md-7">
                
                <div class="banner-ctc-titulo-contenedor"><span>Agência de Turimo</span></div>
                
                <div>
                    <p>PASSAGENS AÉREAS MAIS BARATO QUE UM CAFÉ POR DIA!</p>
                </div>

            </div>

            <div class="col-md-2">
                <a href="#" target="_blank" class="btn pull-right btn-flat flat-medium third-level">
                    <span>Saiba Mais</span>
                </a>
            </div>
            
        </div>
    </div>

</section> <!-- banner -->

@endsection