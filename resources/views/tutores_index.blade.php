@extends("layouts.app")

@section("content")
    <div class="container col-md-10">
        <div class="card">
            <div class="card-header">
                Padres, madres y tutores de estudiantes de nivel inicial
            </div>
            <div class="card-body">
                @if(session("mensaje"))
                    <div class="alert alert-{{session("danger")?"danger":"success"}}">
                        {{session("mensaje")}}
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-striped table-hover text-center align-middle">
                        <thead>
                        <tr>
                            <th class="col-2">Nombre</th>
                            <th class="col-2">Apellidos</th>
                            <th class="col-2">Fecha de nacimiento</th>
                            <th class="col-3">Dirección</th>
                            <th class="col-1">Teléfono</th>
                            <th class="col-2">
                                <a href="{{route("tutores.create")}}" class="btn btn-primary">Nuevo</a>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tutores as $tutor)
                            <tr>
                                <td class="text-start">{{$tutor->nombre}}</td>
                                <td class="text-start">{{$tutor->apellido}}</td>
                                <td>{{\Carbon\Carbon::parse($tutor->nacimiento)->format('d-m-Y')}}</td>
                                <td class="text-start">{{$tutor->direccion}}</td>
                                <td class="text-end">{{$tutor->telefono}}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{route("tutores.edit", $tutor)}}" class="btn btn-primary">Editar</a>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal{{$tutor->id}}">
                                            Eliminar
                                        </button>
                                    </div>
                                    <!-- Modal -->
                                    <div class="modal fade" id="deleteModal{{$tutor->id}}" tabindex="-1"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-danger">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Borrar
                                                        tutor</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    ¿Dese borrar al tutor seleccionado? Esta acción no puede deshacerse.
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="{{route("tutores.destroy",$tutor)}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                                    </form>
                                                    <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Cancelar
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
