@extends('panel.layouts.master')

@section('content')

<div class="bred">
    <a href="{{ route('index') }}" class="bred">Home  ></a>
    <a href="{{ route('reserves.index') }}" class="bred">Reservas</a>
    <a href="" class="bred">Resultados da Pesquisa</a>
</div>

<div class="title-pg">
    <h1 class="title-pg">Resultados da Pesquisa</h1>
</div>


<div class="content-din bg-white">

    @include('panel.reserves.form-search')

    <div class="messages">
        @include('panel.includes.alerts')
    </div>

    <div class="class-btn-insert">
        <a href="{{ route('reserves.create') }}" class="btn-insert">
            <span class="glyphicon glyphicon-plus"></span>
            Fazer Nova Reserva
        </a>
    </div>
    
    <table class="table table-striped">
        <tr>
            <th>#</th>
            <th>Usuário</th>
            <th>Voo</th>
            <th>Status</th>
        </tr>

        @forelse($reserves as $reserve)

            <tr>

                <td>
                    <a href="{{route('reserves.edit', $reserve->id)}}">
                        {{$reserve->id}}
                    </a>
                </td>

                <td>
                    <a href="{{route('reserves.edit', $reserve->id)}}">
                        {{$reserve->user_name}}
                    </a>
                </td>

                <td>
                    <a href="{{route('reserves.edit', $reserve->id)}}">
                        {{$reserve->flight_id}} ({{ formatDateAndTime($reserve->flight_date) }})
                    </a>
                </td>

                <td>
                    <a href="{{route('reserves.edit', $reserve->id)}}">
                        {{$reserve->status($reserve->status)}}
                    </a>
                </td>
                
            </tr>

        @empty

            <tr>
                <td colspan="200">Nenhum item cadastrado!</td>
            </tr>

        @endforelse

    </table> <!-- table -->

    {!! $reserves->appends($dataForm)->links() !!}

</div> <!-- content-din -->

@endsection