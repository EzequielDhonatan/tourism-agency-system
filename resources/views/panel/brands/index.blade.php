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

    @include('includes.alerts') <!-- Alerts -->

    <div class="content-din">

        <div class="text-right">
            <a class="btn btn-success" href="{{ route('brands.create') }}">
                <span class="glyphicon glyphicon-plus"></span>
                Cadastrar
            </a>
        </div>

    </div> <!-- content-din -->

    <div class="form-search">
        <form class="form form-inline">
            <input type="text" class="form-control" name="nome" placeholder="Nome">
            <input type="text" class="form-control" name="email" placeholder="E-mail">

            <button class="btn btn-primary">Pesquisar</button>
        </form>
    </div> <!-- form-search -->
    
    <table class="table table-striped">

        <tr>
            <th>Nome</th>
            <th width="150"></th>
        </tr>

        @forelse ($brands as $brand)

            <tr>

                <td>
                    <a href="">{{ $brand->name }}</a>
                </td>

                <td>
                    <a href="" class="fa fa-trash delete"></a>
                </td>

            </tr> <!-- -->

        @empty

            <tr>
                <td colspan="200">Nenhum registro encontrado!</td>
            </tr>
        
        @endforelse

    </table> <!-- table table-striped -->

    <nav aria-label="Page navigation">

        <ul class="pagination">

            <li>
                <a href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                </a>
            </li>

            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>

            <li>
                <a href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                </a>
            </li>

        </ul> <!-- pagination -->

    </nav> <!-- Page navigation -->

</div> <!-- content-din -->
    
@endsection