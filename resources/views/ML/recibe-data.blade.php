<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Response</title>
</head>
<body>
    <h1>Response</h1>
    <p>{{ $message }}</p>
    <div class="my-4">
        @session('success')
            <div class="alert alert-success" role="alert">
                {{ $value }}
            </div>
        @endsession
    </div>

    <div class="container">
        <form action="{{ route('actualizar.dataset') }}" method="post" enctype="multipart/form-data">
            @csrf
            <label for="file">Ingresa si tienes una actualizacion</label>
            <input type="file" name="file" id="file">
            <button type="submit">Enviar</button>
        </form>
    </div>

    <a href="/download-file">Descargar el archivo</a>
</body>
</html>