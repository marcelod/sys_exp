<div id="content">
    <h3><a href="#">Editar Perfil - Alterar Imagem</a></h3> 
    <div>
        <form action="admin/editar_perfil/alter_avatar" method="POST" id="form_editar_cadastro" class="form_geral" enctype="multipart/form-data">
            <fieldset>
        
            <?php
            echo validation_errors();
            echo $msg;

            $string = "A imagem deve conter no máximo 2 MB (ou 2048 KB).<br />
                       O tamanho máximo deve ser 1024x768.<br />
                       A extensão deve ser gif, jpg, png ou jpeg.<br />";
            echo span($string, 'inform_img');
            ?>
            
            <input name="userfile" type="file" id="userfile" />";    
            
            <br />
            
            <?php
                echo avatar_user(FALSE, FALSE);
            ?>
            
            <br />
            <input type="submit" name="enviar" id="enviar" value="Enviar" />
            
            </fieldset>
        </form>
    </div>
</div>