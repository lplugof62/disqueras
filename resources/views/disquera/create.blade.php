@extends('layouts.app')
@section('content')

    <div class="container-fluid">

        <h1 style="text-align: center; color:crimson">Registro Disquera</h1>

        <div class="card" style="width: 35rem; margin: 25px auto" ;>
            <div class="card-body">

                <form action="{{ url('/disquera') }}" method="post" novalidate class="needs-validation">
                    @csrf
                    @include('disquera.form')
                </form>

            </div>
        </div>

    </div>

@endsection
