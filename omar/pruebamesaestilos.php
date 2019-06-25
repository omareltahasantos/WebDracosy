 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">







<?php

$servername= "localhost";
$username = "php";
$password = "omar";
$dbname = "prueba_php";
//crear conexió
$link = new mysqli("$servername", "$username", "$password", "$dbname");

$sql= ("SELECT * FROM php");
$result = $link->query($sql);
?>




<table class="table table-bordered table-striped">
<thead>
	<tr>
		<th>Id</th>
		 <th>Nombre</th>
		 <th>Email</th>
		 <th>mensaje</th>

	</tr>
</thead>
<tbody>
<?php
	while($row = $result->fetch_assoc()){

	echo "<tr><td>".$row["id"]."</td>";
	 echo "<td>".$row["nombre"]."</td>";
	  echo "<td>".$row["email"]."</td>";
	  echo "<td>".$row["mensaje"]."</td>";
	"</tr>";



}
?>
</tbody>
</table>
</body>
</html>
