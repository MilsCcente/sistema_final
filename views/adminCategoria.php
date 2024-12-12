<div>
    <center>
    <h1>lista de categorias</h1> 
    </center>

</div>
<div>
<a href="<?php echo BASE_URL ?>registrar-categoria" class="btn btn-info m-4">Agregar categoria</a>
</div>
<div class="col-12">
    <table border="1" class="table" style="width: 80%;">
        <thead>

           <tr>
            <th>Nro</th>
            <th>Nombre</th>
            <th>detalle</th>
            <th>Acciones</th>
           </tr>

        </thead>
        <tbody id="tbl_categoria">
        </tbody>
    </table>
</div>
<script src="<?php echo BASE_URL ?>views/js/functions_categoria.js"></script>