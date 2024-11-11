@extends("layouts.app")

@section("content")

    <div class="container col-md-10">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        Padre(s)/tutor(es) del estudiante:
                        <h4>{{$estudiante->nombre}} {{$estudiante->apellido}}</h4>
                        <a href="{{route("estudiantes.index")}}" class="btn btn-primary">
                            ⭠Volver a la lista de estudiantes
                        </a>
                    </div>
                    <div class="col-4 text-end">
                        <img src="{{url("imagenes/fotos/$estudiante->foto")}}" width="100" height="100">
                    </div>
                </div>
            </div>
            <div class="card-body">

                @if(session("mensaje"))
                    <div class="alert alert-{{session("danger")?"danger":"success"}}">
                        {{session("mensaje")}}
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle text-center">
                        <thead>
                        <tr>
                            <th class="col-3">Nombres</th>
                            <th class="col-3">Apellidos</th>
                            <th class="col-3">Parentesco/relación</th>
                            <th class="col-3">
                                <a href="{{route("estudiantes.tutores.create", [$estudiante])}}"
                                   class="btn btn-primary">Asignar padre(s)/tutor</a>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($estudiante->relEstudianteTutor as $estudianteTutor)
                            <tr>
                                <td class="text-start">{{$estudianteTutor->relTutor->nombre}}</td>
                                <td class="text-start">{{$estudianteTutor->relTutor->apellido}}</td>
                                <td class="text-center">{{$estudianteTutor->relRelacion->descripcion}}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{route("estudiantes.tutores.edit", [$estudiante, $estudianteTutor])}}"
                                           class="btn btn-primary">
                                            Editar
                                        </a>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal{{$estudianteTutor->id}}">
                                            Eliminar
                                        </button>
                                    </div>
                                    <!-- Modal -->
                                    <div class="modal fade" id="deleteModal{{$estudianteTutor->id}}" tabindex="-1"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-danger">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Borrar
                                                        relación</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    ¿Desea desvincular al padre/madre/tutor? Esta acción no puede
                                                    deshacerse.
                                                </div>
                                                <div class="modal-footer">
                                                    <form
                                                        action="{{route("estudiantes.tutores.destroy", [$estudiante, $estudianteTutor])}}"
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
                </div>
            </div>
        </div>
    </div>

@endsection
