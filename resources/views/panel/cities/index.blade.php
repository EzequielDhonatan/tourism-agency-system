@extends('panel.layouts.master')

@section('content')
			
<div class="bred">
    <a class="bred" href="{{ route('index') }}">Dashboard ></a>
    <a class="bred" href="{{ route('states.index') }}">Estados ></a>
    <a class="bred" href="{{ route('state.cities', $state->initials) }}">{{ $state->name }} ></a>
    <a class="bred" href="#">Cidade</a>
</div>

<div class="title-pg">
    <h1 class="title-pg">Cidades do estado ({{ $cities->count() }} de {{ $cities->total() }}): <strong>{{ $state->name }}</strong></h1>
</div>

<div class="content-din bg-white">

    <div class="form-search">

        @include('panel.cities.search') <!-- Search -->

    </div> <!-- form-search -->
    
    <table class="table table-striped">

        <tr>
            <th>Nome</th>
            <th width="150"></th>
        </tr>

        @forelse ($cities as $city)

            <tr>

                <td>
                    {{$city->name}}
                </td>

            </tr> <!-- -->

        @empty

            <tr>
                <td colspan="200">Nenhum registro encontrado!</td>
            </tr>
        
        @endforelse

    </table> <!-- table table-striped -->

    @if(isset($dataForm))
        {!! $cities->appends($dataForm)->links() !!}
    @else
        {!! $cities->links() !!}
    @endif

</div> <!-- content-din -->
    
@endsection