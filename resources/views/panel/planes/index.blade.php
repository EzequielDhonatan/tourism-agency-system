@extends('panel.layouts.master')

@section('content')
			
<div class="bred">
    <a class="bred" href="{{ route('index') }}">Dashboard ></a>
    <a class="bred" href="{{ route('planes.index') }}">Aviões</a>
</div>

<div class="title-pg">
    <h1 class="title-pg">Aviões</h1>
</div>

<div class="content-din bg-white">

    <div class="messages">

        @include('panel.includes.alerts') <!-- Alerts -->
        @include('panel.includes.errors') <!-- Errors -->

    </div> <!-- messages -->

    <div class="content-din">

        <div class="text-right">
            <a class="btn btn-success" href="{{ route('planes.create') }}">
                <span class="glyphicon glyphicon-plus"></span>
                Cadastrar
            </a>
        </div>

    </div> <!-- content-din -->

    <div class="form-search">

        @include('panel.planes.search') <!-- Search -->        

    </div> <!-- form-search -->
    
    <table class="table table-striped">

        <tr>
            <th>#</th>
            <th>Marca</th>
            <th>Classe</th>
            <th>Passageiros</th>
            <th width="150"></th>
        </tr>

        @forelse ($planes as $plane)

            <tr>

                <td>
                    <a href="{{ route('planes.edit', $plane->id) }}">{{ $plane->id }}</a>
                </td>

                <td>
                    {{-- <a href="{{ route('planes.edit', $plane->id) }}">{{ $plane->brand()->get()->first()->name }}</a> --}}
                    <a href="{{ route('planes.edit', $plane->id) }}">{{ $plane->brand->name }}</a>
                </td>

                <td>
                    <a href="{{ route('planes.edit', $plane->id) }}">{{ $plane->class_id }}</a>
                </td>

                <td>
                    <a href="{{ route('planes.edit', $plane->id) }}">{{ $plane->qty_passengers }}</a>
                </td>

                <td>
                    <form class="form" method="POST" action="{{ route('planes.destroy', $plane->id) }}">

                        {{ csrf_field() }}
                        {!! method_field('DELETE') !!}
                    
                        <button type="submit" class="fa fa-trash delete"></button>
                    
                    </form> <!-- form -->
                </td>

            </tr> <!-- -->

        @empty

            <tr>
                <td colspan="200">Nenhum registro encontrado!</td>
            </tr>
        
        @endforelse

    </table> <!-- table table-striped -->

    @if(isset($dataForm))
        {!! $planes->appends($dataForm)->links() !!}
    @else
        {!! $planes->links() !!}
    @endif

</div> <!-- content-din -->
    
@endsection