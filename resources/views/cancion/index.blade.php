@extends('layouts.app')
@section('content')
    <h1 style="text-align: center; color:crimson">Listado de Canciones</h1>
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
                <a class="btn btn-outline-dark" style="margin: 5px" href="{{url('/cancion/create')}}" role="button">Agregar nueva canción</a>
            </div>

            <table class="table table-hover table-responsive">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nombre Canción</th>
                        <th scope="col">Fecha de Grabación</th>
                        <th scope="col">Duración Canción</th>
                        <th scope="col">Álbum</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cancions as $c)
                        <tr>
                            <th scope="row">{{ $c->id }}</th>
                            <td>{{ $c->nombreCancion }}</td>
                            <td>{{ $c->fechaGrabacion }}</td>
                            <td>{{ $c->duracionCancion }}</td>
                            <td>{{ $c->idAlbumFK }}</td>
                            <td>
                                <a href="{{ url('/cancion/' . $c->id . '/edit') }}" class="btn btn-warning">Editar</a>

                            </td>
                            <td>
                                <form action="{{ url('/cancion/' . $c->id) }}" method="post">
                                    @csrf
                                    {{ @method_field('DELETE') }}
                                    <input type="submit" value="Eliminar"
                                        onclick="return confirm('Está seguro que desea eliminar el registro?')"
                                        class="btn btn-danger">
                                </form>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
