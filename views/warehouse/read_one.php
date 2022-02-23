<?php
require("../../utils/db.php");

$id = $_GET["id"];
$sql = "SELECT * FROM warehouse WHERE id = $id";
$warehouse = $connection->query($sql);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - Read</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Inventario IT</a>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col">
                <table class="table table-borderless table-responsive">
                    <tbody class="card">
                        <?php
                        if ($warehouse->num_rows > 0) {
                            while ($row = $warehouse->fetch_assoc()) {
                                #region get values
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

                                #endregion
                        
                                echo "
                                    <tr><th>Nombre: </th>               <td>$name_pc</td></tr>
                                    <tr><th>Empleado: </th>             <td>$employee</td></tr>
                                    <tr><th>Tipo: </th>                 <td>$type</td></tr>
                                    <tr><th>Marca: </th>                <td>$brand</td></tr>
                                    <tr><th>Modelo: </th>               <td>$model</td></tr>
                                    <tr><th>Control Remoto: </th>       <td>$remote_software</td></tr>
                                    <tr><th>Windows: </th>              <td>$windows</td></tr>
                                    <tr><th>Microsoft Office: </th>     <td>$office</td></tr>
                                    <tr><th>Antivirus: </th>            <td>$antivirus</td></tr>
                                    <tr><th>Puerto: </th>               <td>$port</td></tr>
                                    <tr><th>Ultimo Mantenimiento: </th> <td>$maintenance</td></tr>
                                    ";
                            }
                        }


                        ?>
                    </tbody>
                </table>
                <a class="btn btn-primary float-end m-4 ps-3 pe-3" href="index.php">Volver</a>
            </div>
        </div>
    </div>

</body>



</html>