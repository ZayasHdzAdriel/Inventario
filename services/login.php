<?php
session_start();
include("../db.php");


$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM user WHERE username='$username' and password='$password'";
$result = $connection->query($sql);


if ($result -> num_rows) {
    $_SESSION['username'] = $username;
    header("location:warehouse.php");
} else {
    include("index.php");
    echo "<h1 class='alert'>ERROR EN LA AUTENTIFICACION</h1>";
}

$connection->close();