@extends("layouts.app")

@section("content")
    <div class="container col-md-10">
        <div class="card">
            <div class="card-header">
                Actividades de los diferentes cursos del nivel inicial de la Unidad Educativa Santa Ana
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
                            <th>Curso</th>
                            <th>Descripcion</th>
                            <th>
                                <a href="{{route("actividades.create")}}" class="btn btn-primary">Nuevo</a>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($actividades as $actividad)
                            <tr>
                                <td>{{$actividad->relCurso->descripcion}}</td>
                                <td class="text-start">{{$actividad->descripcion}}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{route("actividades.edit", $actividad)}}"
                                           class="btn btn-primary">Editar</a>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal{{$actividad->id}}">
                                            Eliminar
                                        </button>
                                    </div>
                                    <div class="modal fade" id="deleteModal{{$actividad->id}}" tabindex="-1"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-danger">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar
                                                        actividad</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    ¿Desea eliminar la actividad seleccionada? Esta acción no puede
                                                    deshacerse.
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="{{route("actividades.destroy",$actividad)}}"
                                                          method="post">
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
                    {{$actividades->links("pagination::bootstrap-4")}}
                </div>
            </div>
        </div>
    </div>
@endsection
