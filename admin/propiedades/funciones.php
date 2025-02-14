<?php
session_start();



require_once '../../includes/config/database.php';



$db = conectarDb();

$errores = [];



if ($_SERVER['REQUEST_METHOD']=== 'POST') {
    
    $titulo = $_POST['titulo'];
    $precio = $_POST['precio'];
    $imagen = $_FILES['imagen'];
    $descripcion = $_POST['descripcion'];
    $habitaciones = $_POST['habitaciones'];
    $wc = $_POST['wc'];
    $estacionamiento = $_POST['estacionamiento'];
    $vendedores_id = $_POST['vendedor'];

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
    

    if (!empty($errores)) {
        $_SESSION['errores'] = $errores; // Guardar los errores en la sesión
        header("Location: crear.php");
        exit;
        
    }else{
        crear($db,$titulo , $precio, $imagen, $descripcion, $habitaciones,$wc, $estacionamiento,$vendedores_id);
    }
   
    



}



function crear($db, $titulo , $precio, $imagen, $descripcion, $habitaciones,$wc, $estacionamiento,$vendedores_id){

   

    $query = "INSERT INTO propiedades (titulo, precio, imagen, descripcion, habitaciones, wc, estacionamiento, vendedores_id) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";


$stmt = mysqli_prepare($db, $query);

 // Verificamos si la preparación fue exitosa
 if ($stmt === false) {
    echo "Error en la preparación de la consulta: " . mysqli_error($db);
    return;
}
mysqli_stmt_bind_param($stmt, "sdssiiii", $titulo, $precio, $imagen, $descripcion, $habitaciones, $wc, $estacionamiento, $vendedores_id);

$resultado = mysqli_stmt_execute($stmt);

 // Verificamos si la inserción fue exitosa
 if ($resultado) {
    header("location: crear.php?mensaje=exito");
    exit();
} else {
    echo "Error al crear la propiedad: " . mysqli_error($db);
}

// Cerramos la consulta preparada
mysqli_stmt_close($stmt);

}

function actualizar(){

}


function borrar(){


}


?>
