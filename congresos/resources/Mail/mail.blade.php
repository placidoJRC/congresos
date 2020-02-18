<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Correo test</title>
</head>
<body>
    <h2>Datos :</h2>
    <ul>
        <li>Nombre: {{ $user->name }}</li>
        <li>Contraseña: {{ $user->password }}</li>
    </ul>
</body>
</html>