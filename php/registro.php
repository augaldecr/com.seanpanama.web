<article> 
    <form action="php/registrar.php" name="registro_frm" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend>Registro de tutores</legend>
            <div class="dato">
                <label for="cedula"><div class="etiqueta">C&eacute;dula: </div></label>
                <input type="text" id="cedula" name="cedula_txt" placeholder="Escriba su identificación" title="Cédula" required="true"/>
            </div>
            <div class="dato">
                <label for="nombre"><div class="etiqueta">Nombre: </div></label>
                <input type="text" id="nombre" name="nombre_txt" placeholder="Escriba su nombre" title="Nombre" required="true"/>
            </div>
            <div class="dato">
                <label for="apellido1"><div class="etiqueta">Primer apellido: </div></label>
                <input type="text" id="apellido1" name="apellido1_txt" placeholder="Escriba su apellido" title="Primer apellido" required="true"/>
            </div>
            <div class="dato">
                <label for="apellido2"><div class="etiqueta">Segundo apellido: </div></label>
                <input type="text" id="apellido2" name="apellido2_txt" placeholder="Escriba su apellido" title="Segundo apellido" required="false"/>
            </div>
            <div class="dato">
                <label for="email"><div class="etiqueta">Correo electr&oacute;nico: </div></label>
                <input type="email" id="email" name="email_txt" placeholder="Escriba su email" title="Email" required="true"/>
            </div>
            <div class="dato">
                <label for="telefono"><div class="etiqueta">Tel&eacute;fono: </div></label>
                <input type="tel" id="telefono" name="telefono_txt" placeholder="Escriba su teléfono" title="Teléfono" required="true"/>
            </div>
            <div class="dato">
                <label for="provincia"><div class="etiqueta">Provincia: </div></label>
                <input type="text" id="provincia" name="provincia_txt" placeholder="Escriba su provincia" title="Provincia" required="true"/>
            </div>
            <div class="submit_div">
                <input type="submit" id="registrar" name="registrar_btn" value="Registrar" />
            </div>
            <?php include("php/mensajes.php"); ?>
        </fieldset>
    </form>
</article>
