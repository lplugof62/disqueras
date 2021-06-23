@extends('layouts.app')
@section('content')

<div class="container-fluid">

    <h1 style="text-align: center; color:crimson">Editar Artista</h1>

    <div class="card" style="width: 35rem; margin: 25px auto" ;>
        <div class="card-body">

            <form action="{{url('/artista/'.$artista->id)}}" method="post" novalidate class="needs-validation">
                @csrf
                {{@method_field('PATCH')}}
                @include('artista.form')


            </form>

        </div>
    </div>



</div>

@endsection