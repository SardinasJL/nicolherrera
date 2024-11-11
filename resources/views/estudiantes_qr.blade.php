@php
    use chillerlan\QRCode\QRCode;
    use chillerlan\QRCode\QROptions;

    $options = new QROptions([
        'eccLevel' => QRCode::ECC_L,
        'outputType' => QRCode::OUTPUT_IMAGE_PNG,
        'scale' => 5,
    ]);

    $data = route('estudiantes.show', $estudiante->id);
    $qrCode = (new QRCode($options))->render($data);
@endphp

    <!DOCTYPE html>
<html>
<head>
    <title>QR del Estudiante</title>
    <style>
        /* Configura el contenedor para ocupar toda la pantalla */
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }

        .qr-container {
            text-align: center;
        }

        img {
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
<div class="qr-container">
    <h1>Código QR de {{$estudiante->nombre}} {{$estudiante->apellido}}</h1>
    <img src="{{$qrCode }}" alt="Código QR del Estudiante">
    <h1><a href="{{route("estudiantes.index")}}">⭠Volver a la lista de estudiantes</a></h1>
</div>
</body>
</html>
