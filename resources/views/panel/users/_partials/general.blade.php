<div class="form-group">
    <label for="name">Nome</label>
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nome']) !!}
</div>

<div class="form-group">
    <label for="email">E-mail</label>
    {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'E-mail']) !!}
</div>

<div class="form-group">
    <label for="name">Senha (Nova Senha)</label>
    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Senha']) !!}
</div>

<div class="form-group">
    {!! Form::checkbox('is_admin', true, null) !!}
    <label for="is_admin">É admin?</label>
</div>

<div class="form-group">
    <label for="image">Imagem</label>
    {!! Form::file('image', null, ['class' => 'form-control', 'placeholder' => 'E-mail']) !!}
</div>

<br>