
   

<?php


$servername= "localhost";
$username = "php";
$password = "omar";
$dbname = "prueba_php";
//crear conexió
$conn = new mysqli("$servername", "$username", "$password", "$dbname");
//Check connection
if ($conn->connect_error){
	die("Connection failed:". $conn->connect_error);
}

//Consulta
$sql= "SELECT * FROM php Where nombre LIKE 'R%'";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
  
	echo "id:" . $row["id"]. "Nombre:" . $row["nombre"]. "email:" . $row["email"]. "mensaje:" . $row["mensaje"]. "<br>";
 }
}else {
	echo " 0 results";
}
$conn->close();
?>
