<div>
    <center>
    <h1>lista de compras realizadas</h1> 
    </center>

</div>
<div>
<a href="<?php echo BASE_URL ?>registrar-compra" class="btn btn-info m-4">Agregar compra</a>
</div>

<div class="col-12">
    <table border="1" class="table" style="width: 80%;">
        <thead>
           <tr>
            <th>Nro</th>
            <th>producto</th>
            <th>cantidad</th>
            <th>precio</th>
            <th>fecha de compra</th>
            <th>trabajador</th>
            <th>Acciones</th>
           </tr>
        </thead>
        <tbody id="tbl_compras">
            
        </tbody>
    </table>
</div>
<script src="<?php echo BASE_URL ?>views/js/functions_compras.js"></script>