<?php

// Inicio la sesión si no está iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


// Incluyo el archivo de configuración para conectar con la base de datos
require_once __DIR__ . '/../../includes/config/database.php';


// Conecto a la base de datos
$db = conectarDb();

// Defino variables vacías para almacenar los datos del formulario
$titulo = '';
$precio = '';
$imagen = '';
$descripcion = '';
$habitaciones = '';
$wc = '';
$estacionamiento = '';
$vendedores_id = '';

$errores = [];


// Verifico si se ha enviado el formulario mediante POST
if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    // Primero verificamos si es una acción de eliminación
    if (isset($_POST['eliminar'])) {
        borrar($db);
        exit();
    }

    // Validación de login: si el email y la contraseña no son correctos, se guardan los errores y se redirige
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $erroresLogin = validarUsuario($db, $_POST['email'], $_POST['password']);
        if (!empty($erroresLogin)) {
            $_SESSION['erroresLogin'] = $erroresLogin; 
            // Redirijo al login si hay errores
            header("Location: ../../login.php"); 
            exit;
        }
    }

     // Solo valido la propiedad si no hubo errores de login
    if (empty($erroresLogin)) {
        $erroresPropiedad = [];
         // Sanitizo los datos antes de guardarlos en la base de datos
        $titulo = mysqli_real_escape_string($db, $_POST['titulo']);
        $precio =  mysqli_real_escape_string($db, $_POST['precio']);
        $descripcion =  mysqli_real_escape_string($db, $_POST['descripcion']);
        $habitaciones =  mysqli_real_escape_string($db, $_POST['habitaciones']);
        $wc =  mysqli_real_escape_string($db, $_POST['wc']);
        $estacionamiento =  mysqli_real_escape_string($db, $_POST['estacionamiento']);
        $vendedores_id = isset($_POST['vendedor']) ? mysqli_real_escape_string($db, $_POST['vendedor']) : null;

        $id = isset($_POST['id']) ? (int) $_POST['id'] : null;
        // Genero la fecha actual
        $creado = date('Y/m/d');

        // Valido los datos de la propiedad y la imagen
        $resultado = validarPropiedadYImagen($titulo, $precio, $descripcion, $habitaciones, $wc, $estacionamiento, $vendedores_id, $db);
        $erroresPropiedad = $resultado['errores'];

        if (!empty($erroresPropiedad)) {
            $_SESSION['erroresPropiedad'] = $erroresPropiedad;
            // Redirijo a la página de creación si hay errores 
            header("Location: crear.php"); 
            exit;
        } else {
            $imagen = $resultado['imagen']; 
  // Si no hay ID, muevo la imagen a la carpeta de imágenes
            if (!$id) {
                $carpetaImagenes = '../../imagenes/';
                move_uploaded_file($_FILES['imagen']['tmp_name'], $carpetaImagenes . $imagen);
            }
 // Si hay ID, actualizo la propiedad; si no, la creo
            if ($id) {
                actualizar($db, $titulo, $precio, $imagen, $descripcion, $habitaciones, $wc, $estacionamiento, $vendedores_id, $id);
            } else {
                crear($db, $titulo, $precio, $imagen, $descripcion, $habitaciones, $wc, $estacionamiento, $creado, $vendedores_id);
            }
        }
    }
}


function validarUsuario($db,$email,$password){

    $errores = [];
  // Valido el email
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    if (!$email) {
        $errores[] = 'El email es obligatorio o no es válido';
    }

    if (!$password) {
        $errores[] = 'El password es obligatorio';
    }
  // Consulto en la base de datos si el usuario existe
    if (empty($errores)) {
        $query = "SELECT * FROM usuarios WHERE email = ?";
        $stmt = mysqli_prepare($db, $query);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $resultado = mysqli_stmt_get_result($stmt);

        if ($resultado && $resultado->num_rows > 0) {
            $usuario = mysqli_fetch_assoc($resultado);
            // Verifico la contraseña con hash
            if (password_verify($password, $usuario['password'])) {
                session_start();
                $_SESSION['usuario'] = $usuario['email'];
                $_SESSION['login'] = true;
                header("Location: ../index.php"); 
                exit;
            } else {
                $errores[] = 'El password es incorrecto';
            }
        } else {
            $errores[] = "El usuario no existe";
        }
    }

     // Guardao los errores en la sesión si los hay
     if (!empty($errores)) {
        session_start();  // Inicio la sesión si aún no se ha hecho
        $_SESSION['erroresLogin'] = $errores;
    }
    
    return $errores; // Devuelve los errores para mostrarlos en el formulario
}
function verificarUsuario() {
    // Verifico si la sesión ya está iniciada antes de llamarla
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    // Verifico si el usuario está logueado
    if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
        return true;  // Usuario está logueado
    }
    
    return false;  // Usuario no está logueado
}




function validarPropiedadYImagen($titulo, $precio, $descripcion, $habitaciones, $wc, $estacionamiento, $vendedores_id, $db) {
    $errores = [];

    // Valido los campos de la propiedad
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

    // Valido la imagen (sin subirla aún)
    $imagen = null;

    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $imagen_size = $_FILES['imagen']['size'];
        $medida = 1000 * 1000; // 1 MB

        if ($imagen_size > $medida) {
            $errores[] = "La imagen es demasiado grande";
        }

        // Si no hay errores, solo genera el nombre de la imagen (pero aún no la guarda)
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

    // Verifico si la preparación fue exitosa
    if ($stmt === false) {
        echo "Error en la preparación de la consulta: " . mysqli_error($db);
        return;
    }
    mysqli_stmt_bind_param($stmt, "sdssiiiss", $titulo, $precio, $imagen, $descripcion, $habitaciones, $wc, $estacionamiento, $creado, $vendedores_id);

    $resultado = mysqli_stmt_execute($stmt);

    // Verifico si la inserción fue exitosa
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

    // confirmo de que la consulta de propiedades se ejecutó antes
    if (!isset($_SESSION['resultadoPropiedad']) || empty($_SESSION['resultadoPropiedad'])) {
        return null; // No se encontró la propiedad
    }

    $propiedad = $_SESSION['resultadoPropiedad'];
    $id = $propiedad['id']; // Obtengo el ID desde la sesión

    if (!empty($propiedad['imagen'])) {
        $imagenAnterior = $carpetaImagenes . $propiedad['imagen'];

        // Si la imagen existe, la elimina
        if (file_exists($imagenAnterior)) {
            unlink($imagenAnterior);
        }
    }

    // Sube la nueva imagen
    $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
    move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);

    // consulta para actualizar la base de datos con la nueva imagen
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
        $propiedades[] = $propiedad; // Almacena cada propiedad en un array
    }

    mysqli_free_result($resultado); // Libera memoria
    $_SESSION['propiedades'] = $propiedades; // Devuelve el array con los datos

  
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

    // Si se subió una nueva imagen, maneja la actualización
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $imagen = crearCarpeta($_FILES['imagen'], $db); 
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

    // Si hay una imagen nueva, actualiza el campo imagen
    if ($imagen) {
        $query .= ", imagen = '$imagen'";
    }

    $query .= " WHERE id = $id";

    // Ejecuta la consulta
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
