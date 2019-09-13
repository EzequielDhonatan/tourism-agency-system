@extends('panel.layouts.master')

@section('content')
			
<div class="bred">
    <a class="bred" href="{{ route('index') }}">Dashboard ></a>
    <a class="bred" href="{{ route('states.index') }}">Estados</a>
</div>

<div class="title-pg">
    <h1 class="title-pg">Estados</h1>
</div>

<div class="content-din bg-white">

    <div class="messages">

        @include('panel.includes.alerts') <!-- Alerts -->
        @include('panel.includes.errors') <!-- Errors -->

    </div> <!-- messages -->

    <div class="form-search">

        @include('panel.states.search') <!-- Search -->        

    </div> <!-- form-search -->
    
    <table class="table table-striped">

        <tr>
            <th>Nome</th>
            <th>Sigla</th>
            <th width="150"></th>
        </tr>

        @forelse ($states as $state)

            <tr>

                <td>
                    {{ $state->name }}
                </td>

                <td>
                    {{ $state->initials }}
                </td>

                <td>
                    <a class="edit" href="{{ route('state.cities.search', $state->initials) }}">
                        <i class="fa fa-map-marker" aria-hidden="true"></i> Cidades
                    </a>
                </td>

            </tr> <!-- -->

        @empty

            <tr>
                <td colspan="200">Nenhum registro encontrado!</td>
            </tr>
        
        @endforelse

    </table> <!-- table table-striped -->

    @if(isset($dataForm))
        {!! $states->appends($dataForm)->links() !!}
    @else
        {!! $states->links() !!}
    @endif

</div> <!-- content-din -->
    
@endsection