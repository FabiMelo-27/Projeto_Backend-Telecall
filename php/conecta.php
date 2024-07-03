<?php 


$server = "localhost";
$user = "root";
$pass = "";
$bd = "database_telecall";


ob_start();

try {
    $conn = mysqli_connect($server, $user, $pass, $bd);
    
  
    if (!$conn) {
        throw new Exception("Não foi possível conectar ao banco de dados.");
    }
} catch(Exception $e) {
  
    header("HTTP/1.0 500 Internal Server Error");
    header("Location:../view/erro400.html");
    exit;
}

echo "";

 

?>

