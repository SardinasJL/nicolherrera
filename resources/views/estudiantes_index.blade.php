@extends("layouts.app")

@section("content")
    <div class="container col-md-10">
        <div class="card">
            <div class="card-header">
                Estudiantes de nivel inicial de la Unidad Educativa Santa Ana
            </div>
            <div class="card-body">
                @if(session("mensaje"))
                    <div class="alert alert-{{session("danger")?"danger":"success"}}">
                        {{session("mensaje")}}
                    </div>
                @endif
                <form action="{{route("estudiantes.index")}}" method="get">
                    <div class="row g-3 align-items-center justify-content-end">
                        <div class="col-auto">
                            <label for="buscador">Buscar por nombre o apellido:</label>
                        </div>
                        <div class="col-auto">
                            <input type="text" name="buscador" id="buscador" value="{{old("buscador")}}"
                                   class="form-control me-2" autofocus>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary">Buscar</button>
                        </div>
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table table-striped table-hover text-center align-middle">
                        <thead>
                        <tr>
                            <th class="col-1">CI</th>
                            <th class="col-2">Nombres</th>
                            <th class="col-2">Apellidos</th>
                            <th class="col-1">Fecha de nacimiento</th>
                            <th class="col-2">Dirección</th>
                            <th class="col-1">Curso</th>
                            <th class="col-1">Foto</th>
                            <th class="col-2">
                                <a href="{{route("estudiantes.create")}}" class="btn btn-primary">Nuevo</a>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($estudiantes as $estudiante)
                            <tr>
                                <td class="text-end">{{$estudiante->ci}}</td>
                                <td class="text-start">{{$estudiante->nombre}}</td>
                                <td class="text-start">{{$estudiante->apellido}}</td>
                                <td>{{\Carbon\Carbon::parse($estudiante->nacimiento)->format('d-m-Y')}}</td>
                                <td class="text-start">{{$estudiante->direccion}}</td>
                                <td>{{$estudiante->relCurso->descripcion}}</td>
                                <td>
                                    <img src="{{url("imagenes/fotos/$estudiante->foto")}}" width="100" height="100">
                                </td>
                                <td>
                                    <a href="{{route("estudiantes.edit", $estudiante)}}" class="btn btn-primary">
                                        Editar</a>
                                    <a href="{{route("estudiantes.qr", $estudiante)}}" class="btn btn-light">Generar
                                        QR</a>
                                    <a href="{{route("estudiantes.tutores.index", $estudiante)}}" class="btn btn-info">
                                        Padre(s)/Tutor(es)
                                    </a>
                                    <a href="{{route("estudiantes.show", $estudiante)}}" class="btn btn-secondary">
                                        Ver
                                    </a>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal{{$estudiante->id}}">
                                        Eliminar
                                    </button>
                                </td>
                                <div class="modal fade" id="deleteModal{{$estudiante->id}}" tabindex="-1"
                                     aria-labelledby="deleteModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header bg-danger">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                    Borrar estudiante</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                ¿Desea borrar al
                                                estudiante {{$estudiante->nombre}} {{$estudiante->apellido}}?
                                            </div>
                                            <div class="modal-footer">
                                                <form action="{{route("estudiantes.destroy", $estudiante)}}"
                                                      method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                                </form>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Cancelar
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$estudiantes->links("pagination::bootstrap-4")}}
                </div>
            </div>
        </div>
    </div>
@endsection
