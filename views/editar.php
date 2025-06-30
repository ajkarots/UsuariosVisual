<section class="editar">
  <?php
    include(__DIR__ . '/../funciones/conexion.php');
    $id = $_GET['id'];
    $sql = "SELECT * FROM `usuarios` WHERE `ID_USU` = '$id'";
    $result = mysqli_query($con, $sql);
    $usuario = $result->fetch_assoc();
    mysqli_close($con);
  ?>
  <div class="editar__header">
    <h2 class="editar__username"><?= htmlspecialchars($usuario['NOM_USU']) ?></h2>
    <h3 class="editar__title">Editar Usuario</h3>
  </div>

  <form class="form_editar" action="./funciones/editar_usuario.php" method="POST" id="formulario_editar_usuario">
    <div class="form_group">
      <label for="NOM_USU">Nombre de usuario</label>
      <input 
        class="cuadro_editar" 
        type="text" 
        id="NOM_USU" 
        name="NOM_USU" 
        value="<?= htmlspecialchars($usuario['NOM_USU']) ?>"
        required
      >
    </div>

    <div class="form_group">
      <label for="CON_USU">Contraseña</label>
      <input 
        class="cuadro_editar" 
        type="password" 
        id="CON_USU" 
        name="CON_USU" 
        value="<?= htmlspecialchars($usuario['CON_USU']) ?>"
        required
      >
    </div>

    <div class="form_group">
      <label for="ROL_USU">Rol</label>
      <select class="cuadro_editar" name="ROL_USU" id="ROL_USU" required>
        <option value="admin" <?= $usuario['ROL_USU']=='admin'?'selected':'' ?>>Administrador</option>
        <option value="secretario" <?= $usuario['ROL_USU']=='secretario'?'selected':'' ?>>Secretario</option>
        <option value="usuario" <?= $usuario['ROL_USU']=='usuario'?'selected':'' ?>>Usuario</option>
      </select>
    </div>

    <input type="hidden" name="id" value="<?= $id ?>">

    <div class="form_actions">
      <button type="submit" class="btn_sql">Guardar</button>
      <a href="index.php?action=admin" class="btn_sql btn_secondary">Cancelar</a>
    </div>
  </form>
</section>
