<?php
require('../config/database.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener el ID del usuario a eliminar
    $userId = $_POST['userId'];
    // Consulta SQL para eliminar el usuario
    $query = "DELETE FROM users WHERE id = $userId";
    // Ejecutar la consulta
    $result = pg_query($conn, $query);
    if ($result) {
        // Redirigir a la página principal después de eliminar
        header("Location: list_users.php");
        exit();
    } else {
        echo "Error al eliminar el usuario";
    }
}
?>