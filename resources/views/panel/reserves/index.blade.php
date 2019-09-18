@extends('panel.layouts.master')

@section('content')

<div class="bred">
    <a class="bred" href="{{ route('index') }}">Home  ></a>
    <a class="bred" href="{{ route('reserves.index') }}">Reservas</a>
</div>

<div class="title-pg">
    <h1 class="title-pg">Reservas</h1>
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

    </div> <!-- class-btn-insert -->
    
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
                    <a href="{{ route('reserves.edit', $reserve->id) }}">
                        {{ $reserve->id }}
                    </a>
                </td>
                
                <td>
                    <a href="{{ route('reserves.edit', $reserve->id) }}">
                        {{ $reserve->user->name }}
                    </a>
                </td>

                <td>
                    <a href="{{ route('reserves.edit', $reserve->id) }}">
                        {{ $reserve->flight->id}} ({{ formatDateAndTime($reserve->flight->date) }})
                    </a>
                </td>

                <td>
                    <a href="{{ route('reserves.edit', $reserve->id) }}">
                        {{-- {{ $reserve->status($reserve->status) }} --}}
                    </a>
                </td>

            </tr>
            
        @empty

            <tr>
                <td colspan="200">Nenhum item cadastrado!</td>
            </tr>

        @endforelse

    </table> <!-- table -->

    @if(isset($dataForm))
        {!! $reserves->appends($dataForm)->links() !!}
    @else
        {!! $reserves->links() !!}
    @endif

</div> <!-- content-din -->

@endsection