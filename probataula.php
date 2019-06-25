<?php
if ($conexion = mysql_connect("localhost", "php", "omar")){
echo "<p>MySQL le ha dado permiso a PHP para ejecutar consultas con ese usuario</p>";

// 2) Preparar la orden SQL
$consulta= "SELECT*FROM php";

// 3) Ejecutar la orden y obtener datos
mysql_select_db("prueba_php");
$datos= mysql_query ($consulta);

// 4) Ir Imprimiendo las filas resultantes
while ($fila =mysql_fetch_array($datos)){
echo "<p">;
echo $fila ["id"];
echo "-"; // un separador
echo $fila["nombre"];
echo "-"; // un separador
echo $fila ["email"];
echo "-"; // un separador
echo $fila["mensaje"];
echo "</p>";
}

}else{
echo "<p> MySQL no conoce ese usuario y password</p>";
}
?> 
