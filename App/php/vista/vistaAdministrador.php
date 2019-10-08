<!DOCTYPE html>
<html>
<head>

</head>
<body>
    <h1>
        Administrador
    </h1>
    <div class="panel">
        <input type="button" name="crearCurso" id="crearCurso" value="Crear Curso">
        <input type="button" value="Eliminar Curso">
    </div>
    <div id="cajaRespuesta"></div>
    <?php
        $clickCrearCuenta = false;
    ?>

    <script>
        document.getElementById("crearCurso").onclick = function(){
            document.getElementById("cajaRespuesta").innerHTML ="<h2>Creacion de Curso</h2>" +
                "<label>Ingrese Nombre Del Curso</label> <input type='text' id='nombreCurso'><br>" +
                "<label>Ingrese Instructor </label> <input type='text' id='instructor'><br> " +
            "<input type='button' value='terminar' id='terminar'>";
            document.getElementById("terminar").onclick = function () {
                document.getElementById("cajaRespuesta").innerHTML = "";
            }
        }
    </script>


</body>
</html>
