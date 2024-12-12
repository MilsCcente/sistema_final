<head>
    <style>
        /* Estilos para centrar el formulario en la página y darle un fondo suave */
        .form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #6dd5fa, #2980b9);
        }

        /* Estilos principales del formulario */
        .form {
            background-color: #ffffff;
            margin: 20px;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.2);
            width: 400px;
            font-family: Arial, sans-serif;
        }

        /* Estilo de cada campo de formulario */
        .form div {
            margin-bottom: 20px;
        }

        /* Estilo de etiquetas */
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
            color: #333;
        }

        /* Estilo de campos de entrada */
        input[type="text"],
        input[type="date"],
        input[type="file"],
        select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
            font-size: 15px;
            background-color: #f7f9fc;
            transition: all 0.3s ease;
        }

        /* Estilo de campo activo */
        input[type="text"]:focus,
        input[type="date"]:focus,
        input[type="file"]:focus,
        select:focus {
            border-color: #2980b9;
            background-color: #eaf4fc;
        }

        /* Estilo del botón */
        .button {
            width: 100%;
            padding: 15px;
            background-color: #2980b9;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 17px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        /* Efecto hover en el botón */
        .button:hover {
            background-color: #2575a7;
        }

        /* Estilo del título */
        h2 {
            text-align: center;
            color: #333;
            font-size: 26px;
            font-weight: 700;
            margin-bottom: 25px;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <form class="form" action="" id="frmActualizar">
        <input type="hidden" name ="id_categoria" id="id_categoria">
            <h2>Editar Categorias</h2>
            <div>
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" placeholder="Nombre" required>
            </div>
            <div>
                <label for="detalle">Detalle</label>
                <input type="text" id="detalle" name="detalle" placeholder="Detalle" required>
            </div>

            <button type="button" class="button" onclick="actualizar_categoria();">Actualizar</button>
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        </form>
    </div>

    <script src="<?php echo BASE_URL ?>views/js/functions_categoria.js"></script>
    <script src="<?php echo BASE_URL; ?>views/js/jquery-3.6.0.min.js"></script>
    
    <script>
        
        const id_p=<?php $pagina=explode("/", $_GET['views']); echo $pagina[1]; ?>;
        editar_categoria(id_p);
    </script>
</body>
