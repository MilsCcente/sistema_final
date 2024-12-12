
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            
            color: #333;
        }

        .header {
            background-color:rgb(40, 42, 40);
            color: white;
            padding: 20px;
            text-align: center;
        }

        .main-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            min-height: 80vh;
            padding: 20px;
        }

        .card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin: 15px;
            padding: 20px;
            width: 250px;
            text-align: center;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card-icon {
            font-size: 50px;
            color:rgb(51, 53, 51);
            margin-bottom: 15px;
        }

        .card-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .card-description {
            font-size: 14px;
            color: #666;
        }

        .footer {
            text-align: center;
            padding: 10px;
            background-color:rgb(40, 42, 40);
            color: white;
        }
        a{
           text-decoration: none;
        }
    </style>

    <div class="header">
        <h1>Sistema de Inventario</h1>
        <p>Gestión eficiente de productos y stock</p>
    </div>

    <div class="main-container">
        <div class="card">
            <a href="<?php echo BASE_URL ?>adminProducto">
            <div class="card-icon">📦</div>
            <div class="card-title">Productos</div>
            <div class="card-description">Administra los productos disponibles en el inventario.</div>
            </a>
        </div>

        <div class="card">
        <a href="<?php echo BASE_URL ?>adminCompras">
            <div class="card-icon">📂</div>
            <div class="card-title">Categorías</div>
            <div class="card-description">Organiza los productos en categorías específicas.</div>
            </a>
        </div>

        <div class="card">
        <a href="<?php echo BASE_URL ?>adminCategoria">
            <div class="card-icon">🛒</div>
            <div class="card-title">Compras</div>
            <div class="card-description">Gestiona las compras y proveedores del sistema.</div>
            </a>
        </div>

        <div class="card">
        <a href="<?php echo BASE_URL ?>adminUsuario">
            <div class="card-icon">👤</div>
            <div class="card-title">Usuarios</div>
            <div class="card-description">Gestiona cuentas y permisos de usuarios.</div>
            </a>
        </div>
    </div>

    


