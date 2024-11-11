@extends("layouts.app")

@section("content")
    <div class="container col-md-10">
        <div class="card">
            <div class="card-header">
                Nuevo curso
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

                <form action="{{route("cursos.store")}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripcion</label>
                        <input type="text" id="descripcion" name="descripcion" value="{{old("descripcion")}}"
                               class="form-control">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="{{route("cursos.index")}}" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
