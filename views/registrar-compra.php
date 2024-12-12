<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Compras</title>
    <style>
        /* Estilos para el contenedor del formulario */
        .form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f2f5;
        }

        /* Estilos para el formulario */
        .form {
            background-color: #ffffff;
            margin: 20px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 350px;
            font-family: Arial, sans-serif;
        }

        .form div {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }

        /* Estilos para los inputs y selects */
        input[type="text"],
        input[type="date"],
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 14px;
            background-color: #f9f9f9;
        }

        /* Estilos para el botón */
        .button {
            width: 100%;
            padding: 12px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #45a049;
        }

        /* Estilo de hover para los inputs y selects */
        input[type="text"]:focus,
        input[type="date"]:focus,
        select:focus {
            border-color: #4CAF50;
            outline: none;
            background-color: #f1f9f1;
        }

        /* Estilos para el título */
        h2 {
            text-align: center;
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <form class="form" action="" id="frmRegistrarCompra">
            <h2>Registrar Compra</h2>
            <div>
                <label for="id_producto">Producto</label>
                <select name="id_producto" id="id_producto" required>
                    <option value="">-- Seleccione producto --</option>
                </select>
            </div>
            <div>
                <label for="cantidad">Cantidad</label>
                <input type="text" id="cantidad" name="cantidad" placeholder="Cantidad" required>
            </div>
            <div>
                <label for="precio">Precio</label>
                <input type="text" id="precio" name="precio" placeholder="Precio" required>
            </div>
            <div>
                <label for="fecha_compra">Fecha de Compra</label>
                <input type="date" id="fecha_compra" name="fecha_compra" required>
            </div>
            <div>
                <label for="id_trabajador">Trabajador</label>
                <select name="id_trabajador" id="id_trabajador" required>
                    <option value="">-- Seleccione trabajador --</option>
                </select>
            </div>
            <button type="button" class="button" onclick="registrar_compra();">Enviar</button>
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        </form>
    </div>
    <script src="<?php echo BASE_URL ?>views/js/functions_compras.js"></script>
    <script>
        listar_productos();
    </script>
    <script>
        listar_trabajadores();
    </script>
</body>

</html>