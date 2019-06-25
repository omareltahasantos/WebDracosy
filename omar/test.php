
<html>

 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">	
<body>

<form method = "GET" action = "<?php echo $_SERVER['PHP_SELF'] ?>">

<strong>Palabra clave:</strong>

<input type="text" name="aid" size="20"><br><br>

<input type="submit" value="buscar">

</form>

</body>



<?php
// Vamos a pasar una variable $_GET a nuestro ejemplo, en este caso es
// 'aid' para 'actor_id' de nuestra base de datos Sakila. Le vamos a asignar un
// valor predeterminado de 1, y a amoldarla a un integer para evitar inyecciones
// de SQL y/o problemas de seguridad relacionados. El manejo de todo esto va más
// allá del alcance de este sencillo ejemplo:
//   http://example.org/script.php?aid=42
if (isset($_GET['aid']) ){//&& is_numeric($_GET['aid'])) {
    $aid = $_GET['aid'];
} else {
    $aid = 1;
}


// Conectarse a y seleccionar una base de datos de MySQL llamada sakila
// Nombre de host: 127.0.0.1, nombre de usuario: tu_usuario, contraseña: tu_contraseña, bd: sakila
$mysqli = new mysqli('127.0.0.1', 'php', 'omar', 'prueba_php');

// ¡Oh, no! Existe un error 'connect_errno', fallando así el intento de conexión
if ($mysqli->connect_errno) {
    // La conexión falló. ¿Que vamos a hacer? 
    // Se podría contactar con uno mismo (¿email?), registrar el error, mostrar una bonita página, etc.
    // No se debe revelar información delicada

    // Probemos esto:
    echo "Lo sentimos, este sitio web está experimentando problemas.";

    // Algo que no se debería de hacer en un sitio público, aunque este ejemplo lo mostrará
    // de todas formas, es imprimir información relacionada con errores de MySQL -- se podría registrar
    echo "Error: Fallo al conectarse a MySQL debido a: \n";
    echo "Errno: " . $mysqli->connect_errno . "\n";
    echo "Error: " . $mysqli->connect_error . "\n";
    
    // Podría ser conveniente mostrar algo interesante, aunque nosotros simplemente saldremos
    exit;
}

// Realizar una consulta SQL
$sql = "SELECT *  FROM php WHERE nombre like '%$aid%'";
if (!$resultado = $mysqli->query($sql)) {
    // ¡Oh, no! La consulta falló. 
    echo "Lo sentimos, este sitio web está experimentando problemas.";

    // De nuevo, no hacer esto en un sitio público, aunque nosotros mostraremos
    // cómo obtener información del error
    echo "Error: La ejecución de la consulta falló debido a: \n";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $mysqli->errno . "\n";
    echo "Error: " . $mysqli->error . "\n";
    exit;
}


// ¡Uf, lo conseguimos!. Sabemos que nuestra conexión a MySQL y nuestra consulta
// tuvieron éxito, pero ¿tenemos un resultado?
if ($resultado->num_rows === 0) {
    // ¡Oh, no ha filas! Unas veces es lo previsto, pero otras
    // no. Nosotros decidimos. En este caso, ¿podría haber sido
    // actor_id demasiado grande? 
    echo "Lo sentimos. No se pudo encontrar una coincidencia para el nombre $aid. Inténtelo de nuevo.";
    exit;
}

// Ahora, sabemos que existe solamente un único resultado en este ejemplo, por lo
// que vamos a colocarlo en un array asociativo donde las claves del mismo son los
// nombres de las columnas de la tabla


///////////////////////////////////////////////////////////////////////
////PRUEBA BUSCADOR CON TABLAS
//////////////////////////////////////////////////////////////////
?>

<table class="table table-bordered table-striped">
<thead>
        <tr>
                <th>Nombre</th>
                 <th>Identificador</th>
		<th>Email</th>
		<th>Mensaje</th>
        </tr>
</thead>

<tbody>
<?php
        while($actor = $resultado->fetch_assoc()){

        echo "<tr><td>".$actor["nombre"]."</td>";
         echo "<td>".$actor["id"]."</td>";
	echo "<td>".$actor["email"]."</td>";
	echo "<td>".$actor["mensaje"]."</td>";

        "</tr>";



}
?>
</tbody>
</table>











<?php
$actor = $resultado->fetch_assoc();
//echo "A veces veo a " . $actor['nombre'] . " " . $actor['id'] . " en la TV.";

// Ahora, vamor a obtener cinco actores aleatorios y a imprimir sus nombres en una lista.
// El manejo de errores va a ser menor aquí, aunque ya sabemos como hacerlo
$sql = "SELECT actor_id, first_name, last_name FROM actor ORDER BY rand() LIMIT 5";
if (!$resultado = $mysqli->query($sql)) {
   // echo "Lo sentimos, este sitio web está experimentando problemas.";
    exit;
}

// Imprimir nuestros cinco actores aleatorios en una lista, y enlazar cada uno
echo "<ul>\n";
while ($actor = $resultado->fetch_assoc()) {
    echo "<li><a href='" . $_SERVER['SCRIPT_FILENAME'] . "?aid=" . $actor['actor_id'] . "'>\n";
echo "Tu Usuario es  " . $actor['nombre'] . "y tu identificador es  " . $actor['id'] .".";
  // echo $actor['email'] . ' ' . $actor['last_name'];
    echo "</a></li>\n";
}
echo "</ul>\n";

// El script automáticamente liberará el resultado y cerrará la conexión
// a MySQL cuando finalice, aunque aquí lo vamos a hacer nostros mismos
$resultado->free();
$mysqli->close();
?>

