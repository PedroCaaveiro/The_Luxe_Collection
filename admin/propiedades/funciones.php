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

    if (isset($_POST['eliminar'])) {
        borrar($db);
        exit();
    }

    $titulo = mysqli_real_escape_string($db, $_POST['titulo']);
    $precio =  mysqli_real_escape_string($db, $_POST['precio']);
    $descripcion =  mysqli_real_escape_string($db, $_POST['descripcion']);
    $habitaciones =  mysqli_real_escape_string($db, $_POST['habitaciones']);
    $wc =  mysqli_real_escape_string($db, $_POST['wc']);
    $estacionamiento =  mysqli_real_escape_string($db, $_POST['estacionamiento']);
    $vendedores_id = isset($_POST['vendedor']) ? mysqli_real_escape_string($db, $_POST['vendedor']) : null;

    $id = isset($_POST['id']) ? (int) $_POST['id'] : null;

    $creado = date('Y/m/d');

    $resultado = validarPropiedadYImagen($titulo, $precio, $descripcion, $habitaciones, $wc, $estacionamiento, $vendedores_id, $db);

if (!empty($resultado['errores'])) {
    $_SESSION['errores'] = $resultado['errores']; // Guardar los errores en la sesión
    header("Location: crear.php"); // Redirigir al formulario de creación
    exit;
} else {
    // No hay errores, obtenemos la imagen validada
    $imagen = $resultado['imagen']; // Obtener el nombre de la imagen validada
    
    // Si estamos creando una nueva propiedad, procesamos la imagen antes de guardar en la base de datos
    if (!$id) {
        // Si es creación, primero movemos la imagen
        $carpetaImagenes = '../../imagenes/';
        move_uploaded_file($_FILES['imagen']['tmp_name'], $carpetaImagenes . $imagen);
    }
    
    // Dependiendo de si el id existe, se hace la actualización o la creación
    if ($id) {
        // Si se está actualizando, llamamos a la función de actualización
        actualizar($db, $titulo, $precio, $imagen, $descripcion, $habitaciones, $wc, $estacionamiento, $vendedores_id, $id);
    } else {
        // Si se está creando, llamamos a la función de creación
        crear($db, $titulo, $precio, $imagen, $descripcion, $habitaciones, $wc, $estacionamiento, $creado, $vendedores_id);
    }
}

    
}


function validarPropiedadYImagen($titulo, $precio, $descripcion, $habitaciones, $wc, $estacionamiento, $vendedores_id, $db) {
    $errores = [];

    // Validación de campos de la propiedad
    if (empty($titulo)) {
        $errores[] = "Añadir el título";
    }

    if (empty($precio)) {
        $errores[] = "Añadir el precio";
    }

    if (empty($descripcion) || strlen($descripcion) < 50) {
        $errores[] = "Añadir la descripción, mínimo 50 caracteres";
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

    // Validación de la imagen (sin subirla aún)
    $imagen = null;

    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $imagen_size = $_FILES['imagen']['size'];
        $medida = 1000 * 1000; // 1 MB

        if ($imagen_size > $medida) {
            $errores[] = "La imagen es demasiado grande";
        }

        // Si no hay errores, solo generamos el nombre de la imagen (pero aún no la guardamos)
        if (empty($errores)) {
            $imagen = md5(uniqid(rand(), true)) . ".jpg";
        }
    } else {
        $errores[] = "Añadir una imagen válida";
    }

    return ['errores' => $errores, 'imagen' => $imagen];
}


function crear($db, $titulo, $precio, $imagen, $descripcion, $habitaciones, $wc, $estacionamiento, $creado, $vendedores_id){



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

function crearCarpeta($imagen, $db) {
    $carpetaImagenes = '../../imagenes/';

    // Asegurarse de que la consulta de propiedades se ejecutó antes
    if (!isset($_SESSION['resultadoPropiedad']) || empty($_SESSION['resultadoPropiedad'])) {
        return null; // No se encontró la propiedad
    }

    $propiedad = $_SESSION['resultadoPropiedad'];
    $id = $propiedad['id']; // Obtener el ID desde la sesión

    if (!empty($propiedad['imagen'])) {
        $imagenAnterior = $carpetaImagenes . $propiedad['imagen'];

        // Si la imagen existe, eliminarla
        if (file_exists($imagenAnterior)) {
            unlink($imagenAnterior);
        }
    }

    // Subir la nueva imagen
    $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
    move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);

    // Actualizar la base de datos con la nueva imagen
    $sqlUpdate = "UPDATE propiedades SET imagen = '$nombreImagen' WHERE id = $id";
    mysqli_query($db, $sqlUpdate);

    return $nombreImagen;
}



function consultarVendedor($db){

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

function actualizar($db, $titulo, $precio, $imagen, $descripcion, $habitaciones, $wc, $estacionamiento, $vendedores_id, $id) {
    // Sanitización de datos
    $titulo = mysqli_real_escape_string($db, $titulo);
    $precio = (float) $precio;
    $descripcion = mysqli_real_escape_string($db, $descripcion);
    $habitaciones = (int) $habitaciones;
    $wc = (int) $wc;
    $estacionamiento = (int) $estacionamiento;
    $vendedores_id = (int) $vendedores_id;

    // Si se subió una nueva imagen, manejar la actualización
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $imagen = crearCarpeta($_FILES['imagen'], $db); // Pasar el arreglo $_FILES['imagen']
    }

    // Consulta SQL de actualización
    $query = "UPDATE propiedades 
        SET titulo = '$titulo',
            precio = $precio,
            descripcion = '$descripcion',
            habitaciones = $habitaciones,
            wc = $wc,
            estacionamiento = $estacionamiento,
            vendedores_id = $vendedores_id";

    // Si hay una imagen nueva, actualizar el campo imagen
    if ($imagen) {
        $query .= ", imagen = '$imagen'";
    }

    $query .= " WHERE id = $id";

    // Ejecutar la consulta
    $resultado = mysqli_query($db, $query);

    if ($resultado) {
        header("Location: actualizar.php?id=" . $id);
        exit();
    } else {
        echo "Error al actualizar la propiedad: " . mysqli_error($db);
    }
}

function borrar($db){
    if (isset($_POST['eliminar'])) {
        $id = $_POST['id'];
    }
        $id = (int) $id;

        // Primero, obtenemos la ruta de la imagen antes de borrar el registro
        $rutaImagen = obtenerRutaImagen($id, $db);


        $query = "DELETE FROM propiedades WHERE id = $id";

        $resultado = mysqli_query($db, $query);

        if ($resultado) {
            borrarCarpeta($rutaImagen);
            header("Location: ../index.php");

            exit();
        } else {
            echo "error al eliminar la propiedad" . mysqli_error($db);
        }


}

// Función para obtener la ruta de la imagen antes de eliminar el registro
function obtenerRutaImagen($id, $db) {
    $query = "SELECT imagen FROM propiedades WHERE id = $id";
    $resultado = mysqli_query($db, $query);
    if ($resultado) {
        $fila = mysqli_fetch_assoc($resultado);
        return '../../imagenes/' . $fila['imagen']; // Ajusta la ruta según tu estructura
    }
    return null;
}


// Función para eliminar la imagen del servidor
function borrarCarpeta($rutaImagen) {
    if (!empty($rutaImagen) && file_exists($rutaImagen)) {
        unlink($rutaImagen);
    }
}
