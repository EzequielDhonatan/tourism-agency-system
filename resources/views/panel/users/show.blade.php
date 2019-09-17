@extends('panel.layouts.master')

@section('content')

<div class="bred">
    <a href="{{ route('index') }}" class="bred">Home > </a>
    <a href="{{ route('users.index') }}" class="bred">Usuários > </a>
    <a href="" class="bred">{{ $user->name }}</a>
</div>

<div class="messages">

    @include('panel.includes.alerts') <!-- Alerts -->
    @include('panel.includes.errors') <!-- Errors -->

</div> <!-- messages -->

<div class="title-pg">
    <h1 class="title-pg">Detalhes do Usuário: {{$user->name}}</h1>
</div>

<div class="content-din">

    <ul>

        <li>
            @if($user->image)
                <img src="{{ url("storage/users/{$user->image}") }}" alt="{{ $user->id }}" style="max-width: 60px;">
            @else
                <img src="{{ url('assets/panel/imgs/no-image.png') }}" alt="{{ $user->id }}" style="max-width: 100px;">
            @endif
        </li>

        <li>
            Nome: <strong>{{ $user->name }}</strong>
        </li>

        <li>
            E-mail: <strong>{{ $user->email }}</strong>
        </li>     

    </ul>

</div> <!-- content-din -->

@endsection