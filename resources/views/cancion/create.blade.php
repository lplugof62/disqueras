@extends('layouts.app')
@section('content')

    <div class="container-fluid">

        <h1 style="text-align: center; color:crimson">Registro de Canción</h1>

        <div class="card" style="width: 35rem; margin: 25px auto" ;>
            <div class="card-body">

                <form action="{{ url('/cancion') }}" method="post" novalidate class="needs-validation">
                    @csrf
                    @include('cancion.form')
                </form>

            </div>
        </div>

    </div>

@endsection
