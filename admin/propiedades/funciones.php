<?php
session_start();





require_once __DIR__ . '/../../includes/config/database.php';



$db = conectarDb();

$titulo = '';
$precio = '';
$imagen = '';
$descripcion = '';
$habitaciones = '';
$wc = '';
$estacionamiento = '';
$vendedores_id = '';





$errores = [];



if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {

    $titulo = mysqli_real_escape_string($db, $_POST['titulo']);
    $precio =  mysqli_real_escape_string($db, $_POST['precio']);
    $descripcion =  mysqli_real_escape_string($db, $_POST['descripcion']);
    $habitaciones =  mysqli_real_escape_string($db, $_POST['habitaciones']);
    $wc =  mysqli_real_escape_string($db, $_POST['wc']);
    $estacionamiento =  mysqli_real_escape_string($db, $_POST['estacionamiento']);
    $vendedores_id = isset($_POST['vendedor']) ? mysqli_real_escape_string($db, $_POST['vendedor']) : null;

    $id = isset($_POST['id']) ? (int) $_POST['id'] : null;

    $creado = date('Y/m/d');

    if (empty($titulo)) {
        $errores[] = "Añadir el titulo";
    }

    if (empty($precio)) {
        $errores[] = "Añadir el precio";
    }

    if (empty($descripcion) || strlen($descripcion) < 50) {
        $errores[] = "Añadir la descripcion, mínimo 50 caracteres";
    }

    if (empty($habitaciones)) {
        $errores[] = "Añadir el Nº de habitaciones";
    }

    if (empty($wc)) {
        $errores[] = "Añadir el Nº de baños";
    }

    if (empty($estacionamiento)) {
        $errores[] = "Añadir el Nº de Estacionamientos";
    }

    if (empty($vendedores_id)) {
        $errores[] = "Añadir el vendedor";
    }

    // Verificar si hay errores en la subida de la imagen
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $imagen = $_FILES['imagen']['name'];
        $imagen_temp = $_FILES['imagen']['tmp_name'];
        $imagen_size = $_FILES['imagen']['size'];
        $imagen = crearCarpeta($_FILES['imagen']);

        // Validación de tamaño de la imagen
        $medida = 1000 * 1000; // 1 mb
        if ($imagen_size > $medida) {
            $errores[] = "La imagen es demasiado grande";
        }

        // Limpieza del nombre del archivo
        $imagen = mysqli_real_escape_string($db, $imagen);
    } else {
        $errores[] = "Añadir una imagen válida";
        $imagen = null;
    }


    if (!empty($errores)) {
        $_SESSION['errores'] = $errores; // Guardar los errores en la sesión
        header("Location: crear.php");
        exit;
    } else {

        crearCarpeta($_FILES['imagen']);


       if ($id) {
        actualizar($db, $titulo, $precio, $imagen, $descripcion, $habitaciones, $wc, $estacionamiento, $vendedores_id, $id);
       }else{
        
        crear($db, $titulo, $precio, $imagen, $descripcion, $habitaciones, $wc, $estacionamiento, $creado, $vendedores_id);
       }
        
        
    }
}
// cambios

function crearCarpeta($imagen)
{
    $carpetaImagenes = '../../imagenes/';
    if (!is_dir($carpetaImagenes)) {
        mkdir($carpetaImagenes);
    }

    $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

    move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);

    return $nombreImagen;
}

function consultarVendedor($db)
{

    $consulta = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db, $consulta);

    $vendedores = [];
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $vendedores[] = $fila;
    }



    // Guardar el array en la sesión
    $_SESSION['vendedores'] = $vendedores;
}
consultarVendedor($db);


function crear($db, $titulo, $precio, $imagen, $descripcion, $habitaciones, $wc, $estacionamiento, $creado, $vendedores_id)

{



    $query = "INSERT INTO propiedades (titulo, precio, imagen, descripcion, habitaciones, wc, estacionamiento,creado, vendedores_id) 
    VALUES (?, ?, ?, ?, ?, ?, ?,?, ?)";


    $stmt = mysqli_prepare($db, $query);

    // Verificamos si la preparación fue exitosa
    if ($stmt === false) {
        echo "Error en la preparación de la consulta: " . mysqli_error($db);
        return;
    }
    mysqli_stmt_bind_param($stmt, "sdssiiiss", $titulo, $precio, $imagen, $descripcion, $habitaciones, $wc, $estacionamiento, $creado, $vendedores_id);

    $resultado = mysqli_stmt_execute($stmt);

    // Verificamos si la inserción fue exitosa
    if ($resultado) {
        header("location: crear.php?mensaje=exito");
        exit();
    } else {
        echo "Error al crear la propiedad: " . mysqli_error($db);
    }

    // Cierro la consulta preparada
    mysqli_stmt_close($stmt);
}

function mostrarResultados($db) {
    $query = 'SELECT * FROM propiedades';
    $resultado = mysqli_query($db, $query);

    if (!$resultado) {
        die("Error en la consulta: " . mysqli_error($db));
    }

    $propiedades = [];
    while ($propiedad = mysqli_fetch_assoc($resultado)) {
        $propiedades[] = $propiedad; // Almacenar cada propiedad en un array
    }

    mysqli_free_result($resultado); // Liberar memoria
    $_SESSION['propiedades'] = $propiedades; // Devolver el array con los datos

  
}
mostrarResultados($db);


function consultaPropiedades($db){

    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
        return null; // Retorna null si no hay un ID válido
    }

    $id = (int) $_GET['id'];

  $consulta = "SELECT * FROM propiedades where id = $id";
$resultado = mysqli_query($db,$consulta);
$resultadoPropiedad = mysqli_fetch_assoc($resultado);

$_SESSION['resultadoPropiedad'] = $resultadoPropiedad;



}

consultaPropiedades($db);


function actualizar($db, $titulo, $precio, $imagen, $descripcion, $habitaciones, $wc, $estacionamiento, $vendedores_id, $id)
{
    $titulo = mysqli_real_escape_string($db, $titulo);
    $precio = (float) $precio;
    $descripcion = mysqli_real_escape_string($db, $descripcion);
    $habitaciones = (int) $habitaciones;
    $wc = (int) $wc;
    $estacionamiento = (int) $estacionamiento;
    $vendedores_id = (int) $vendedores_id;

    $query = "UPDATE propiedades 
        SET titulo = '$titulo',
            precio = $precio,
            descripcion = '$descripcion',
            habitaciones = $habitaciones,
            wc = $wc,
            estacionamiento = $estacionamiento,
            vendedores_id = $vendedores_id  
        WHERE id = $id";

    // Ejecutar la consulta
    $resultado = mysqli_query($db, $query);

    if ($resultado) {
        header("Location: actualizar.php?id=" . $id);
        exit();
    } else {
        echo "Error al actualizar la propiedad: " . mysqli_error($db);
    }
}




function borrar() {}
