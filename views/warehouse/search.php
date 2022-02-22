<?php
include "../../utils/db.php";


//? Inicializamos las variables enviadas en la query string.

$item = $user = $response = "";


if(isset($_GET["itemname"])){
    $item = $_GET["itemname"];
};

if(isset($_GET["username"])){
    $user = $_GET["username"];
};



//? Realizamos las consultas SQL segun los datos recibidos
//* Primero => Recibido un Nombre de Equipo
//* Segundo => Recibido un Nombre de Usuario
//* Tercero => Recibido ambos datos

if (!empty($item) && empty($user)) {
    $sql_exist_it = "SELECT * FROM warehouse WHERE name_pc LIKE '%$item%'";
    $response = $connection->query($sql_exist_it);
}

else if (empty($item) && !empty($user)){
    $sql_exist_us = "SELECT * FROM warehouse WHERE employee_id IN (SELECT id FROM employee WHERE name LIKE '%$user%')";
    $response = $connection->query($sql_exist_us);
}

else{
    $sql_exist_itus = "SELECT * FROM warehouse WHERE name_pc LIKE '%$item%' AND employee_id IN (SELECT id FROM employee WHERE name LIKE '%$user%')";
    $response = $connection->query($sql_exist_itus);
}




//? Revisamos si el response fue llenado previamente; caso contrario se llena con todo el inventario
if (!isset($response) || empty($response)) {
    $sql = "SELECT * FROM warehouse";
    $response = $connection->query($sql);
}

if ($response->num_rows > 0) {
    while ($row = $response->fetch_assoc()) {
        $id = $row["id"];
        $name = $row["name_pc"];
        $employee = 'Ninguno';
        $brand = $row["brand"];
        $model = $row["model"];
        $maintenance = $row["maintenance"];

        if (!is_null($row["employee_id"])) {
            $sql = "SELECT * FROM employee WHERE id = " . $row["employee_id"];
            $data = $connection->query($sql)->fetch_assoc();
            $employee = $data["name"];
        }

        echo "
        <tr>
            <th scope='row'>$id</th>
            <td>$name</td>
            <td>$employee</td>
            <td>$brand</td>
            <td>$model</td>
            <td>$maintenance</td>
            <td>
                <a class='btn btn-secondary' href='read_one.php?id=$id'>Ver mas datos</a> 
                <a class='btn btn-warning' href='update.php?id=$id'>Editar</a> 
                <a class='btn btn-danger' href='delete_one.php?id=$id'>Eliminar</a>
            </td>
        </tr>";
    }
}