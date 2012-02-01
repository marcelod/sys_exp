<div id="content">

    <h3><a href="#">Editar Usu&aacute;rio</a></h3> 
    <div>
        <form action="cadastro_usuarios/alter" method="POST" id="form_usuarios_edit" class="form_geral">
            <fieldset>
                
                <?php 
                    echo validation_errors();
                    
                    echo form_hidden('id', $edit->id);                
                ?>
                
                <label for="nome">Nome</label>
                <?php
                $data = array('name' => 'nome', 'id' => 'nome', 'maxlength' => '255', 'class' => 'required', 'minlength' => '1');
                echo form_input($data, $edit->str_nome);
                ?>
                
                <label for="login">Login</label>
                <?php
                $data = array('name' => 'login', 'id' => 'login', 'maxlength' => '100', 'class' => 'required', 'minlength' => '3');
                echo form_input($data, $edit->str_login);
                ?>
                
                <label for="email">E-mail</label>
                <?php
                $data = array('name' => 'email', 'id' => 'email', 'maxlength' => '100', 'class' => 'required', 'minlength' => '3');
                echo form_input($data, $edit->str_email);
                ?>
                
                <label for="senha">Senha</label>
                <?php
                $data = array('name' => 'senha', 'id' => 'senha', 'maxlength' => '255', 'minlength' => '3');
                echo form_password($data);
                ?>
                
                <label for="conf_senha">Confirme Senha</label>
                <?php
                $data = array('name' => 'conf_senha', 'id' => 'conf_senha', 'maxlength' => '255', 'minlength' => '3');
                echo form_password($data);
                ?>
                
                <?php
                foreach ($acessos as $acesso):
                    $drop[$acesso->id] = $acesso->str_acesso;
                endforeach;
                echo form_label('Acesso', 'acesso');
                echo form_dropdown('acesso',$drop, $edit->id_acesso);
                ?>
                
                <br /><br />
                
                <input type="submit" value="Enviar" id="enviar" />
                <a href="#" class="bt_voltar ui_class">Cancelar</a>
                
            </fieldset>
        </form>
    </div>
        
</div>
