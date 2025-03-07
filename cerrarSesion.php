
<?php
session_start();


$_SESSION = [];
session_destroy();


// Elimina la cookie de sesión si existe
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 3600, '/');
}

header('Location: /index.php');
exit;
?>