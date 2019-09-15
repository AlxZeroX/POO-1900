<?php

require_once 'vendor/autoload.php';
use usuarioPHP\Usuario;
$user = new Usuario("carlos@gmail.com","12345");
$user2 = new Usuario("ivan@gmail.com","123");
$user->setNombre("carlos");
$user2->setNombre("ivan");
$variable =$user2->getNombre();
echo "$variable";