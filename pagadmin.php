<?php
use Illuminate\Database\Capsule\Manager as DB;

require 'vendor/autoload.php';
require 'config/database.php'; //donde se encuentra la base de datos

    echo <<<_Uno
        <!DOCTYPE html>
        <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="node_modules/bulma/css/bulma.min.css">
                <title>Ver calificacion</title>
                <link rel="stylesheet" href="colors.css">
                <script src="node_modules/axios/dist/axios.min.js"></script><!--link de axios-->
            </head>
            <body class="colorpagina">
                <div data-role='header' id="encabezado">
                    <div class="columns">
                       <div class="column">
                            <div class="columns is-mobile">
                               <div class="column is-11 is-offset-6">
                                    <figure class="image is-128x128"><img src="imagenes/imagen24.jpg" class="imagen"></figure>
                                </div>
                            </div>
                        </div>
                        <div class="column letra">
                           <p class=" has-background-danger-dark title is-1 has-text-link is-italic has-text-centered">Artesanías en Madera</p>
                        </div>
                        <div class="column">
                            <div class="columns is-mobile">
                                <div class="column is-4 is-offset-1">
                                    <figure class="image is-128x128"><img src="imagenes/imagen29.jpg" class="imagen"> </figure>
                                </div>
                           </div>
                        </div>
                    </div>
                </div>
               <br>
               <br>
               <h5 class="letra centrado subtitle is-3 has-text-white has-background-primary-dark">Lista Total de su Compra</h5>
               <br>
                <div class="centrado">
                    <button type="button" class="button is-danger is-outlined"><a href="paginainicial.php">Regresar a la Página principal</a></button>
                </div>
                <br><br>
_Uno;

$listaproducto = DB::table('registros_totales')->get();

foreach ($listaproducto as $colum) {
    echo <<<_Consultar
    <div class="table-container">
        <table class="table has-background-success tabla3 centrarCar">
            <thead class="has-background-info">
                <tr class="tabla4">
                    <th>Número</th>
                    <th>Nombre del cliente</th>
                    <th>Apellido del cliente</th>
                    <th>Nombre de usuario del cliente</th>
                    <th>Edad delcliente</th>
                    <th>Correo del cliente</th>
                    <th>OPERACIÓN</th>
                </tr>
            </thead>
            <tr> 
                <td>$colum->idregistros_totales</td>
                <td>$colum->nombre</td>
                <td>$colum->apellido</td>
                <td>$colum->nombres_de_usuarios</td>
                <td>$colum->edad</td>
                <td>$colum->correo</td>
                <td class='centrado'>
                    <button class='button' type='button' onclick="eliminar_registros($colum->idregistros_totales)">ELIMINAR</button>
                    <button type="button" class="button is-link is-outlined"><a href="pagadmin.php">Recargar</a></button>
                </td>
            </tr>
        </table>
    </div>
_Consultar;
    echo '<br>';
    echo '<br>';
}

$listaproducto2 = DB::table('direccion_cliente')->get();

foreach ($listaproducto2 as $colum) {
    echo <<<_Consultar
    <div class="table-container">
        <table class="table has-background-success tabla3 centrarCar">
            <thead class="has-background-info">
                <tr class="tabla4">
                    <th>Número</th>
                    <th>Domicilio</th>
                    <th>Numero de casa</th>
                    <th>Estado</th>
                    <th>OPERACIÓN</th>
                </tr>
            </thead>
            <tr> 
                <td>$colum->domicilio</td>
                <td>$colum->domicilio</td>
                <td>$colum->numero_casa</td>
                <td>$colum->estado</td>
                <td class='centrado'>
                    <button class='button' type='button' onclick="eliminar_direccion($colum->iddireccion_cliente)">ELIMINAR</button>
                    <button type="button" class="button is-link is-outlined"><a href="pagadmin.php">Recargar</a></button>
                </td>
            </tr>
        </table>
    </div>
_Consultar;
    echo '<br>';
    echo '<br>';
}

