@extends("layouts.app")

@section("content")
    <div class="container col-md-10">
        <div class="card">
            <div class="card-header">
                Registrar a un estudiante
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

                <form action="{{route("estudiantes.update", $estudiante)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="ci" class="form-label">CI</label>
                        <input type="text" id="ci" name="ci" value="{{old("ci", $estudiante->ci)}}"
                               class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombres</label>
                        <input type="text" id="nombre" name="nombre" value="{{old("nombre", $estudiante->nombre)}}"
                               class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="apellido" class="form-label">Apellidos</label>
                        <input type="text" id="apellido" name="apellido"
                               value="{{old("apellido", $estudiante->apellido)}}"
                               class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="nacimiento" class="form-label">Nacimiento</label>
                        <input type="date" id="nacimiento" name="nacimiento"
                               value="{{old("nacimiento", $estudiante->nacimiento)}}"
                               class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="direccion" class="form-label">Direccion</label>
                        <input type="text" id="direccion" name="direccion"
                               value="{{old("direccion", $estudiante->direccion)}}"
                               class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="cursos_id" class="form-label">Curso</label>
                        <select name="cursos_id" id="cursos_id" class="form-select">
                            @foreach($cursos as $curso)
                                <option value="{{$curso->id}}"
                                    {{$curso->id==old("cursos_id", $estudiante->direccion)?"selected":""}}>
                                    {{$curso->descripcion}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <img src="{{url("imagenes/fotos/$estudiante->foto")}}" width="100" height="100">
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <input type="file" id="foto" name="foto" class="form-control">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="{{route("estudiantes.index")}}" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
