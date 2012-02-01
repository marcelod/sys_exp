<div id="content">

    <h3><a href="#">Editar Acesso</a></h3> 
    <div>
        <form action="cadastro_acesso/alter" method="POST" id="form_acesso" class="form_geral">
            <fieldset>
                
                <?php 
                    echo validation_errors();
                    
                    echo form_hidden('id', $edit->id);
                ?>
                
                <label for="acesso">Acesso</label>
                <?php
                $data = array('name' => 'acesso', 'id' => 'acesso', 'maxlength' => '100', 'class' => 'required', 'minlength' => '1');
                echo form_input($data, $edit->str_acesso);
                ?>
                
                <br /><br />
                
                <input type="submit" value="Enviar" id="enviar" />
                <a href="#" class="bt_voltar ui_class">Cancelar</a>
                
            </fieldset>
        </form>
    </div>
        
</div>