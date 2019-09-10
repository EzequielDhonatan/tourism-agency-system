@extends('panel.layouts.master')

@section('content')
			
<div class="bred">
    <a class="bred" href="{{ route('index') }}">Dashboard ></a>
    <a class="bred" href="{{ route('brands.index') }}">Marcas</a>
</div>

<div class="content-din">

    <a class="btn btn-success" href="{{ route('brands.create') }}">
        <i class="fa fa-plus" aria-hidden="true"></i>
    </a>

</div> <!-- content-din -->

<div class="title-pg">
    <h1 class="title-pg">Marcas</h1>
</div>
    
@endsection