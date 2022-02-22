<?php
require("../../utils/db.php");

$name_pc = $type_id = $brand = $model = $employee_id = $windows_id = $office_id = $antivirus = $remote_software_id = $port_id = $maintenance = "";

$id = $_GET['id'];
$sql_select = "SELECT * FROM warehouse WHERE id = $id";
$data = $connection->query($sql_select)->fetch_assoc();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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


    $sql_update = "UPDATE `warehouse` SET 
            name_pc='$name_pc',
            type_id=$type_id,
            employee_id=$employee_id,
            remote_software_id=$remote_software_id,
            brand='$brand',
            model='$model',
            windows_id=$windows_id,
            office_id=$office_id,
            antivirus_id=$antivirus_id,
            port_id=$port_id,
            maintenance='$maintenance' 
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
            <a class="navbar-brand" href="index.php">El inventario más malote 😈🥵🤑</a>
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
                        <form action='<?php echo htmlspecialchars($_SERVER['PHP_SELF']."?id=$id") ?>' method="POST">
                            <div class="mb-3">
                                <label for="name_pc" class="form-label">Nombre Computadora</label>
                                <input type="text" class="form-control" name="name_pc" value="<?php echo $data['name_pc'] ?>" placeholder="MX12IAIOXXXX" required />
                            </div>
                            <div class="mb-3">
                                <!-- ComboBox -->
                                <label for="type_id" class="form-label">Tipo</label>
                                <?php
                                $sql = "SELECT id, name FROM type";
                                $result = $connection->query($sql);

                                if ($result->num_rows > 0) {
                                    echo '<select name="type_id" class="form-select">';
                                    echo '<option value="" disabled >Seleccione tipo de Ordenador</option>';
                                    while ($row = $result->fetch_assoc()) {

                                        if ($row['id'] == $data['type_id']) {
                                            echo '<option selected value="' . $row["id"] . '">' . $row["name"] . '</option>';
                                        } else {
                                            echo '<option value="' . $row["id"] . '">' . $row["name"] . '</option>';
                                        }
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
                                    echo '<option value="NULL" >Ninguno</option>';
                                    while ($row = $result->fetch_assoc()) {

                                        if ($row['id'] == $data['employee_id']) {
                                            echo '<option selected value="' . $row["id"] . '">' . $row["name"] . '</option>';
                                        } else {
                                            echo '<option value="' . $row["id"] . '">' . $row["name"] . '</option>';
                                        }
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
                                    echo '<option value="" disabled >Seleccione Controlador Remoto</option>';
                                    while ($row = $result->fetch_assoc()) {

                                        if ($row['id'] == $data['remote_software_id']) {
                                            echo '<option selected value="' . $row["id"] . '">' . $row["name"] . '</option>';
                                        } else {
                                            echo '<option value="' . $row["id"] . '">' . $row["name"] . '</option>';
                                        }
                                    }
                                    echo '</select>';
                                }
                                ?>
                            </div>
                            <div class="mb-3">
                                <label for="brand" class="form-label">Marca</label>
                                <input type="text" class="form-control" name="brand" value="<?php echo $data['brand'] ?>" placeholder="HP" required />
                            </div>
                            <div class="mb-3">
                                <label for="model" class="form-label">Modelo</label>
                                <input type="text" class="form-control" name="model" value="<?php echo $data['model'] ?>" placeholder="Ejemplo de Modelo" required />
                            </div>
                            <div class="mb-3">
                                <!-- ComboBox -->
                                <label for="windows_id" class="form-label">Windows</label>
                                <?php
                                $sql = "SELECT id, name FROM windows";
                                $result = $connection->query($sql);

                                if ($result->num_rows > 0) {
                                    echo '<select name="windows_id" class="form-select">';
                                    echo '<option value="" disabled >Seleccione el Windows</option>';
                                    while ($row = $result->fetch_assoc()) {

                                        if ($row['id'] == $data['windows_id']) {
                                            echo '<option selected value="' . $row["id"] . '">' . $row["name"] . '</option>';
                                        } else {
                                            echo '<option value="' . $row["id"] . '">' . $row["name"] . '</option>';
                                        }
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
                                    echo '<option value="" disabled >Seleccione el Microsoft Office</option>';
                                    while ($row = $result->fetch_assoc()) {

                                        if ($row['id'] == $data['office_id']) {
                                            echo '<option selected value="' . $row["id"] . '">' . $row["name"] . '</option>';
                                        } else {
                                            echo '<option value="' . $row["id"] . '">' . $row["name"] . '</option>';
                                        }
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
                                    echo '<option value="" disabled >Seleccione el Antivirus</option>';
                                    while ($row = $result->fetch_assoc()) {

                                        if ($row['id'] == $data['antivirus_id']) {
                                            echo '<option selected value="' . $row["id"] . '">' . $row["name"] . '</option>';
                                        } else {
                                            echo '<option value="' . $row["id"] . '">' . $row["name"] . '</option>';
                                        }
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
                                    echo '<option value="" disabled >Seleccione el Puerto de Internet</option>';
                                    while ($row = $result->fetch_assoc()) {

                                        if ($row['id'] == $data['port_id']) {
                                            echo '<option selected value="' . $row["id"] . '">' . $row["name"] . '</option>';
                                        } else {
                                            echo '<option value="' . $row["id"] . '">' . $row["name"] . '</option>';
                                        }
                                    }
                                    echo '</select>';
                                }
                                ?>
                            </div>
                            <div class="mb-3">
                                <label for="maintenance" class="form-label">Mantenimiento</label>
                                <input type="date" class="form-control" id="title" name="maintenance" value="<?php echo $data['maintenance'] ?>" placeholder="An indecredible title" required />
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