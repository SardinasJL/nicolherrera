<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Estudiante</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
<div class="container col-md-8 my-3">
    @auth()
        <h2><a href="{{route("estudiantes.index")}}">⭠Volver a la lista de estudiantes</a></h2>
    @endauth
    <div class="card">
        <div class="card-header text-center">
            <h3>Unidad Educativa Santa Ana</h3>
            <h4>Tupiza-Bolivia</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-6 text-center">
                    <img src="{{url("imagenes/fotos/$estudiante->foto")}}" height="130">
                </div>
                <div class="col-6">
                    Nombres(s):<br>
                    <b>{{$estudiante->nombre}}</b><br>
                    Apellido(s):<br>
                    <b>{{$estudiante->apellido}}</b><br>
                    Curso:<br>
                    <b>{{$estudiante->relCurso->descripcion}}</b><br>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    CI:<br>
                    <b>{{$estudiante->ci}}</b><br>
                </div>
                <div class="col-md-6">
                    Fecha de nacimiento:<br>
                    <b>{{\Carbon\Carbon::parse($estudiante->nacimiento)->format("d-m-Y")}}</b><br>
                </div>
                <div class="col-md-6 align-self-start">
                    Dirección:<br>
                    <b>{{$estudiante->direccion}}</b><br>
                </div>
            </div>
            <div class="row">
                @foreach($estudiante->relEstudianteTutor as $estudianteTutor)
                    <div class="col-md-6">
                        <div class="card mt-3">
                            <div class="card-header">
                                {{$estudianteTutor->relRelacion->descripcion}}:
                                <b>{{$estudianteTutor->relTutor->nombre}} {{$estudianteTutor->relTutor->apellido}}</b>
                            </div>
                            <div class="card-body">
                                Dirección:<br>
                                <b>{{$estudianteTutor->relTutor->direccion}}</b><br>
                                Teléfono:<br>
                                <b>{{$estudianteTutor->relTutor->telefono}}</b>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="container-fluid mt-3">
                    <div class="card">
                        <div class="card-header">
                            Actividades:
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-hover">
                                @foreach($estudiante->relCurso->relActividad as $actividad)
                                    <tr>
                                        <td>{{$actividad->descripcion}}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
