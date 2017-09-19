<?php

session_start();
session_unset($_SESSION['cbTipo_usuario']);
session_unset($_SESSION['usuario']);
session_unset($_SESSION['clave']);
session_destroy();
header("location: index.php");
exit;
?>
