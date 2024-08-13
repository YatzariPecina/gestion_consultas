<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prediccion</title>
</head>

<body>
    <h1>Resultado de la predicción</h1>
    <div class="my-4">
        @session('success')
            <div class="alert alert-success" role="alert">
                {{ $value }}
            </div>
        @endsession
    </div>

    <pre>{{ $salida }}</pre>
</body>

</html>
