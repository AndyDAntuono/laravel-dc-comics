<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <h1>Benvenuto nella pagina principale</h1>
    <ul>
        <!-- Link alla lista di fumetti -->
        <li><a href="{{ route('comics.index') }}">Lista Fumetti</a></li>

        <!-- Link al form per creare un nuovo fumetto -->
        <li><a href="{{ route('comics.create') }}">Crea Nuovo Fumetto</a></li>

        <!-- Altri link CRUD (opzionali) -->
        {{-- <li><a href="{{ route('comics.show', 1) }}">Mostra un fumetto</a></li> --}}
        {{-- <li><a href="{{ route('comics.edit', 1) }}">Modifica un fumetto</a></li> --}}
    </ul>
</body>
</html>
