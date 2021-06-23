@extends('layouts.app')
@section('content')
    <h1 style="text-align: center; color:crimson">Listado de Álbumes</h1>
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
                <a class="btn btn-outline-dark" style="margin: 5px" href="{{ url('/album/create') }}"
                    role="button">Agregar
                    nuevo álbum</a>
            </div>
            <div class="row row-cols-1 row-cols-md-4 g-4">
                @foreach ($albums as $a)
                    <div class="col">
                        <div class="card my-2 h-80">
                            <div class="text-center mt-3 mx-1">
                                <h4 class="card-title">{{ $a->nombreAlbum }}</h4>
                                <img src="{{ asset('storage') . '/' . $a->foto }}" width="80px"
                                    class="img-fluid rounded-circle " alt="">
                                <div class="card-body">
                                    <label style="font-weight: bold">Artista: </label> {{ $a->idArtistaFK }} <br>
                                    <label style="font-weight: bold">Año de publicación: </label> {{ $a->anioPublicacion }} <br>
                                    <label style="font-weight: bold">Género: </label> {{ $a->idGeneroFK }} <br>
                                    <label style="font-weight: bold">Estado: </label> {{ $a->estadoAlbum }} <br>
                                </div>
                                <div class="card-footer ">
                                    <a href="{{ url('/album/' . $a->id . '/edit') }}" class="btn btn-warning"
                                        role="button">Editar</a>

                                    <form action="{{ url('/album/' . $a->id) }}" method="post" class="d-inline">
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
    </div>

@endsection
