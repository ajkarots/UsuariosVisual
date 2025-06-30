
  <section class="editar">
  <?php
    include(__DIR__ . '/../funciones/conexion.php');
    $ced = $_GET['ced'];
    $sql = "SELECT * FROM `estudiantes` WHERE `CED_EST` = '$ced'";
    $result = mysqli_query($con, $sql);
    $usuario = $result->fetch_assoc();
    mysqli_close($con);
  ?>
  <div class="editar__header">
    <h2 class="editar__username"><?= htmlspecialchars($usuario['CED_EST']) ?></h2>
    <h3 class="editar__title">Editar Estudiante</h3>
  </div>

  <form class="form_editar" action="./funciones/editar_estudiante_sql.php" method="POST" id="formulario_editar">
    <div class="form_group">
      <label for="NOM_EST">Nombre de usuario</label>
      <input 
        class="cuadro_editar" 
        type="text" 
        id="NOM_EST" 
        name="NOM_EST" 
        value="<?= htmlspecialchars($usuario['NOM_EST']) ?>"
        required
      >
    </div>

    <div class="form_group">
      <label for="APE_EST">Contraseña</label>
      <input 
        class="cuadro_editar" 
        type="text" 
        id="APE_EST" 
        name="APE_EST" 
        value="<?= htmlspecialchars($usuario['APE_EST']) ?>"
        required
      >
    </div>

    <div class="form_group">
      <label for="TEL_EST">Telefono</label>
        <input 
        class="cuadro_editar" 
        type="text" 
        id="TEL_EST" 
        name="TEL_EST" 
        value="<?= htmlspecialchars($usuario['TEL_EST']) ?>"
        required
        maxlength="10"
      >
    </div>

        <div class="form_group">
      <label for="c">Direccion</label>
        <input 
        class="cuadro_editar" 
        type="text" 
        id="DIR_EST" 
        name="DIR_EST" 
        value="<?= htmlspecialchars($usuario['DIR_EST']) ?>"
        required
      >
    </div>

    <input type="hidden" name="ced" value="<?= $ced ?>">

    <div class="form_actions">
      <button type="submit" class="btn_sql">Guardar</button>
      <a href="index.php?action=admin" class="btn_sql btn_secondary">Cancelar</a>
    </div>
  </form>
</section>

