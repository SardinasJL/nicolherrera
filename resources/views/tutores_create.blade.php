@extends("layouts.app")

@section("content")
    <div class="container col-md-10">
        <div class="card">
            <div class="card-header">
                Crear o registrar un padre de familia o un tutor
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

                <form action="{{route("tutores.store")}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombres</label>
                        <input type="text" id="nombre" name="nombre" value="{{old("nombre")}}"
                               class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="apellido" class="form-label">Apellidos</label>
                        <input type="text" id="apellido" name="apellido" value="{{old("apellido")}}"
                               class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="nacimiento" class="form-label">Nacimiento</label>
                        <input type="date" id="nacimiento" name="nacimiento" value="{{old("nacimiento")}}"
                               class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="direccion" class="form-label">Direccion</label>
                        <input type="text" id="direccion" name="direccion" value="{{old("direccion")}}"
                               class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="telefono" class="form-label">Telefono</label>
                        <input type="text" id="telefono" name="telefono" value="{{old("telefono")}}"
                               class="form-control">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="{{route("tutores.index")}}" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
