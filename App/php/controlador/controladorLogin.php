<?php
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$password = $_POST['password'];
$nombreUsuario = $_POST['nombreUsuario'];
echo "{'nombre':$nombre,'apellido':$apellido,'email':$email,'password':$password,'nombreUsuario',$nombreUsuario}";