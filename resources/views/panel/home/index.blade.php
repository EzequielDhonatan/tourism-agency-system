@extends('panel.layouts.master')

@section('content')

<div class="title-pg">
    <h1 class="title-pg">Dashboard</h1>
</div>

<div class="content-din">
    
    @for ($i = 1; $i <= 10; $i++)

        <div class="col-md-3 col-sm-4 col-xm-12">
            <div class="rel-dash">
                <i class="fa fa-home" aria-hidden="true"></i>
                <div class="text-rel">
                    <h2 class="result">
                        {{ $i }}
                    </h2>
                    <h3 class="result-ds">
                        Total de Usuários
                    </h3>
                </div>
            </div>
        </div>

    @endfor

</div> <!-- content-din -->
    
@endsection