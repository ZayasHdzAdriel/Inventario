<?php
include "../../utils/db.php";
$sql = "SELECT * FROM employee";
$employee = $connection->query($sql);
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
            <a class="navbar-brand" href="../home.php">Usuarios de equipos</a>
        </div>
    </nav>



    <div class="container">
        <div class="row">
            <div class="col">

                <form action="/search" method="get" onkeydown="return event.key != 'Enter';">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Buscar un Usuario</label>
                        <input type="text" class="form-control" id="searchbar" name="username" autocomplete="off">
                    </div>
                </form>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Departamento</th>
                            <th scope="col">Planta</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>

                <a class="btn btn-primary float-end m-4 ps-3 pe-3" href="create_user.php">Ingresar nuevo objecto</a>
            </div>
        </div>
    </div>

    <script>

        var input = document.querySelector('#searchbar');


        async function getData() {
            let response = await fetch('/pruebainventario/views/employee/search.php?username=' + input.value);
            let users = await response.text();
            document.querySelector('tbody').innerHTML = users;
        }



        window.onload = getData()
        input.addEventListener('input', () => getData());

    </script>

</body>

</html>