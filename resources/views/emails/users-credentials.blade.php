<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <h1>Estimado usuario,</h1>
    <h3>Tus credenciales de acceso son:</h3>
    <table>
        <tr>
            <th>Usuario:</th>
            <td>{{ $user->email }}</td>
        </tr>
        <tr>
            <th>Contraseña:</th>
            <td>{{ $password }}</td>
        </tr>
    </table>
    <h6>Por favor, asegúrate de cambiar tu contraseña después de iniciar sesión si así lo deseas.</h6>


</body>
</html>