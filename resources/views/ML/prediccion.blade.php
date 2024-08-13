<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prediccion</title>
</head>

<body>
    <h1>Response</h1>
    <div class="my-4">
        @session('success')
            <div class="alert alert-success" role="alert">
                {{ $value }}
            </div>
        @endsession
    </div>

    <div class="container m-1">
        <p>Caracteristicas</p>
        {{ $caracteristicas }}
    </div>

    <div class="container m-1">
        {{ $message }}
    </div>

    <div class="container m-1">
        @isset($output)
            <p>Salida</p>
            {{ $output }}
        @endisset
    </div>

    <div class="container m-1">
        @isset($output)
            <p>Variable de retorno</p>
            {{ $return_var }}
        @endisset
    </div>
</body>

</html>