$listaproducto3 = DB::table('producto')->get();

foreach ($listaproducto3 as $colum) {
    echo <<<_Consultar
    <div class="table-container">
        <table class="table has-background-success tabla3 centrarCar">
            <thead class="has-background-info">
                <tr class="tabla4 centrado">
                    <th>Número</th>
                    <th>Nombre del producto</th>
                    <th>OPERACIÓN</th>
                </tr>
            </thead>
            <tr> 
                <td>$colum->idproducto</td>
                <td>$colum->nombre_producto</td>
                <td class='centrado'>
                    <button class='button' type='button' onclick="eliminar_producto($colum->idproducto)">ELIMINAR</button>
                    <button type="button" class="button is-link is-outlined"><a href="pagadmin.php">Recargar</a></button>
                </td>
            </tr>
        </table>
    </div>
_Consultar;
    echo '<br>';
    echo '<br>';
}

$listaproducto4 = DB::table('tipo_tamano')->get();

foreach ($listaproducto4 as $colum) {
    echo <<<_Consultar
    <div class="table-container">
        <table class="table has-background-success tabla3 centrarCar">
            <thead class="has-background-info">
                <tr class="tabla4">
                    <th>Número</th>
                    <th>Nombre del tamaño</th>
                    <th>OPERACIÓN</th>
                </tr>
            </thead>
            <tr> 
                <td>$colum->idtipo_tamano</td>
                <td>$colum->nombre_tamano</td>
                <td class='centrado'>
                    <button class='button' type='button' onclick="eliminar_tamano($colum->idtipo_tamano)">ELIMINAR</button>
                    <button type="button" class="button is-link is-outlined"><a href="pagadmin.php">Recargar</a></button>
                </td>
            </tr>
        </table>
    </div>
_Consultar;
    echo '<br>';
    echo '<br>';
}

$listaproducto5 = DB::table('categorias')->get();

foreach ($listaproducto5 as $colum) {
    echo <<<_Consultar
    <div class="table-container">
        <table class="table has-background-success tabla3 centrarCar">
            <thead class="has-background-info">
                <tr class="tabla4">
                    <th>Número</th>
                    <th>Nombre de la sección</th>
                    <th>OPERACIÓN</th>
                </tr>
            </thead>
            <tr> 
                <td>$colum->idcategorias</td>
                <td>$colum->nombre_seccion</td>
                <td class='centrado'>
                    <button class='button' type='button' onclick="eliminar_categorias($colum->idcategorias)">ELIMINAR</button>
                    <button type="button" class="button is-link is-outlined"><a href="pagadmin.php">Recargar</a></button>
                </td>
            </tr>
        </table>
    </div>
_Consultar;
    echo '<br>';
    echo '<br>';
}


