<!DOCTYPE html>
<html lang="en">
<head>
    <title>Formulario de Registro de Persona</title>
    <style>
        /* Centrar el formulario en la pantalla con fondo degradado */
        .form-container {
            display: flex;
            justify-content: center;
            align-items: center;

        }

        /* Estilos del formulario */
        .form {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
            width: 50%;
            max-width: 800px;
            font-family: Arial, sans-serif;
        }

        .form div {
            margin-bottom: 20px;
        }

        .form-row {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .form-col {
            flex: 1;
            min-width: 300px;
        }

        /* Estilo del título */
        h2 {
            text-align: center;
            color: #333;
            font-size: 26px;
            margin-bottom: 30px;
            font-weight: bold;
        }

        /* Estilo de etiquetas */
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        /* Estilo de los campos de entrada */
        input[type="text"],
        input[type="date"],
        input[type="file"],
        select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 15px;
            background-color: #f8f9fa;
            transition: all 0.3s ease;
        }

        /* Efecto al enfocar en los campos */
        input[type="text"]:focus,
        input[type="date"]:focus,
        input[type="file"]:focus,
        select:focus {
            border-color: #4CAF50;
            background-color: #e9f5e9;
            outline: none;
        }

        /* Botón estilizado */
        .button {
            width: 100%;
            padding: 14px;
            background-color: #4CAF50;
            color: #ffffff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #45a049;
        }

        /* Alinear texto de ayuda al final */
        .form p {
            text-align: center;
            font-size: 12px;
            color: #666;
        }
    </style>
</head>
<body>
    
    <div class="form-container">
        <form class="form" action="" id="RegistrarPersona">
            <h2>Registrar Persona</h2>
            <div class="form-row">
                <div class="form-col">
                    <div>
                        <label for="nro_identidad">Número de Identidad</label>
                        <input type="text" id="nro_identidad" name="nro_identidad" placeholder="Número de Identidad" required>
                    </div>
                    <div>
                        <label for="razon_social">Razón Social</label>
                        <input type="text" id="razon_social" name="razon_social" placeholder="Razón Social" required>
                    </div>
                    <div>
                        <label for="telefono">Teléfono</label>
                        <input type="text" id="telefono" name="telefono" placeholder="Teléfono" required>
                    </div>
                    <div>
                        <label for="correo">Correo</label>
                        <input type="text" id="correo" name="correo" placeholder="Correo" required>
                    </div>
                    <div>
                        <label for="departamento">Departamento</label>
                        <input type="text" id="departamento" name="departamento" placeholder="Departamento" required>
                    </div>
                    <div>
                        <label for="provincia">Provincia</label>
                        <input type="text" id="provincia" name="provincia" placeholder="Provincia" required>
                    </div>
                </div>
                <div class="form-col">
                    <div>
                        <label for="distrito">Distrito</label>
                        <input type="text" id="distrito" name="distrito" placeholder="Distrito" required>
                    </div>
                    <div>
                        <label for="cod_postal">Código Postal</label>
                        <input type="text" id="cod_postal" name="cod_postal" placeholder="Código Postal" required>
                    </div>
                    <div>
                        <label for="direccion">Dirección</label>
                        <input type="text" id="direccion" name="direccion" placeholder="Dirección" required>
                    </div>
                    <div>
                        <label for="rol">Rol</label>
                        <input type="text" id="rol" name="rol" placeholder="Rol" required>
                    </div>
                    <div>
                        <label for="password">Contraseña</label>
                        <input type="text" id="password" name="password" placeholder="Contraseña" required>
                    </div>
                    
                </div>
            </div>
            <button type="button" class="button" onclick="registrar_personas();">Enviar</button>
            <p>Complete todos los campos antes de enviar.</p>
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        </form>
    </div>
    <script src="<?php echo BASE_URL ?>views/js/functions_personas.js"></script>
</body>
</html>
