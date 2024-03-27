<?php
$servername = "localhost";
$username = "Moravcik";
$password = "1234";
$dbname = "moravcik3a";

// Create connection
$conn = new mysqli($servername, $username, 
    $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$meno = 'anicka';
$heslo = password_hash('anicka123', PASSWORD_DEFAULT);
$email = 'anicka@a.sk';
$sql = "INSERT INTO t_user (username, password, email)
VALUES ('".$meno."', '".$heslo."', '".$email."')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
