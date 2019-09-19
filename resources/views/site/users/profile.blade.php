@extends('site.layouts.master')

@section('content')

<div class="content">

    <section class="container">

        <div class="messages">

            @include('panel.includes.alerts') <!-- Alerts -->
            @include('panel.includes.errors') <!-- Errors -->
    
        </div> <!-- messages -->

        <h1 class="title">Meu Perfil</h1>

        <div class="">

            {!! Form::model(auth()->user() ,['class' => 'form-eti', 'route' => 'update.profile', 'files' => true]) !!}
        
                <div class="form-group">

                    <label for="name">Nome *</label>
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </div>
                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nome']) !!}
                    </div>

                </div> <!-- form-group -->

                <div class="form-group">

                    <label for="email">E-Mail *</label>
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </div>
                        {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'E-mail:', 'disabled' => 'disabled']) !!}
                    </div>

                </div> <!-- form-group -->

                <div class="form-group">

                    <label for="image">Imagem: (Opcional) Informe Apenas se Quiser Atualizar</label>
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon">
                            <i class="fa fa-picture-o" aria-hidden="true"></i>
                        </div>
                        {!! Form::file('image', null, ['class' => 'form-control', 'placeholder' => 'Imagem']) !!}
                    </div>

                </div> <!-- form-group -->

                <div class="form-group">

                    <label for="password">Senha: (Opcional) Informe Apenas se Quiser Atualizar</label>
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon">
                            <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                        </div>
                        {!! Form::password('password', null, ['class' => 'form-control', 'placeholder' => '(Opcional) Informe Apenas se Quiser Atualizar a Senha']) !!}
                    </div>

                </div> <!-- form-group -->

                <button type="submit" class="btn-form">
                    Atualizar Perfil 
                    <i class="fa fa-retweet" aria-hidden="true"></i>
                </button>

            {!! Form::close() !!} <!-- form-eti -->

        </div> <!-- -->
    </section> <!-- container -->

</div> <!-- content -->
    
@endsection