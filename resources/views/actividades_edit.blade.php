@extends("layouts.app")

@section("content")
    <div class="container col-md-10">
        <div class="card">
            <div class="card-header">
                Editar actividad
            </div>
            <div class="card-body">

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{route("actividades.update", $actividad)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="cursos_id" class="form-label">Curso</label>
                        <select name="cursos_id" id="cursos_id" class="form-select">
                            @foreach($cursos as $curso)
                                <option value="{{$curso->id}}"
                                    {{$curso->id==old("cursos_id",$actividad->cursos_id)?"selected":""}}>
                                    {{$curso->descripcion}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripcion</label>
                        <textarea name="descripcion" id="descripcion"
                                  class="form-control">{{old("descripcion",$actividad->descripcion)}}</textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="{{route("actividades.index")}}" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
