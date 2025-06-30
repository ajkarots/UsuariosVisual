        <section class="editar">
                <form class="form_editar" action="./funciones/agregar_Estudiante.php" method="POST" id="formulario_agregar">
                        <br></br>
                        <h2>Agregar Estudiante</h2>
                        <input class="cuadro_editar" type="text" placeholder="CEDULA" id="CED_EST" name="CED_EST" maxlength="10" required>
                        <input class="cuadro_editar" type="text" placeholder="NOMBRE" id="NOM_EST" name="NOM_EST" required>
                        <input class="cuadro_editar" type="text" placeholder="APELLIDO" id="APE_EST" name="APE_EST" required>
                        <input class="cuadro_editar" type="text" placeholder="TELEFONO" id="TEL_EST" name="TEL_EST" maxlength="10" required>
                        <input class="cuadro_editar" type="text" placeholder="DIRECCION" id="DIR_EST" name="DIR_EST" required>
                        <button type="submit" class="btn_sql" id="btn_guardar">Guardar</button>
                        <button  class="btn_sql">
                                <a href="index.php?action=admin" id="btn_cancelar" class="rec">Cancelar</a>
                        </button>
                </form>

        </section>