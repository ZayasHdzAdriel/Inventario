<?php
session_start();
include("db.php");


$username = $_POST['username'];
$password = $_POST['password'];

$consult = "SELECT * FROM user WHERE username='$username' and password='$password'";
$result = $connection->query($consult);


if ($result -> num_rows) {
    $_SESSION['username'] = $username;
    header("location:home.php");
} else {
    include("index.php");
    echo "<h1 class='alert'>ERROR EN LA AUTENTIFICACION</h1>";
}

$connection->close();