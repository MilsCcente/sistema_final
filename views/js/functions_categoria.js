async function registrar_categorias() {
    let nombre = document.querySelector('#nombre').value;
    let detalle = document.querySelector('#detalle').value;

    if (nombre == "" || detalle == "") {
        alert("error, campos vacios");
        return;
    }
    try {
        const datos = new FormData(frmRegistrarCategoria);
        let respuesta = await fetch(base_url + 'controller/categoria.php?tipo=registrar', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });

        json = await respuesta.json();

        if (json.status) {
            swal("Registro", json.mensaje, "success");
        } else {
            swal("Registro", json.mensaje, "error");

        }

        console.log(json);
    } catch (e) {
        console.log("oops ocurrio un error" + e);
    }

}

async function listar_categoria() {
    try {
        let respuesta = await fetch(base_url + 'controller/categoria.php?tipo=listar');
        let json = await respuesta.json();
        if (json.status) {
            let datos = json.contenido;
            let contenido_select = '<option value="">Seleccione</option>';

            datos.forEach(element => {
                contenido_select += '<option value="' + element.id + '">' + element.nombre + '</option>';

                //se trabaja con jquery
                /*$('#categoria').append($('<option />',{
                    text:`${element.nombre}`,
                    value:`${element.id}`
                }));*/

            });
            document.getElementById('categoria').innerHTML = contenido_select;

        }


        console.log(respuesta);

    } catch (error) {
        console.log("error al cargar categoria" + error);
    }

}


async function admin_categoria() {
    try {
        let respuesta = await fetch(base_url + 'controller/categoria.php?tipo=listar');
        let json = await respuesta.json();
        if (json.status) {
            let datos = json.contenido;
            let cont = 0;
            datos.forEach(item => {
                let nueva_fila = document.createElement("tr");
                nueva_fila.id = "fila_" + item.id;
                cont += 1;
                nueva_fila.innerHTML = `
                <th>${cont}</th>
                <td>${item.nombre}</td>
                <td>${item.detalle}</td>
                <td>${item.options}</td>`;

                document.querySelector('#tbl_categoria').appendChild(nueva_fila)
            });
        }
        console.log(json);
    } catch (error) {
        console.log("oops salio error" + error);
    }
}

if (document.querySelector('#tbl_categoria')) {
    admin_categoria();
}





async function listar_proveedor() {
    try {

        let respuesta = await fetch(base_url + 'controller/proveedor.php?tipo=listar');
        let json = await respuesta.json();

        if (json.status) {
            let datos = json.contenido;
            let contenido_select = '<option value="">Seleccione</option>';


            datos.forEach(element => {
                contenido_select += `<option value="${element.id}">${element.razon_social}</option>`;

                // Si deseas trabajar con jQuery, puedes utilizar esta sección
                /*
                $('#categoria').append($('<option />', {
                    text: `${element.nombre}`,
                    value: `${element.id}`
                }));
                */
            });
            document.getElementById('proveedor').innerHTML = contenido_select;
        } else {
            console.log("No se encontraron proveedores.");
        }

        console.log(json);

    } catch (error) {
        console.log("Error al cargar proveedor: " + error);
    }
}


async function editar_categoria(id) {
    const formData= new FormData();
    formData.append('id_categoria', id);
    try {
        let respuesta = await fetch(base_url +'controller/categoria.php?tipo=ver', {
            method: 'POST',
            mode : 'cors',
            cache: 'no-cache',
            body : formData
        });
        json = await respuesta.json();
        if (json.status) {
            document.querySelector('#id_categoria').value = json.contenido.id;
            document.querySelector('#nombre').value = json.contenido.nombre;
            document.querySelector('#detalle').value = json.contenido.detalle;
           


        }else{
            window.location= base_url+"admincategoria";
        }

        console.log(json);


    } catch (error) {
        console.log("Oops, ocurrio un error" +error);
    }
    
}

async function actualizar_categoria() {
    const datos = new FormData(frmActualizar);
    try {

        let respuesta = await fetch(base_url + 'controller/categoria.php?tipo=actualizar', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });
        json = await respuesta.json();
        if (json.status) {
            swal("Registro", json.mensaje, "success")
        } else {
            swal("Registro", json.mensaje, "error")

        }
        console.log(json);
    } catch (e) {
        console.log("Oops ocurrio un error" + e)
    }


}





//eliminar producto
async function eliminarCategorias(id) {
    swal({
        title: "¿Realmente desea eliminar categoria?",
        text: "no podras recuperarlo" ,
        icon: "warning",
        buttons: true,
        dangerMode: true
    }).then((willDelete) => {
        if (willDelete) {
            fnt_eliminar(id);
        }
    })
}

async function fnt_eliminar(id) {
    const formdata = new FormData();
    formdata.append('id_categoria', id);
    try {
        let respuesta = await fetch(base_url + 'controller/categoria.php?tipo=eliminar', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: formdata
        });
        let json = await respuesta.json();

        if (json.status) {
            swal("Eliminar", json.message || "Eliminado correctamente", "success");
            document.querySelector('#fila_' + id).remove();
        } else {
            swal("Eliminar", json.message, "warning");
        }
    } catch (e) {
        console.log("Ocurrió un error: " + e);
        swal("Eliminar", "No se puede eliminar por que este dato esta vinculado con otro registro.", "error");
    }
}
