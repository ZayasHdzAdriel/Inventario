<?php
require("../../utils/db.php");

$id = $_GET["id"];
$sql = "DELETE FROM warehouse WHERE id=$id";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($connection->query($sql) === TRUE) {
        $connection->close();
        header("Location: index.php");
        echo '<div class="alert alert-success" role="success">
                    Registro eliminado correctamente
              </div>';
        die();
    } else {
        echo "Error deleting record: " . $connection->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - Delete</title>
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
                    <h1 class="card-title text-center">¿Está seguro de querer eliminar el registro?</h5>
                        <div class="card-body">
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?id=$id"; ?>" method="post">
                                <div class="d-grid gap-2 pt-4">
                                    <button class="btn btn-danger" type="submit">Si</button>
                                    <a href="index.php" class="btn btn-secondary">No</a>
                                </div>
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </div>

</body>


</html>