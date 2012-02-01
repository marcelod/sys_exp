<div id="form-login">    
    <h1>SITE PADR&Atilde;O</h1>

    <form action="cadastrar/send" method="POST" id="form_cadastrar">

        <fieldset>

            <legend>Cadastrar novo usu&aacute;rio</legend>

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
            $data = array('name' => 'email', 'id' => 'email', 'maxlength' => '255', 'class' => 'required', 'minlength' => '3');
            echo form_input($data, set_value('email'));
            ?>
            
            <label for="senha">Senha</label>
            <?php
            $data = array('name' => 'senha', 'id' => 'senha', 'maxlength' => '255', 'class' => 'required', 'minlength' => '3');
            echo form_password($data);
            ?>

            <label for="conf_senha">Confirme Senha</label>
            <?php
            $data = array('name' => 'conf_senha', 'id' => 'conf_senha', 'maxlength' => '255', 'class' => 'required', 'minlength' => '3');
            echo form_password($data);
            ?>           

            <input type="submit" value="Enviar" id="enviar" />
            
            <a href="login" title="Voltar">Voltar</a>

        </fieldset>

    </form>
</div>
