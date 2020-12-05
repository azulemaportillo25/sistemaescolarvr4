<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Illuminate\Database\Capsule\Manager as DB;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../config/database.php';

// Instantiate app
$app = AppFactory::create();
$app->setBasePath("/artesaniasmaderavol4/api/index.php");

// Add Error Handling Middleware
$app->addErrorMiddleware(true, false, false);

// Add route callbacks
$app->get('/', function (Request $request, Response $response, array $args) {
    $response->getBody()->write('Hello World');
    return $response;
});
//para los usuarios
$app->post('/login/{usuario}', function (Request $request, Response $response, array $args) {

    $data = json_decode($request->getBody()->getContents(), false);
    
    $user = DB::table('usuarios')
    ->leftJoin('perfiles', 'usuarios.idperfil', '=', 'perfiles.idperfil')
    ->where('usuarios.nombreusuario', $args['usuario'])
    ->first();

    //para crear un objeto
    $mens = new stdClass();
    //hace una comparacion con lo que se escribio en el formulario(index.html) y entre la base de datos
    if ($user->password == $data->password){
        $mens->aceptar = true;
        $mens->nombreperfil = $user->nombreperfil;
        $mens->idusuario = $user->idusuarios;
    }
    else{
        $mens->aceptar = false;
    }

    
    $response->getBody()->write(json_encode($mens));
    return $response;
});

//para insertar datos del cliente
$app->post('/insertarpersonas', function (Request $request, Response $response, array $args) {

    $data = json_decode($request->getBody()->getContents(), false);

    $id = DB::table('registros_totales')->insertGetId([
        'nombre' => $data->nombre,
        'apellido' => $data->apellido,
        'nombres_de_usuarios' => $data->nombres_de_usuarios,
        'password' => $data->password,
        'edad' => $data->edad,
        'correo' => $data->correo,
    ]);
    $msga = 'Se ingresaron los datos correctamente';

    $response->getBody()->write(json_encode($msga));
    return $response;
});
//para las categorias
$app->post('/insertarcategoria', function (Request $request, Response $response, array $args) {

    $data = json_decode($request->getBody()->getContents(), false);

    $id = DB::table('categorias')->insertGetId([
        'nombre_seccion' => $data->nombre_seccion,
    ]);
    $msg = 'Se ingresaron los datos correctamente';

    $response->getBody()->write(json_encode($msg));
    return $response;
});

//para los nombre de productos
$app->post('/insertarproducto', function (Request $request, Response $response, array $args) {

    $data = json_decode($request->getBody()->getContents(), false);

    $producto = DB::table('producto')->insert([
        'nombre_producto' => $data->nombre_producto,
    ]);
    $mesg = 'Se ingresaron los datos correctamente';

    $response->getBody()->write(json_encode($mesg));
    return $response;
});
//para los tamaños
$app->post('/insertartamano', function (Request $request, Response $response, array $args) {

    $data = json_decode($request->getBody()->getContents(), false);

    $id = DB::table('tipo_tamano')->insertGetId([
        'nombre_tamano' => $data->nombre_tamano,
    ]);
    $msg = 'Se ingresaron los datos correctamente';

    $response->getBody()->write(json_encode($msg));
    return $response;
});
//para las direcciones del cliente
$app->post('/insertardireccioncliente', function (Request $request, Response $response, array $args) {

    $data = json_decode($request->getBody()->getContents(), false);

    $id = DB::table('direccion_cliente')->insertGetId([
        'domicilio' => $data->domicilio,
        'numero_casa' => $data->numero_casa,
        'estado' => $data->estado,
    ]);
    $msg = 'Se ingresaron los datos correctamente';

    $response->getBody()->write(json_encode($msg));
    return $response;
});

//eliminar registros
$app->post('/delete_registros/{idregistrostotales}', function (Request $request, Response $response, array $args) {

    $data = json_decode($request->getBody()->getContents(), false);
    DB::table('registros_totales')->where('idregistros_totales', $args['idregistrostotales'])->delete();
    $msg = 'Se elimino exitosamente';

    $response->getBody()->write(json_encode($msg));
    return $response;
});

//eliminar categorias
$app->post('/delete_categorias/{id_categorias}', function (Request $request, Response $response, array $args) {

    $data = json_decode($request->getBody()->getContents(), false);
    DB::table('categorias')->where('idcategorias', $args['id_categorias'])->delete();
    $msg = 'Se elimino exitosamente';

    $response->getBody()->write(json_encode($msg));
    return $response;
});

//eliminar direccion
$app->post('/delete_direccion/{iddireccioncliente}', function (Request $request, Response $response, array $args) {

    $data = json_decode($request->getBody()->getContents(), false);
    DB::table('direccion_cliente')->where('iddireccion_cliente', $args['iddireccioncliente'])->delete();
    $msg = 'Se elimino exitosamente';

    $response->getBody()->write(json_encode($msg));
    return $response;
});

//eliminar productos
$app->post('/delete_producto/{id_producto}', function (Request $request, Response $response, array $args) {

    $data = json_decode($request->getBody()->getContents(), false);
    DB::table('producto')->where('idproducto', $args['id_producto'])->delete();
    $msg = 'Se elimino exitosamente';

    $response->getBody()->write(json_encode($msg));
    return $response;
});

//eliminar tamaños
$app->post('/delete_tamano/{idtipotamano}', function (Request $request, Response $response, array $args) {

    $data = json_decode($request->getBody()->getContents(), false);
    DB::table('tipo_tamano')->where('idtipo_tamano', $args['idtipotamano'])->delete();
    $msg = 'Se elimino exitosamente';

    $response->getBody()->write(json_encode($msg));
    return $response;
});

// Run application
$app->run();