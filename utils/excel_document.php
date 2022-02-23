<?php

require "db.php";
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=reporte_inventario.xls");
header("Pragma: no-cache");
header("Expires: 0");


$sql = "SELECT * FROM warehouse";
$response = $connection->query($sql);


if ($response->num_rows > 0) {

    echo "<table border='1'>";

    echo '<tr>';
    echo "<th style='text-align: center' colspan='6'>REPORTE DE INVENTARIO</th>";
    echo '</tr>';

    echo '<tr>';
    echo '<th scope="col">#</th>';
    echo '<th scope="col">Nombre</th>';
    echo '<th scope="col">Usuario</th>';
    echo '<th scope="col">Marca</th>';
    echo '<th scope="col">Modelo</th>';
    echo '<th scope="col">Ultimo Mantenimiento</th>';
    echo '</tr>';

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
            <td>$id</td>
            <td>$name</td>
            <td>$employee</td>
            <td>$brand</td>
            <td>$model</td>
            <td>$maintenance</td>
        </tr>";
    }

    echo "</table>";
}