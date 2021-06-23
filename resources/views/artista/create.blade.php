@extends('layouts.app')
@section('content')

    <div class="container-fluid">

        <h1 style="text-align: center; color:crimson">Registro Artista</h1>

        <div class="card" style="width: 35rem; margin: 25px auto" ;>
            <div class="card-body">

                <form action="{{ url('/artista') }}" method="post" enctype="multipart/form-data" novalidate class="needs-validation">
                    @csrf
                    @include('artista.form')
                </form>

            </div>
        </div>

    </div>

@endsection
