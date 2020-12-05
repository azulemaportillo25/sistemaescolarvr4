<?php
use Illuminate\Database\Capsule\Manager as DB;

require 'vendor/autoload.php';
require 'config/database.php'; //donde se encuentra la base de datos

DB::table('registros_totales')->where('idregistros_totales', $_GET['id'])->delete();

echo "Se elimino con el id: {$_GET['id']}
<a class='button' href='pagadmin.php'>REGRESAR</a>";