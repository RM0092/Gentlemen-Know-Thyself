<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$dbse = 'gentlemen_know_thyself';

$conn = new sqli($host, $user, $pass, $dbse);
if($conn->connect_errno){
    echo "Connection failed " . $conn->connect_error;
    exit();
}

$query = "SELECT * FROM posts";
$result = $conn->query($query);

if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        echo $row['title'] . ",<br>";
        echo $row['content'];
    }
} else {
    echo "No data :(";
}

?>

