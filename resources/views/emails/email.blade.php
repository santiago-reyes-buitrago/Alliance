<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creacion de tarea</title>
    <style>
        /* Tailwind CSS Inline */
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap');
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100">
<div class="max-w-3xl mx-auto mt-10 bg-white p-6 rounded-lg shadow-lg">
    <div class="text-center">
        <h1 class="text-2xl font-semibold text-gray-800">¡Hola, {{auth()->user()->name}}</h1>
        <p class="mt-2 text-gray-600">Esto es una notificacion de que se creo la tarea <b>{{name}}</b>.</p>
    </div>

    <div class="mt-6">
        <p class="text-gray-800">con la siguiente descripcion: <br/>{{$description}}</p>
    </div>

    <div class="mt-8 text-center text-red-700">
        Esta tarea tiene fecha limite de <i>{{$deadline}}</i>
    </div>

    <div class="mt-10 text-center text-sm text-gray-500">
        <p>© {{ date('Y') }} Tu Empresa. Todos los derechos reservados.</p>
    </div>
</div>
</body>
</html>

