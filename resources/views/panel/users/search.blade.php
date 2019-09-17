{!! Form::open(['class' => 'form form-inline', 'route' => 'users.search']) !!}
    {!! Form::text('key_search', null, ['class' => 'form-control', 'placeholder' => 'O que deseja encontrar?']) !!}

    <button class="btn btn-primary">Pesquisar</button>

{!! Form::close() !!} <!-- form form-inline -->

@if (isset($dataForm['key_search']))
    <div class="alert alert-info">
        <p>
            <a href="{{ route('users.index') }}">
                <i class="fa fa-refresh" aria-hidden="true"></i>
            </a>
            Pesquisado: <strong>{{ $dataForm['key_search'] }}</strong>
        </p>
    </div>
@endif