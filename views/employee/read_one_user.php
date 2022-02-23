<?php
require("../../utils/db.php");

$id = $_GET["id"];
$sql = "SELECT * FROM employee WHERE id = $id";
$employee = $connection->query($sql);
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
            <a class="navbar-brand" href="index.php">Usuarios de equipos</a>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col">
                <table class="table table-borderless table-responsive">
                    <tbody class="card">
                        <?php
                        if ($employee->num_rows > 0) {
                            while ($row = $employee->fetch_assoc()) {
                                #region get values
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
                                        </tr>";
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