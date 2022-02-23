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
            <a class="navbar-brand" href="../home.php">Inventario IT</a>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col">
                <form action="/search" method="get" onkeydown="return event.key != 'Enter';">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Buscar un Equipo por Nombre</label>
                        <input type="search" class="form-control" id="searchbar_user" name="username" autocomplete="false">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Buscar un Equipo por Usuario</label>
                        <input type="search" class="form-control" id="searchbar_item" name="itemname" autocomplete="false">
                    </div>
                </form>

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
                    </tbody>
                </table>

                <a class="btn btn-primary float-end m-4 ps-3 pe-3" href="create.php">Ingresar nuevo objecto</a>
                <a class="btn btn-secondary float-end m-4 ps-3 pe-3" href="/inventario/utils/excel_document.php">Generar Documento Excel</a>
            </div>
        </div>
    </div>

    <script>
        let inputItem = document.querySelector('#searchbar_item');
        let inputUser = document.querySelector('#searchbar_user');


        async function getData() {
            let itemName = inputItem.value !== '' ?  'username=' + inputItem.value + '&' : '' ;
            let userName = inputUser.value !== '' ? 'itemname=' + inputUser.value : '' ;

            let response = await fetch('/pruebainventario/views/warehouse/search.php?' + itemName + userName );
            let users = await response.text();
            document.querySelector('tbody').innerHTML = users;
        }
        
        window.onload = getData;
        inputItem.addEventListener('input', async () => getData());
        inputUser.addEventListener('input', async () => getData());

    </script>

</body>

</html>