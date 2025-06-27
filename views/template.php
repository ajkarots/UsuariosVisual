<?php

include(__DIR__ . '/../funciones/conexion.php');
session_start();

if (!isset($_SESSION['usuario'])) {
    $id = null;
    session_destroy();
} else {
    $id = $_SESSION['usuario'];
    $sql = "SELECT * FROM usuarios WHERE ID_USU = '$id'";
    $result = mysqli_query($con, $sql);
    $usuario = mysqli_fetch_assoc($result);
    mysqli_close($con);
}


$action   = $_GET['action'] ?? 'inicio';
$esLogin  = in_array($action, ['login','login.php']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles/variables.css">
  <link rel="stylesheet" href="styles/admin.css">
    
    <link rel="stylesheet" href="styles/normalice.css">
  <title>Usuarios</title>


</head>
<body>

<?php if (! $esLogin): ?>
  <!-- Header con Banner -->
  <header class="site-header">
    <img src="images/banner.jpg"
         alt="Banner UTA"
         class="site-header__img">
  </header>

  <!-- Barra de navegación -->
  <nav class="site-nav">
    <ul class="site-nav__list">
      <?php if ($id): ?>
        <li><a href="index.php?action=admin">Servicios</a></li>
      <?php endif; ?>
      <li><a href="index.php?action=inicio">Inicio</a></li>
      <li><a href="index.php?action=nosotros">Nosotros</a></li>
      <li><a href="index.php?action=contactanos">Contáctanos</a></li>
      <?php if (! $id): ?>
        <li><a href="index.php?action=login">Ingresa</a></li>
      <?php else: ?>
        <li><a href="funciones/salir.php">Salir</a></li>
      <?php endif; ?>
    </ul>
    <?php if ($id): ?>
      <div class="site-nav__user">
        
       <h3> <?= htmlspecialchars($usuario['ROL_USU'], ENT_QUOTES, 'UTF-8') ?>   : <?= htmlspecialchars($usuario['NOM_USU'], ENT_QUOTES, 'UTF-8') ?>
        </h3>
       
      </div>
    <?php endif; ?>
  </nav>
<?php endif; ?>

<!-- Contenedor principal donde carga MVC -->
<main class="site-main">
  <section class="content">
    <?php
      $mvc = new MVcontroller();
      $mvc->enlacesPaginasController();
    ?>
  </section>
</main>

</body>
</html>
