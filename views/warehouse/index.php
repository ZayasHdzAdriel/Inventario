<?php
    include "../../utils/db.php";
    $sql = "SELECT * FROM warehouse";
    $warehouse = $connection->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="../home.php">El inventario más malote 😈🥵🤑</a>
        </div>
    </nav>

    <?php

    ?>

<div class="container">
        <div class="row">
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Usuario</th>
                            <th scope="col">Marca</th>
                            <th scope="col">Modelo</th>
                            <th scope="col">Ultimo Mantenimiento</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if ($warehouse->num_rows > 0) {
                                while($row = $warehouse->fetch_assoc()) {

                                    $id = $row["id"];
                                    $name = $row["name_pc"];
                                    $employee = 'Ninguno';
                                    $brand = $row["brand"];
                                    $model = $row["model"];
                                    $maintenance = $row["maintenance"];

                                    //? This query is used for take the employee name
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
                        ?>
                    </tbody>
                </table>

                <a class="btn btn-primary float-end m-4 ps-3 pe-3" href="create.php">Ingresar nuevo objecto</a>
            </div>
        </div>
    </div>

</body>

</html>