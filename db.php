<?php

$servername="localhost";
$username="root";
$password="";

$connection=mysqli_connect("localhost","root","")or die("Error conexion");
$connection->select_db("prueba");

?>