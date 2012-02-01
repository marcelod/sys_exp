<div id="content">

    <h3><a href="#">Editar Perfil</a></h3> 
    <div>
        <form action="admin/editar_perfil/alter" method="POST" id="form_editar_perfil" class="form_geral">
            <fieldset>
                <?php
                    echo validation_errors();
                    echo $msg;
                ?>
                
                <label for="nome">Nome</label>
                <?php
                $data = array('name' => 'nome', 'id' => 'nome', 'maxlength' => '255', 'class' => 'required', 'minlength' => '1');
                echo form_input($data, $dados_usuario[0]->str_nome);
                ?>
                
                <label for="login">Login</label>
                <?php
                $data = array('name' => 'login', 'id' => 'login', 'maxlength' => '100', 'class' => 'required', 'minlength' => '3');
                echo form_input($data, $dados_usuario[0]->str_login);
                ?>
                
                <label for="email">E-mail</label>
                <?php
                $data = array('name' => 'email', 'id' => 'email', 'maxlength' => '100', 'class' => 'required', 'minlength' => '3');
                echo form_input($data, $dados_usuario[0]->str_email);
                ?>
                
                <label for="senha">Alterar Senha</label>
                <?php
                $data = array('name' => 'senha', 'id' => 'senha', 'maxlength' => '255', 'minlength' => '3');
                echo form_password($data);
                ?>
                
                <label for="conf_senha">Confirme Nova Senha</label>
                <?php
                $data = array('name' => 'conf_senha', 'id' => 'conf_senha', 'maxlength' => '255', 'minlength' => '3');
                echo form_password($data);
                ?>
                
                <br /><br />
                
                <a href="admin/editar_perfil/alterar_avatar" class="ui_class">Alterar Imagem</a>                
                
                <a href="admin/editar_perfil/alterar_theme" class="ui_class">Alterar Tema</a>                
                
                <br /><br />
                <input type="submit" value="Enviar" id="enviar" />
                
                <a href="#" class="bt_voltar ui_class">Cancelar</a>
                
            </fieldset>
        </form>
    </div>
        
</div>

