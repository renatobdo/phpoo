<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cafebistro";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Conectado com sucesso";

$sql = "SELECT * FROM cafe";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Name: " . $row["nome"]. " " . 
    $row["descricao"]. "".$row["descricao"]."<br>";
  }
} else {
  echo "0 results";
}
$conn->close();

?> 