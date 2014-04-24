<article> 
    <form action="php/consultar.php" name="registro_frm" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend>Contacto</legend>
            <div class="dato">
                <label for="email"><div class="etiqueta">Correo electr&oacute;nico: </div></label>
                <input type="email" id="email" name="email_txt" placeholder="Escriba su email" title="Email" required="true"/>
            </div>
            <div class="dato">
                <label for="nombre"><div class="etiqueta">Nombre completo: </div></label>
                <input type="text" id="nombre" name="nombre_txt" placeholder="Escriba su nombre completo" title="Nombre completo" required="true"/>
            </div>
            <div class="dato">
                <label for="consulta"><div class="etiqueta">Consulta: </div></label>
                <textarea id="consulta" cols="50" name="consulta_txt" maxlength="200" placeholder="Escriba su consulta" required="true" rows="4" title="Consulta">
                </textarea>
            </div>
            <div class="submit_div">
                <input type="submit" id="registrar" name="enviar_btn" value="Enviar" />
            </div>
            <?php include("php/mensajes.php"); ?>
        </fieldset>
    </form>
</article>