echo <<<_TRES
                <!--Pie de pagina-->
                <footer class="footer" id="piepag">
                    <div class="content has-text-centered">
                        <div class="columns is-gapless is-multiline is-mobile has-text-black">
                            <div class="column">Se brinda información de:</div>
                        </div>
                        <div class="columns is-mobile">
                            <div class="column is-1 is-offset-3 has-text-black">
                                <img src="imagenes/contacto.png" class="icon">
                                <p>Contacto:</p>
                            </div>
                            <div class="column is-4 is-offset-3 has-text-black">
                                <p>Azulema Portillo Laparra</p>
                            </div>
                        </div>
                        <div class="columns is-mobile">
                            <div class="column is-1 is-offset-3 has-text-black">
                                <img src="imagenes/telefono.jpg" class="icon">
                                <p>Telefono:</p>
                            </div>
                            <div class="column is-4 is-offset-3 has-text-black">
                                <p>983-211-1951</p>
                            </div>
                        </div>
                        <div class="columns is-mobile">
                            <div class="column is-1 is-offset-3 has-text-black">
                                <img src="imagenes/Gmail_icon-icons.com_75706.png" class="icon img-fluid" alt="Responsive image">
                                <p>Correo:</p>
                            </div>
                            <div class="column is-4 is-offset-3 has-text-black">
                                <p>portilloazulema@gmail.com</p>
                           </div>
                        </div>
                        <div class="columns is-gapless is-multiline is-mobile">
                            <div class="column has-text-black">Hecho en México.</div>
                        </div>
                        <div class="columns is-gapless is-multiline is-mobile">
                            <div class="column has-text-black">Carrera de Programación en la Preparatoria Centro de Bachillerato Tecnológico Industrial y de Servicios no.253 "Miguel Hidalgo y Costilla".</div>
                        </div>
                    </div>
                </footer>

                <!--Pie de pagina 2-->
                <footer class="footer" id="piepag2">
                    <div class="columns is-gapless is-multiline is-mobile">
                        <div class="column has-text-black">
                            <!--link de facebook-->
                            <a href="https://m.facebook.com/"><img src="imagenes/facebook.png" class="icon2"></a>
                        </div>
                        <div class="column has-text-black">
                            <!--link de Gmail-->
                           <a href="https://www.google.com/intl/es/gmail/about/"><img src="imagenes/Gmail_icon-icons.com_75706.png" class="icon2"></a>
                        </div>
                        <div class="column has-text-black">
                            <!--link de Instagram-->
                            <a href="https://www.instagram.com/"><img src="imagenes/logotipo-instagram_1045-436.jpg" class="icon2"></a>    
                        </div>
                        <div class="column has-text-black">
                            <!--link de Twitter-->
                            <a href="https://twitter.com/login?lang=es"><img src="imagenes/twitter.png" class="icon2"></a>
                        </div>
                        <div class="column has-text-black">
                            <!--link de spotify-->
                            <a href="https://www.spotify.com/pe/"><img src="imagenes/spot.png" class="icon2"></a>
                        </div>
                        <div class="column has-text-black">
                            <!--link de youtube-->
                            <a href="https://www.youtube.com/"><img src="imagenes/youtube.png" class="icon2"></a>
                        </div>
                    </div>
                </footer>
_TRES;
    echo <<<_CUATRO
    <script>
    function eliminar_registros(idregistros_totales) {
        var form = document.getElementById(idregistros_totales)
        axios.post('api/index.php/delete_registros/'+ idregistros_totales)
        .then(resp => {
            alert(`se eliminaron los datos`)
            console.log(resp)
        }).catch(error => {
            alert(`Los datos no se han podido eliminar`)
        });
    }

    function eliminar_categorias(idcategorias) {
        var form = document.getElementById(idcategorias)
        axios.post('api/index.php/delete_categorias/'+ idcategorias)
        .then(resp => {
            alert(`se eliminaron los datos`)
            console.log(resp)
        }).catch(error => {
            alert(`Los datos no se han podido eliminar`)
        });
    }

    function eliminar_direccion(iddireccion_cliente) {
        var form = document.getElementById(iddireccion_cliente)
        axios.post('api/index.php/delete_direccion/'+ iddireccion_cliente)
        .then(resp => {
            alert(`se eliminaron los datos`)
            console.log(resp)
        }).catch(error => {
            alert(`Los datos no se han podido eliminar`)
        });
    }

    function eliminar_producto(idproducto) {
        var form = document.getElementById(idproducto)
        axios.post('api/index.php/delete_producto/'+ idproducto)
        .then(resp => {
            alert(`se eliminaron los datos`)
            console.log(resp)
        }).catch(error => {
            alert(`Los datos no se han podido eliminar`)
        });
    }

    function eliminar_tamano(iddireccion_cliente) {
        var form = document.getElementById(iddireccion_cliente)
        axios.post('api/index.php/delete_tamano/'+ iddireccion_cliente)
        .then(resp => {
            alert(`se eliminaron los datos`)
            console.log(resp)
        }).catch(error => {
            alert(`Los datos no se han podido eliminar`)
        });
    }
    </script>
            </body>
        </html>
_CUATRO;

