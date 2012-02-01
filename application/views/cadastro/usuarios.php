<div id="content">

    <h3><a href="#">Cadastrar Usu&aacute;rio</a></h3> 
    <div>
        <form action="cadastro_usuarios/send" method="POST" id="form_usuarios" class="form_geral">
            <fieldset>
                
                <?php echo validation_errors();?>
                <?php echo $msg;?>
                
                <label for="nome">Nome</label>
                <?php
                $data = array('name' => 'nome', 'id' => 'nome', 'maxlength' => '255', 'class' => 'required', 'minlength' => '1');
                echo form_input($data, set_value('nome'));
                ?>
                
                <label for="login">Login</label>
                <?php
                $data = array('name' => 'login', 'id' => 'login', 'maxlength' => '100', 'class' => 'required', 'minlength' => '3');
                echo form_input($data, set_value('login'));
                ?>
                
                <label for="email">E-mail</label>
                <?php
                $data = array('name' => 'email', 'id' => 'email', 'maxlength' => '100', 'class' => 'required', 'minlength' => '3');
                echo form_input($data, set_value('email'));
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
                echo form_dropdown('acesso',$drop, set_value('acesso'));
                ?>
                
                <br /><br />
                
                <input type="submit" value="Enviar" id="enviar" />
                <input type="reset" value="Limpar" id="limpar" />
                
            </fieldset>
        </form>
    </div>
    
    <h3><a href="#">Lista</a></h3> 
    <div>
    <?php
        echo $table_data;
    ?>    
    </div>
        
</div>


<!-- delete confirmation dialog box -->
<div id="delConfDialog" title="Confirma&ccedil;&atilde;o">
    <p>Tem certeza que deseja apagar o registro?</p>
</div>
