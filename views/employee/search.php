<?php
include "../../utils/db.php";
$username = $_GET["username"];
$sql = "SELECT * FROM employee WHERE name LIKE '%$username%'";
$employee = $connection->query($sql);


if ($employee->num_rows == 0) {
    $sql = "SELECT * FROM employee";
    $employee = $connection->query($sql);
}

while ($row = $employee->fetch_assoc()) {
    $id = $row["id"];
    $name = $row["name"];
    $department_id = $row["department_id"];
    $plant = $row["plant"];

    $sql = "SELECT name FROM department WHERE id=$department_id";
    $department = $connection->query($sql)->fetch_assoc()['name'];


    echo "
    <tr>
        <th scope='row'>$id</th>
        <td>$name</td>
        <td>$department</td>
        <td>$plant</td>
        <td>
            <a class='btn btn-secondary' href='read_one_user.php?id=$id'>Ver mas datos</a> 
            <a class='btn btn-warning' href='update_user.php?id=$id'>Editar</a> 
            <a class='btn btn-danger' href='delete_user.php?id=$id'>Eliminar</a>
        </td>
    </tr>";
}
