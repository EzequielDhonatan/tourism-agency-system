{{-- <form class="form form-inline" method="POST" action="{{ route('aiports.search', $city->id) }}"> --}}
<form class="form form-inline" method="POST" action="#">

    {{ csrf_field() }}

    <input type="text" class="form-control" name="key_search" placeholder="Nome do aeroporto">

    <button class="btn btn-primary">Pesquisar</button>

</form> <!-- form form-inline -->

@if (isset($dataForm['key_search']))
    <div class="alert alert-info">
        <p>
            <a href="#">
                <i class="fa fa-refresh" aria-hidden="true"></i>
            </a>
            Pesquisado: <strong>{{ $dataForm['key_search'] }}</strong>
        </p>
    </div>
@endif