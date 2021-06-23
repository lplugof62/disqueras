@extends('layouts.app')
@section('content')
    <h1 style="text-align: center; color:crimson">Listado de Disqueras</h1>
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
                <a class="btn btn-outline-dark" style="margin: 5px" href="{{url('/disquera/create')}}" role="button">Agregar nueva disquera</a>
            </div>

            <table class="table table-hover table-responsive">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nit Disquera</th>
                        <th scope="col">Nombre Disquera</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($disqueras as $d)
                        <tr>
                            <th scope="row">{{ $d->id }}</th>
                            <td>{{ $d->nitDisquera }}</td>
                            <td>{{ $d->nombreDisquera }}</td>
                            <td>{{ $d->telefonoDisquera }}</td>
                            <td>{{ $d->estadoDisquera }}</td>
                            <td>
                                <a href="{{ url('/disquera/' . $d->id . '/edit') }}" class="btn btn-warning">Editar</a>
                            </td>
                            <td>
                                <form action="{{ url('/disquera/' . $d->id) }}" method="post">
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
