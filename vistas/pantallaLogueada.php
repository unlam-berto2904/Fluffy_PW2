<!DOCTYPE html>
<?php
require ('../clases/UsuarioClass.php');
// require ('../clases/ConnQuery.php');

session_start();
if (isset($_SESSION["usuario"])) {
  $id_usuario = $_SESSION["usuario"];
  $experiencias_usuario = $_SESSION['experiencias'];
}
else {
  session_destroy();
  header("location: ../index.php");
}
?>
<html>
  <head>
    <meta charset="utf-8">
    <script src="../librerias/jquery-3.1.1.js" charset="utf-8" type="text/javascript"></script>
    <script src="../js/home.js" charset="utf-8" type="text/javascript"></script>
    <title></title>
  </head>
  <body>
    HOLAAAA SOY UNA PANTALLA LOGUEADA
    <!-- <input type="button" name="" value="mostrarHistorias" onclick="mostrarUltimasHistorias()"> -->
    <?php
    foreach ($experiencias_usuario as $experiencia => $exp) {
      echo $exp['id'];
      echo $exp['comentario'].'<br />';
    }
    ?>
  </body>
</html>
