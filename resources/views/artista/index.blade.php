@extends('layouts.app')
@section('content')
    <h1 style="text-align: center; color:crimson">Listado de Artistas</h1>
    <div class="container-fluid">
        <div class="" style="align-items: center;">

            @if (Session::has('msn'))
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <strong>
                        {{ Session::get('msn') }}
                    </strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div style="margin: 2%">
                <a class="btn btn-outline-dark" style="margin: 5px" href="{{ url('/artista/create') }}"
                    role="button">Agregar nuevo artista</a>
            </div>

            <div class="row row-cols-1 row-cols-md-4 g-4">

                @foreach ($artistas as $a)
                    <div class="col">
                        <div class="card my-2 h-80">
                            <div class="text-center mt-3 mx-1">
                                <h4 class="card-title">{{ $a->nombreArtistico }}</h4>
                                <img src="{{ asset('storage') . '/' . $a->foto }}" width="80px"
                                    class="img-fluid rounded-circle " alt="">
                                <div class="card-body">
                                    <label style="font-weight: bold">Nombre: </label> {{ $a->nombreArtista }}
                                    {{ $a->apellidoArtista }}<br>
                                    <label style="font-weight: bold">Documento: </label> {{ $a->noDocumento }} <br>
                                    <label style="font-weight: bold">Nacimiento: </label> {{ $a->fechaNacimArtista }}<br>
                                    <label style="font-weight: bold">Correo: </label> {{ $a->emailArtista }}<br>
                                    <label style="font-weight: bold">Estado: </label> {{ $a->estadoArtista }}<br>
                                    <label style="font-weight: bold">Disquera: </label> {{ $a->idDisqueraFK }}<br>
                                </div>
                                <div class="card-footer ">
                                    <a href="{{ url('/artista/' . $a->id . '/edit') }}" class="btn btn-warning" role="button">Editar</a>
                                    
                                    {{-- <button type="button" class="btn btn-warning">Editar</button> --}}
                                    
                                    <form action="{{ url('/artista/' . $a->id) }}" method="post" class="d-inline">
                                        @csrf
                                        {{ @method_field('DELETE') }}
                                        <input type="submit" value="Eliminar"
                                        onclick="return confirm('Está seguro que desea eliminar el registro?')"
                                        class="btn btn-danger">
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    @endsection
</div>
