@extends('panel.layouts.master')

@section('content')
			
<div class="bred">
    <a class="bred" href="{{ route('index') }}">Dashboard ></a>
    <a class="bred" href="{{ route('brands.index') }}">Marcas</a>
</div>

<div class="title-pg">
    <h1 class="title-pg">Marcas</h1>
</div>

<div class="content-din bg-white">

    <div class="messages">

        @include('panel.includes.alerts') <!-- Alerts -->
        @include('panel.includes.errors') <!-- Errors -->

    </div> <!-- messages -->

    <div class="content-din">

        <div class="text-right">
            <a class="btn btn-success" href="{{ route('brands.create') }}">
                <span class="glyphicon glyphicon-plus"></span>
                Cadastrar
            </a>
        </div>

    </div> <!-- content-din -->

    <div class="form-search">

        @include('panel.brands.search') <!-- Search -->        

    </div> <!-- form-search -->
    
    <table class="table table-striped">

        <tr>
            <th>#</th>
            <th>Nome</th>
            <th width="150"></th>
        </tr>

        @forelse ($brands as $brand)

            <tr>

                <td>
                    <a href="{{ route('brands.edit', $brand->id) }}">{{ $brand->id }}</a>
                </td>

                <td>
                    <a href="{{ route('brands.edit', $brand->id) }}">{{ $brand->name }}</a>
                </td>

                <td>
                    
                    <a href="{{ route('brands.planes', $brand->id) }}">
                        <i class="fa fa-plane edit" aria-hidden="true" style="font-size: 20px"></i>
                    </a>

                    <form class="form" method="POST" action="{{ route('brands.destroy', $brand->id) }}">

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
        {!! $brands->appends($dataForm)->links() !!}
    @else
        {!! $brands->links() !!}
    @endif

</div> <!-- content-din -->
    
@endsection