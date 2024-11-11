@extends("layouts.app")

@section("content")

    <div class="container col-md-10">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        Editar la asignación de padre/madre/tutor del estudiante:
                        <h4>{{$estudiante->nombre}} {{$estudiante->apellido}}</h4>
                    </div>
                    <div class="col-4 text-end">
                        <img src="{{url("imagenes/fotos/$estudiante->foto")}}" width="100" height="100">
                    </div>
                </div>
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

                <form action="{{route("estudiantes.tutores.update", [$estudiante, $estudianteTutor])}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="tutores_id" class="form-label">Padre/madre/tutor</label>
                        <select name="tutores_id" id="tutores_id" class="form-select">
                            @foreach($tutores as $tutor)
                                <option value="{{$tutor->id}}"
                                    {{$tutor->id==old("tutores_id", $estudianteTutor->tutores_id)?"selected":""}}>
                                    {{$tutor->nombre}} {{$tutor->apellido}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="relaciones_id" class="form-label">Parentesco/relación</label>
                        <select name="relaciones_id" id="relaciones_id" class="form-select">
                            @foreach($relaciones as $relacion)
                                <option value="{{$relacion->id}}"
                                    {{$relacion->id==old("relacion",$estudianteTutor->relaciones_id)?"selected":""}} >
                                    {{$relacion->descripcion}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="{{route("estudiantes.tutores.index", $estudiante)}}" class="btn btn-secondary">
                            Cancelar
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection

@section("scriptjs")
    <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
    <script>
        const mySelect = new Choices('#tutores_id', {
            searchEnabled: true,
            removeItemButton: false,
            itemSelectText: 'Presiona para seleccionar', // Texto para seleccionar
            noResultsText: 'No se encontraron resultados', // Texto cuando no hay resultados de búsqueda
            noChoicesText: 'No hay opciones disponibles',
            itemSelectText: 'Presiona para seleccionar',
        });
    </script>
@endsection
