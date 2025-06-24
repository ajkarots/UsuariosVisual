<?php
$action = $_GET['action'] ?? 'inicio';
$esLogin = ($action === 'login' || $action === 'login.php');
$esAdmin = ($action === 'admin' || $action === 'admin.php');
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car by</title>

    <link rel="stylesheet" href="./styles/normalice.css">
    <link rel="stylesheet" href="./styles/estilos.css">
</head>

<body>
    <?php if (!$esLogin): ?>
        <?php
        include(__DIR__ . '/../funciones/conexion.php');
        session_start();
        if (!isset($_SESSION['usuario'])) {
            $id= null;
            session_destroy();
        
        }else{
        $id = $_SESSION['usuario'];
        $sql = "SELECT * FROM usuarios WHERE ID_USU = '$id'";
        $result = mysqli_query($con, $sql);
        $usuario = $result->fetch_assoc();
        mysqli_close($con);}
        ?>
        <header class="hero">
            <nav class="nav container">
                <div class="nav_logo">
                    <h3 class="nav_title">
                        Fisei Car
                    </h3>
                </div>
                <ul class="nav_link nav_link--menu">
                    <?php if($id!=null){?>
                        <li class="nav_items">
                            <a href="index.php?action=admin" class="nav_links">Admin</a>
                        </li>
                    <?php }?>
                    <?php if ($id != null) { ?>
                        <li class="nav_items">
                            <a href="index.php?action=inicio" class="nav_links">Inicio </a>
                        </li> <?php } ?>
                    <?php if ($id == null) { ?>
                        <li class="nav_items">
                            <a href="index.php?action=login" class="nav_links">ingresa </a>
                        </li> <?php } ?>
                    <?php if($id != null){?>
                            <a href="funciones/salir.php" class="nav_links">Salir </a>
                       <?php }?> 
                </ul>
                <?php if($id!=null){ ?>
                <a href="" class="usuario"><?php echo $usuario['NOM_USU'] ?></a>
                <?php } ?>
            </nav>

        </header>
    <?php endif; ?>
    <main>
        <section>
            <?php
            $mvc = new MVcontroller();
            $mvc->enlacesPaginasController();
            ?>
        </section>
        <?php if (!$esLogin && !$esAdmin): ?>
            <section class="knowledge">
                <div class="knowledge_container container">
                    <div class="knowledge_text">
                        <h2>¡No experes más, comienza tu viaje!</h2>
                        <p class="knowledge_paragraph">¡Embarcate en la mejor aventura sobre ruedas!</p>
                        <a href="./catalogo.php" class="cta">Renta tu coche</a>
                    </div>
                    <figure class="knowledge_picture">
                        <img src="./Imagenes/bmw.png" class="knowledge_img">
                    </figure>
                </div>
            </section>
        <?php endif; ?>

        <?php if ($esAdmin): ?>
            <section class="knowledge">
                <div class="knowledge_container container">
                    <div class="knowledge_text">
                        <h1>Pagina de administracion</h1>
                    </div>
                    <figure class="knowledge_picture">
                        <img src="./Imagenes/admin.png" class="knowledge_picture_admin">
                    </figure>
                </div>
            </section>
    </main>

<?php endif; ?>
</body>

</html>