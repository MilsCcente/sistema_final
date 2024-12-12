<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script>
        const base_url = '<?php echo BASE_URL; ?>';
    </script>
    <style>
        body,
        html {

            
            margin: 0;
            padding: 0;
            height: 100%;

        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(rgba(159, 97, 230, 0.5), rgb(100, 0, 194));

        }

        .login-container {
            background: linear-gradient(60deg, rgb(85, 47, 173)25%, rgb(153, 122, 226)75%);
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            width: 350px;
            text-align: center;
        }

        .login-container img {
            width: 100px;
            height: 100px;
            margin-bottom: 1rem;

        }

        .login-container button {
            background: linear-gradient(to right, #885dee, #7445f7);
            border: none;
            border-radius: 25px;
            color: rgb(196, 196, 196);
            padding: 0.5rem 1rem;
            width: 100%;
        }

        .login-container button:hover {
            background: linear-gradient(60deg, rgb(108, 47, 179)25%, rgb(146, 68, 236)75%);
        }

        .login-container a {
            color: #121213;
            text-decoration: none;
        }

        .form-check-label {
            margin-left: 0.5rem;
        }

        .form-check {
            display: flex;
            align-items: center;
            justify-content: start;
        }

        img {
            border-radius: 50%;
            opacity: 75%;
        }
    </style>
</head>

<body>
    <div class="container" style="display: flex; justify-content: center;">


        <div class="login-container" style="border-radius: 0px 20px 20px 0px;">
            <h2>INICIAR SESION</h2>
            <img src="https://i.pinimg.com/236x/fd/65/70/fd65706dee7cc8955629c785b16b8b9d.jpg" alt="..."
                border-radios:50%;>
            <!-- OJO: Este formulario se utiliza para el inicio de sesión -->
            <form action="" id="frm_iniciar_sesion">

                <div class="mb-3 p-1">
                    <input type="text" id="usuario" class="form-control" placeholder="Ingresar usuario" name="usuario"  required>
                </div>
                <div class="mb-3 p-1">

                    <input type="password" id="password" class="form-control" name="password" placeholder="Ingresar contraseña">
                </div>
                <!-- ojo-->
                <button type="submit" class="btn btn-primary">Iniciar sesion</button>

                <h3><p>usuario: 74356670</p></h3>
                <h3> <p>password: 74356670</p></h3>
            </form>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo BASE_URL; ?>views/js/functions_login.js"></script>

</html>