<?php

require("../../utils/db.php");
$name = $departmente_id = $plant = "";

$id = $_GET['id'];
$sql_select = "SELECT * FROM employee WHERE id = $id";
$data = $connection->query($sql_select)->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $department_id = htmlspecialchars($_POST["department_id"]);
    $plant = htmlspecialchars($_POST["plant"]);

    $sql_update = "UPDATE `warehouse` SET 
            name='$name',
            department_id=$department_id,
            plant=$plant, 
            WHERE id =" . $data["id"];

    if ($connection->query($sql_update) === TRUE) {
        echo '<div class="alert alert-success" role="alert">
                Registro actualizado satisfactoriamente
              </div>';
        header("location:index.php");
    } else {
        echo '<div class="alert alert-danger" role="alert">
                Ha ocurrido un error durante la actualizacion<br>
                Error:  ' . $sql . ' <br>  ' . $connection->error . '
             </div>';
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - Create</title>
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
        <div class="row pt-3">
            <div class="col">
                <div class="card">
                    <span>
                        <a class="m-2" href="index.php">Back</a>
                        <h1 class="card-title text-center">Ingresar Usuario</h5>
                    </span>
                    <div class="card-body">
                        <form action='<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . "?id=$id") ?>' method="POST">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nombre Usuario</label>
                                <input type="text" class="form-control" name="name" value="<?php echo $data['name'] ?>" placeholder="Nombre del Usuario" required />
                            </div>
                            <div class="mb-3">
                                <!-- ComboBox -->
                                <label for="department_id" class="form-label">Departamento</label>
                                <?php
                                $sql = "SELECT id, name FROM department";
                                $result = $connection->query($sql);

                                if ($result->num_rows > 0) {
                                    echo '<select name="department_id" class="form-select">';
                                    echo '<option value="" disabled >Seleccione el departamento</option>';
                                    while ($row = $result->fetch_assoc()) {

                                        if ($row['id'] == $data['department_id']) {
                                            echo '<option selected value="' . $row["id"] . '">' . $row["name"] . '</option>';
                                        } else {
                                            echo '<option value="' . $row["id"] . '">' . $row["name"] . '</option>';
                                        }
                                    }
                                    echo '</select>';
                                }
                                ?>
                                <div class="mb-3">
                                    <label for="plant" class="form-label">Planta</label>
                                    <input type="text" class="form-control" name="plant" value="<?php echo $data['plant'] ?>" placeholder="1 - 2 - 3 - 4 - 5 ..." required />
                                </div>

                                <div class="d-grid gap-2 pt-4">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>


</html>