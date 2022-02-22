<!DOCTYPE html>
<html lang="ep">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">

                <h1>El login más malote del mundo 😎😎</h1>

                <form action="/pruebainventario/validate.php" method="post">

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nombre de Usuario</label>
                        <input name="username" type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                        <input name="password" type="password" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary">Ingresar</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>