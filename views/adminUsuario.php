<div>
    <center>
    <h1>lista de usuarios</h1> 
    </center>

</div>
<div>
<a href="<?php echo BASE_URL ?>registrar-persona" class="btn btn-info m-4">Agregar Usuario</a>
</div>

<div class="col-12">
    <table border="1" class="table" style="width: 80%;">
        <thead>
           <tr>
            <th>Nro</th>
            <th>nro_identidad</th>
            <th>razon_social</th>
            <th>telefono</th>
            <th>correo</th>
            <th>departamento</th>
            <th>provincia</th>
            <th>distrito</th>
            <th>cod_postal</th>
            <th>direccion</th>
            <th>rol</th>
            
            <th>Acciones</th>
           </tr>
        </thead>
        <tbody id="tbl_usuario">
            
        </tbody>
    </table>
</div>
<script src="<?php echo BASE_URL ?>views/js/functions_personas.js"></script>