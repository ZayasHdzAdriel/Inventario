<?php

require("../../utils/db.php");
$name_pc = $type_id = $brand = $model = $employee_id = $windows_id = $office_id = $antivirus = $remote_software_id = $port_id = $maintenance = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name_pc = htmlspecialchars($_POST["name_pc"]);
    $type_id = htmlspecialchars($_POST["type_id"]);
    $brand = htmlspecialchars($_POST["brand"]);
    $model = htmlspecialchars($_POST["model"]);
    $employee_id = !isset($_POST["employee_id"]) ? 'NULL' : $_POST["employee_id"];
    $windows_id = htmlspecialchars($_POST["windows_id"]);
    $office_id = htmlspecialchars($_POST["office_id"]);
    $antivirus_id = htmlspecialchars($_POST["antivirus_id"]);
    $remote_software_id = htmlspecialchars($_POST["remote_software_id"]);
    $port_id = htmlspecialchars($_POST["port_id"]);
    $maintenance = htmlspecialchars($_POST["maintenance"]);


    // if (
    //?     !empty($name_pc) && !empty($type) && !empty($brand) && !empty($model) && !empty($windows_id) && !empty($office_id)
    //     && !empty($antivirus_id) && !empty($remote_software_id) && !empty($port_id)
    // ) {
    
    $sql = "INSERT INTO warehouse (name_pc, type_id, employee_id, remote_software_id, brand, model, windows_id, office_id, antivirus_id, port_id, maintenance) 
                VALUES ('$name_pc', $type_id, $employee_id, $remote_software_id,'$brand','$model', $windows_id, $office_id, $antivirus_id, $port_id, '$maintenance')";

    if ($connection->query($sql) === TRUE) {
        echo '<div class="alert alert-success" role="alert">
                    Se creo correctamente
                  </div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">
                    Ha ocurrido un error <br>
                    Error:  ' . $sql . ' <br>  ' . $connection->error . '
                  </div>';
    }


    // $connection->close();
    // }
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
            <a class="navbar-brand" href="index.php">Inventario IT</a>
        </div>
    </nav>

    <div class="container">
        <div class="row pt-3">
            <div class="col">
                <div class="card">
                    <span>
                        <a class="m-2" href="index.php">Back</a>
                        <h1 class="card-title text-center">Ingresar Equipo</h5>
                    </span>
                    <div class="card-body">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                            <div class="mb-3">
                                <label for="name_pc" class="form-label">Nombre Computadora</label>
                                <input type="text" class="form-control" name="name_pc" placeholder="MX12IAIOXXXX" required />
                            </div>
                            <div class="mb-3">
                                <!-- ComboBox -->
                                <label for="type_id" class="form-label">Tipo</label>
                                <?php
                                $sql = "SELECT id, name FROM type";
                                $result = $connection->query($sql);

                                if ($result->num_rows > 0) {
                                    echo '<select name="type_id" class="form-select">';
                                    echo '<option value="" selected disabled >Seleccione tipo de Ordenador</option>';
                                    while ($row = $result->fetch_assoc()) {

                                        echo '<option value="' . $row["id"] . '">' . $row["name"] . '</option>';
                                    }
                                    echo '</select>';
                                }
                                ?>
                            </div>
                            <div class="mb-3">
                                <!-- ComboBox -->
                                <label for="employee_id" class="form-label">Usuario</label>
                                <?php
                                $sql = "SELECT id, name FROM employee";
                                $result = $connection->query($sql);

                                if ($result->num_rows > 0) {
                                    echo '<select name="employee_id" class="form-select">';
                                    echo '<option value="" selected disabled >Seleccione el Usuario</option>';
                                    while ($row = $result->fetch_assoc()) {

                                        echo '<option value="' . $row["id"] . '">' . $row["name"] . '</option>';
                                    }
                                    echo '</select>';
                                }
                                ?>
                            </div>
                            <div class="mb-3">
                                <!-- ComboBox -->
                                <label for="remote_software_id" class="form-label">Controladores Remotos</label>
                                <?php
                                $sql = "SELECT id, name FROM remote_software";
                                $result = $connection->query($sql);

                                if ($result->num_rows > 0) {
                                    echo '<select name="remote_software_id" class="form-select">';
                                    echo '<option value="" selected disabled >Seleccione Controlador Remoto</option>';
                                    while ($row = $result->fetch_assoc()) {

                                        echo '<option value="' . $row["id"] . '">' . $row["name"] . '</option>';
                                    }
                                    echo '</select>';
                                }
                                ?>
                            </div>
                            <div class="mb-3">
                                <label for="brand" class="form-label">Marca</label>
                                <input type="text" class="form-control" name="brand" placeholder="HP" required />
                            </div>
                            <div class="mb-3">
                                <label for="model" class="form-label">Modelo</label>
                                <input type="text" class="form-control" name="model" placeholder="Ejemplo de Modelo" required />
                            </div>
                            <div class="mb-3">
                                <!-- ComboBox -->
                                <label for="windows_id" class="form-label">Windows</label>
                                <?php
                                $sql = "SELECT id, name FROM windows";
                                $result = $connection->query($sql);

                                if ($result->num_rows > 0) {
                                    echo '<select name="windows_id" class="form-select">';
                                    echo '<option value="" selected disabled >Seleccione el Windows</option>';
                                    while ($row = $result->fetch_assoc()) {

                                        echo '<option value="' . $row["id"] . '">' . $row["name"] . '</option>';
                                    }
                                    echo '</select>';
                                }
                                ?>
                            </div>
                            <div class="mb-3">
                                <!-- ComboBox -->
                                <label for="office_id" class="form-label">Microsoft Office</label>
                                <?php
                                $sql = "SELECT id, name FROM office";
                                $result = $connection->query($sql);

                                if ($result->num_rows > 0) {
                                    echo '<select name="office_id" class="form-select">';
                                    echo '<option value="" selected disabled >Seleccione el Microsoft Office</option>';
                                    while ($row = $result->fetch_assoc()) {

                                        echo '<option value="' . $row["id"] . '">' . $row["name"] . '</option>';
                                    }
                                    echo '</select>';
                                }
                                ?>
                            </div>
                            <div class="mb-3">
                                <!-- ComboBox -->
                                <label for="antivirus_id" class="form-label">Antivirus</label>
                                <?php
                                $sql = "SELECT id, name FROM antivirus";
                                $result = $connection->query($sql);

                                if ($result->num_rows > 0) {
                                    echo '<select name="antivirus_id" class="form-select">';
                                    echo '<option value="" selected disabled >Seleccione el Antivirus</option>';
                                    while ($row = $result->fetch_assoc()) {

                                        echo '<option value="' . $row["id"] . '">' . $row["name"] . '</option>';
                                    }
                                    echo '</select>';
                                }
                                ?>
                            </div>
                            <div class="mb-3">
                                <!-- ComboBox -->
                                <label for="port_id" class="form-label">Puerto</label>
                                <?php
                                $sql = "SELECT id, name FROM port";
                                $result = $connection->query($sql);

                                if ($result->num_rows > 0) {
                                    echo '<select name="port_id" class="form-select">';
                                    echo '<option value="" selected disabled >Seleccione el Puerto de Internet</option>';
                                    while ($row = $result->fetch_assoc()) {

                                        echo '<option value="' . $row["id"] . '">' . $row["name"] . '</option>';
                                    }
                                    echo '</select>';
                                }
                                ?>
                            </div>
                            <div class="mb-3">
                                <label for="maintenance" class="form-label">Mantenimiento</label>
                                <input type="date" class="form-control" id="title" name="maintenance" placeholder="An indecredible title" required />
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