@extends("layouts.app")

@section("content")
    <div class="container col-md-10">
        <div class="card">
            <div class="card-header">
                Cursos de nivel inicial de la Unidad Educativa Santa Ana
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
                            <th>Descripcion</th>
                            <th>
                                <a href="{{route("cursos.create")}}" class="btn btn-primary">Nuevo</a>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cursos as $curso)
                            <tr>
                                <td>{{$curso->descripcion}}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{route("cursos.edit",[$curso,"page"=>$cursos->currentPage()])}}"
                                           class="btn btn-primary">Editar</a>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal{{$curso->id}}">
                                            Eliminar
                                        </button>
                                    </div>
                                    <!-- Modal -->
                                    <div class="modal fade" id="deleteModal{{$curso->id}}" tabindex="-1"
                                         aria-labelledby="deleteModalLabel{{$curso->id}}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-danger">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Borrar
                                                        curso</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    ¿Desea eliminar el curso seleccionado? Esta acción no puede
                                                    deshacerse.
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="{{route("cursos.destroy",$curso)}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="hidden" name="page"
                                                               value="{{$cursos->currentPage()}}">
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
                    {{$cursos->links("pagination::bootstrap-4")}}
                </div>
            </div>
        </div>
    </div>
@endsection
