<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prediccion</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url('img/fondo.png');
            background-size: cover; 
            background-repeat: no-repeat; 
            background-attachment: fixed; 
            background-position: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .contenido {
            padding: 100px;
            border-radius: 25px;
            background-color: rgba(255, 255, 255, 0.7); 
        }
        .titulo{
            text-align: center;
        }
        .hechizo{
            text-align: center;
            font-size: 80px;
            color: #b35422; /*#c96f3f*/
        }
    </style>
</head>

<body>
    <div class="contenido">
        <h1 class="titulo">Resultado de la predicción</h1>
        <div class="my-5">
            @session('success')
                <div class="alert alert-success" role="alert">
                    {{ $value }}
                </div>
            @endsession
        </div>
        <div class="hechizo">
            @foreach ($data as $row)
                <tr>
                    @foreach ($row as $cell) 
                        <td>{{ $cell }}</td>
                    @endforeach
                </tr>
            @endforeach
        </div>
    </div>
</body>
@push('scripts')
    <script>
        Echo.channel('csv-updates')
            .listen('.csv-updated', (e) => {
                console.log(e.message);
                // Recarga la página para obtener los nuevos datos
                location.reload();
            });
    </script>
@endpush

</html>
