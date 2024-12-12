<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administracion</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const base_url = '<?php echo BASE_URL ?>'
    </script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }

        /* Contenedor del menú */
        nav {
            background-color: #333;
            width: 250px;
            height: 100vh;
            padding-top: 20px;
            box-shadow: 4px 0 6px rgba(0, 0, 0, 0.1);
            position: fixed;
            top: 0;
            left: 0;
        }

        /* Lista del menú */
        ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        /* Elementos del menú */
        ul li {
            margin: 15px 0;
        }

        /* Enlaces del menú */
        ul li a {
            text-decoration: none;
            color: #fff;
            font-size: 18px;
            font-weight: bold;
            padding: 10px 20px;
            display: block;
            transition: background-color 0.3s, color 0.3s, transform 0.3s;
        }

        ul li a:hover {
            background-color: #575757;
            color: #ffcc00;
            border-radius: 5px;
            transform: scale(1.05);
        }

        /* Botón de cerrar sesión */
        .logout {
            margin-top: 20px;
            text-align: center;
        }

        .logout a {
            text-decoration: none;
            color: #fff;
            background-color: #d9534f;
            font-size: 18px;
            font-weight: bold;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s, transform 0.3s;
        }

        .logout a:hover {
            background-color: #c9302c;
            transform: scale(1.05);
        }

        /* Contenido principal */
        main {
            margin-left: 250px;
            padding: 20px;
        }
    </style>
</head>

<body>

<div class="d-flex"></div>
    <nav>
        <ul>
            <li><a href="#">Inicio</a></li>
            <li><a href="<?php echo BASE_URL ?>adminProducto">Productos</a></li>
            <li><a href="<?php echo BASE_URL ?>adminCompras">Compras</a></li>
            <li><a href="<?php echo BASE_URL ?>adminCategoria">Categoria</a></li>
            <li><a href="<?php echo BASE_URL ?>adminUsuario">Usuarios</a></li>

        </ul>
        <div class="logout">
            <a class="nav-link mt-4" onclick="cerrar_sesion();" style="background-color: #ca0a0b">
                <i class="nav-icon fas fa-door-closed"></i>
                <p>
                    Cerrar Sesión
                </p>
            </a>
        </div>
    </nav>


    <main>

  