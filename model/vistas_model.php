<?php

session_start();

class vistaModelo
{
    protected static function obtener_vista($vista)
    {
        $palabras_permitidas = [
            'usuario',
            'productos',
            'carrito',
            'promociones',
            'producto',
            'niñosyniñas',
            'lomasvendido',
            'detallesProducto',
            'damas',
            'conocenos',
            'calificaciones',
            'caballeros',
            'favoritosUsuarios',
            'historial',
            'inicio',
            'perfilUsuario',
            'nuevo-producto',
            'registrar-categoria',
            'registrar-persona',
            'registrar-compra',
            'adminProducto',
            'adminCategoria',
            'adminProveedor',
            'adminUsuario',
            'adminCompras',
            'editar-producto',
            'editar-categoria',
            'editar-compra',
            'editar-usuario',
            'vista'
        ];

        if (!isset($_SESSION['sesion_ventas_id'])) {
            return "login";
        }

        if (in_array($vista, $palabras_permitidas)) {
            if (is_file("./views/" . $vista . ".php")) {
                $contenido = "./views/" . $vista . ".php";
            } else {
                $contenido = "404";
            }
        } elseif ($vista == "login"  || $vista == "index") {
            $contenido = "login";
        } else {
            $contenido = "404";
        }

        return $contenido;
    }
}
