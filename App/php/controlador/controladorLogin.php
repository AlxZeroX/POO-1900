<?php
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$password = $_POST['password'];
$nombreUsuario = $_POST['nombreUsuario'];
$datos = "{'nombre':$nombre,'apellido':$apellido,'email':$email,'password':$password,'nombreUsuario',$nombreUsuario}";
echo $datos;

