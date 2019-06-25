	
<?php
	header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");


$servername= "localhost";
$username = "php";
$password = "omar";
$dbname = "prueba_php";
//crear conexió
$conn = new mysqli("$servername", "$username", "$password", "$dbname");


//Consulta
$sql= "SELECT * FROM php";
$result = $conn->query($sql);


 $outp = "";


 while($rs = $result->fetch_assoc()) {
	if ($outp != "") {$outp .= ",";}
      $outp .= '{"Id":"'  . $rs["id"] . '",';
      $outp .= '"Nombre":"'   . $rs["nombre"]        . '",';
      $outp .= '"Email":"'. $rs["email"]     . '",';
	$outp .= '"Mensaje":"'. $rs["mensaje"]     . '"}';

  }
  $outp ='{"records":['.$outp.']}';
  $conn->close();
 
  echo($outp);

	

?>
