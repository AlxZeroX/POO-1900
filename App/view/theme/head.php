<?php 
	session_start();
?>

<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Aprendamos!</title>
    <!-- IMPORTAMOS LOS ESTILOS DEL FRAMEWORK DE BOOTSTRAP -->
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <link href="view/theme/css/bootstrap.min.css" rel="stylesheet">
    <link href="view/theme/css/dashboard.css" rel="stylesheet">

    <style>
        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: #337ab7;
            color: white;
            text-align: center;
        }

        .bgimage {
            background-image: url("image/BackGround.jpg");
            background-color: #cccccc;
            height: 1200px;
            background-position: center;
            background-repeat: repeat;
            background-size: cover;
            position: relative;
        }

    </style>



    <script>
        function valida(e) {
            tecla = (document.all) ? e.keyCode : e.which;

            //Tecla de retroceso para borrar, siempre la permite
            if (tecla == 8) {
                return true;
            }

            // Patron de entrada, en este caso solo acepta numeros
            patron = /[0-9]/;
            tecla_final = String.fromCharCode(tecla);
            return patron.test(tecla_final);
        }

        function checkRut(rut) {
            // Despejar Puntos
            var valor = rut.value.replace('.', '');
            // Despejar Guión
            valor = valor.replace('-', '');

            // Aislar Cuerpo y Dígito Verificador
            cuerpo = valor.slice(0, -1);
            dv = valor.slice(-1).toUpperCase();

            // Formatear RUN
            rut.value = cuerpo + '-' + dv

            // Si no cumple con el mínimo ej. (n.nnn.nnn)
            if (cuerpo.length < 7) {
                rut.setCustomValidity("RUT Incompleto");
                return false;
            }

            // Calcular Dígito Verificador
            suma = 0;
            multiplo = 2;

            // Para cada dígito del Cuerpo
            for (i = 1; i <= cuerpo.length; i++) {

                // Obtener su Producto con el Múltiplo Correspondiente
                index = multiplo * valor.charAt(cuerpo.length - i);

                // Sumar al Contador General
                suma = suma + index;

                // Consolidar Múltiplo dentro del rango [2,7]
                if (multiplo < 7) {
                    multiplo = multiplo + 1;
                } else {
                    multiplo = 2;
                }

            }

            // Calcular Dígito Verificador en base al Módulo 11
            dvEsperado = 11 - (suma % 11);

            // Casos Especiales (0 y K)
            dv = (dv == 'K') ? 10 : dv;
            dv = (dv == 0) ? 11 : dv;

            // Validar que el Cuerpo coincide con su Dígito Verificador
            if (dvEsperado != dv) {
                rut.setCustomValidity("RUT Inválido");
                return false;
            }

            // Si todo sale bien, eliminar errores (decretar que es válido)
            rut.setCustomValidity('');
        }

    </script>


    <!-- IMPORTAMOS LOS ARCHIVOS JAVASCRIPT DEL FRAMEWORK DE BOOTSTRAP -->
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery.1.8.1.js"></script>

</head>

<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <a class="navbar-brand" href="?c=Index&a=index">Todos los cursos Aqui!</a>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="data-toggle">
                        <i class="glyphicon glyphicon-user"></i>
                        Bienvenid@: <?= $_SESSION['Usuario'];?></a>
                </li>
            </ul>


            <li><a href="image/Mantenimiento%20(2).jpg">Acerca de</a></li>
            <li><a href="image/Mantenimiento%20(3).jpg">Proyectos</a></li>
            <a href="logout.php" class="btn btn-dark" role="button">Salir</a>
        </nav>




    </header>

    <div class="container-fluid">
        <div class="row">
