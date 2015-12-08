<?php
$asunto = $_POST['asunto'];
$mensaje = $_POST['mensaje'];
mail("adrian.trik@hotmail.com",$asunto,$mensaje);
header("location: ../../index.php");
?>
