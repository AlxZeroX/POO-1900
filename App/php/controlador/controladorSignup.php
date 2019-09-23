
<html>
<head><title>Prueba</title></head>
<body>
<?php
$host="localhost";
$port="5432";
$user="coba";
$pass="root";
$dbname="dbpersona";



$connect = pg_connect("host=$host port=$port user=$user pass=$pass dbname=$dbname");

if(!$connect)
    echo "<p><i>No me conecte</i></p>";
else
    echo "<p><i>Me conecte</i></p>";

pg_close($connect);
?>
</body>
</html>






PD: en el pg_hba.conf  tengo los metodos de autenticacion como "trust"
