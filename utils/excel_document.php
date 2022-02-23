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
    echo "<th style='text-align: center' colspan='11'>REPORTE DE INVENTARIO</th>";
    echo '</tr>';

    echo '<tr>';
    echo '<th>Nombre: </th>';
    echo '<th>Empleado: </th>';
    echo '<th>Tipo: </th>';
    echo '<th>Marca: </th>';
    echo '<th>Modelo: </th>';
    echo '<th>Control Remoto: </th>';
    echo '<th>Windows: </th>';
    echo '<th>Microsoft Office: </th>';
    echo '<th>Antivirus: </th>';
    echo '<th>Puerto: </th>';
    echo '<th>Ultimo Mantenimiento: </th>';
    echo '</tr>';

    while ($row = $response->fetch_assoc()) {
        $id = $row["id"];
        $name_pc = $row["name_pc"];
        $employee = $row["employee_id"];
        $type_id = $row["type_id"];
        $brand = $row["brand"];
        $model = $row["model"];
        $remote_software_id = $row["remote_software_id"];
        $windows_id = $row["windows_id"];
        $office_id = $row["office_id"];
        $antivirus_id = $row["antivirus_id"];
        $port_id = $row["port_id"];
        $maintenance = $row["maintenance"];

        $sql = "SELECT * FROM type WHERE id = $type_id";
        $data = $connection->query($sql)->fetch_assoc();
        $type = $data["name"];

        $sql = "SELECT * FROM remote_software WHERE id = $remote_software_id";
        $data = $connection->query($sql)->fetch_assoc();
        $remote_software = $data["name"];

        $sql = "SELECT * FROM windows WHERE id = $windows_id";
        $data = $connection->query($sql)->fetch_assoc();
        $windows = $data["name"];

        $sql = "SELECT * FROM office WHERE id = $office_id";
        $data = $connection->query($sql)->fetch_assoc();
        $office = $data["name"];

        $sql = "SELECT * FROM antivirus WHERE id = $antivirus_id";
        $data = $connection->query($sql)->fetch_assoc();
        $antivirus = $data["name"];

        $sql = "SELECT * FROM port WHERE id = $port_id";
        $data = $connection->query($sql)->fetch_assoc();
        $port = $data["name"];


        if (!is_null($employee)) {
            $sql = "SELECT * FROM employee WHERE id = $employee";
            $data = $connection->query($sql)->fetch_assoc();
            $employee = $data["name"];
        }



        echo "
        <tr>
            <td>$name_pc</td>
            <td>$employee</td>
            <td>$type</td>
            <td>$brand</td>
            <td>$model</td>
            <td>$remote_software</td>
            <td>$windows</td>
            <td>$office</td>
            <td>$antivirus</td>
            <td>$port</td>
            <td>$maintenance</td>
        </tr>";
    }

    echo "</table>";
}
