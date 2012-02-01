<div id="content">
    <h3><a href="#">Editar Perfil - Alterar Tema</a></h3> 
    <div>
        <form action="admin/editar_perfil/alter_theme" method="POST" id="form_editar_cadastro" class="form_geral" enctype="multipart/form-data">
            <fieldset>
        
            <?php
            echo validation_errors();
            echo $msg;
            ?>
                
            <?php
            foreach($themes as $t):
                echo "<div class='change_theme'>";
                echo "<img src='assets/img/themes/$t->str_img' alt='$t->str_theme' title='$t->str_theme' />";
                echo br();
                $selected = $t->id == $this->session->userdata('id_theme') ? "checked='true'" : "";
                echo "<input type='radio' value='$t->id' name='theme' $selected>";
                echo $t->str_theme;
                echo "</div>";
            endforeach;
            ?>    
            
            <br />
            <input type="submit" name="enviar" id="enviar" value="Enviar" />
            
            </fieldset>
        </form>
    </div>
</div>