<?php
session_start();
include("db.php");


$username = $_POST['username'];
$password = $_POST['password'];

$consult = "SELECT * FROM user WHERE username='$username' and password='$password'";
$result = $connection->query($consult);


if ($result -> num_rows) {
    $_SESSION['username'] = $username;
    header("location:views/home.php");
} else {
    echo "<div class='alert alert-danger' role='alert'>
            Error de autentificacion, verifique sus credenciales.
          </div>";
    include("views/index.php");
}

$connection->close();