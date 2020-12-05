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
                    <button type="button" class="button is-danger is-outlined" onclick="Despedida()"><a href="paginainicial.php">Regresar a la Página principal</a></button>
                    <button type="button" class="button is-link is-outlined"><a href="Secciones.html">Regresar a pedir Productos</a></button>
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
                    <th>Nombre del cliente</th>
                    <th>Apellido del cliente</th>
                    <th>Nombre de usuario del cliente</th>
                    <th>Edad delcliente</th>
                    <th>Correo del cliente</th>
                </tr>
            </thead>
            <tr> 
                <td>$colum->nombre</td>
                <td>$colum->apellido</td>
                <td>$colum->nombres_de_usuarios</td>
                <td>$colum->edad</td>
                <td>$colum->correo</td>
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
                    <th>Domicilio</th>
                    <th>Numero de casa</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tr> 
                <td>$colum->domicilio</td>
                <td>$colum->numero_casa</td>
                <td>$colum->estado</td>
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
                <tr class="tabla4">
                    <th>Número</th>
                    <th>Nombre del producto</th>
                </tr>
            </thead>
            <tr> 
                <td>$colum->idproducto</td>
                <td>$colum->nombre_producto</td>
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
                </tr>
            </thead>
            <tr> 
                <td>$colum->idtipo_tamano</td>
                <td>$colum->nombre_tamano</td>
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
                </tr>
            </thead>
            <tr> 
                <td>$colum->idcategorias</td>
                <td>$colum->nombre_seccion</td>
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
                    function Despedida (){
                       alert(`Gracias por comprar`)
                  }
                </script>
            </body>
        </html>
_CUATRO;

