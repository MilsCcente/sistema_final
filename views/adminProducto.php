<div>
    <center>
    <h1>lista de productos registrados</h1> 
    </center>

</div>
<div>
<a href="<?php echo BASE_URL ?>nuevo-producto" class="btn btn-info">Agregar producto</a>
</div>
<div class="col-12">




    <table border ="1" class="table m-5" style="width: 100%;" >
        <thead>
            <tr>
                <th>Nro</th>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Stock</th>
                <th>Categoria</th>
                <th>Proveedor</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id ="tbl_productos">
           <!--  <td>producto</td>
                <td>12</td>
                <td>123</td>
                <td>lai</td>
                <td>editar eliminar</td>-->

        </tbody>
    </table>
</div>
<script src="<?php echo BASE_URL; ?>views/js/functions_producto.js"></script>