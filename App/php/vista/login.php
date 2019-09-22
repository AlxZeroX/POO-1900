<!DOCTYPE html>
<html>

<head>
    <title>Registrarse</title>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../../css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="../../css/estilos.css">
    <style>
        .error {
            color: #ce0808;
            padding: 2px 0px 10px 0px;
            font-size: 7px;
            border-radius: 4px;
            width: fit-content;
            display: none;
        }
        .exito {
            color: #06b81e;
            padding: 2px 0px 10px 0px;
            font-size: 9px;
            border-radius: 4px;
            width: fit-content;
            display: none;
        }
        .input-error {
            border: 1px solid #ea4e4e;
        }
        table,
        th,
        td {
            border: 1px solid black;
            background-color: floralwhite ;
            text-align: center;
        }

        .bgimage {
            background-image: url("../../image/BackGround2.jpg");
            background-color: #cccccc;
            height: 1200px;
            background-position: center;
            background-repeat: repeat;
            background-size: cover;
            position: relative;
        }
    </style>

</head>

<body class="bgimage">
<form>
    <div class="container" id='login'>
        <div class="panel panel-primary">
            <div class="panel-heading text-center">
                <h2>REGISTRO</h2>
            </div>
            <div class="panel-body">

                <h4>Nombre: </h4>
                <input value="Peter" id="nombre" type="text" class="form-control" placeholder="Nombre"><br>
                <div id="div-error-nombre" class="error">Ingrese el nombre</div>


                <h4>Apellido: </h4>
                <input class="form-control" value="Parker" id="apellido" type="text" placeholder="Apellido"><br>
                <div id="div-error-apellido" class="error">Ingrese el apellido</div>

                <h4>Email: </h4>
                <input value="Pparker@gmail.com" id="email" type="text" class="form-control" placeholder="Email" onkeyup="validarCorreo(this);">
                <div id="div-error-email" class="error">Ingrese el email</div>


                <h4>Usuario: </h4>
                <input value="Pparker" id="usuario" type="text" class="form-control" placeholder="Usuario"><br>
                <div id="div-error-usuario" class="error">Ingrese el usuario</div>


                <h4>Contraseña: </h4>
                <input value="parker.456" id="password" type="password" class="form-control" placeholder="Password">
                <div id="div-error-password" class="error">Ingrese el password</div>

                <div class="exito" id="div-exito">
                    Registro realizado con éxito
                </div>
            </div>
        </div>
    </div>
</form>



<div class="panel-footer">
    <button class="btn btn-primary">Actualizar</button>
    <button type="button" class="btn btn-warning" onclick="login();">Registrar</button>
</div>
</div>
</div>

<center>
    <table>
        <thead>
        <tr>
            <th width=250px>Nombre</th>
            <th width=250px>Apellido</th>
            <th width=250px>Usuario</th>
            <th width=250px>Email</th>
            <th width=250px>Password</th>
            <th width=150px>Acción</th>
        </tr>
        </thead>
        <tbody id="tabla-usuarios">
        </tbody>
    </table>
</center>

<script src="../../js/controlador.js"></script>
</body>

</html>