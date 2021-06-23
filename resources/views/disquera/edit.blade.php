@extends('layouts.app')
@section('content')

<div class="container-fluid">

    <h1 style="text-align: center; color:crimson">Editar Disquera</h1>

    <div class="card" style="width: 35rem; margin: 25px auto" ;>
        <div class="card-body">

            <form action="{{url('/disquera/'.$disquera->id)}}" method="post" novalidate class="needs-validation">
                @csrf
                {{@method_field('PATCH')}}
                @include('disquera.form')


            </form>

        </div>
    </div>



</div>

@endsection