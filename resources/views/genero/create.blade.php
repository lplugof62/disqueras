@extends('layouts.app')
@section('content')

    <div class="container-fluid">

        <h1 style="text-align: center; color:crimson">Registro de Género Musical</h1>

        <div class="card" style="width: 35rem; margin: 25px auto" ;>
            <div class="card-body">

                <form action="{{ url('/genero') }}" method="post" novalidate class="needs-validation">
                    @csrf
                    @include('genero.form')
                </form>

            </div>
        </div>

    </div>

@endsection
