<div id="form-login">    
    <h1><?php echo NAME_ADMIN ?> PADR&Atilde;O</h1>

    <form action="admin/home/send" method="POST" id="form_login">

        <fieldset>

            <legend>Login</legend>

            <?php echo validation_errors();?>
            <?php echo $msg;?>

            <label for="login">Nome de usu&aacute;rio</label>
            <?php
            $data = array('name' => 'login', 'id' => 'login', 'maxlength' => '100', 'class' => 'required', 'minlength' => '3');
            echo form_input($data, set_value('login'));
            ?>

            <label for="senha">Senha</label>
            <?php
            $data = array('name' => 'senha', 'id' => 'senha', 'maxlength' => '100', 'class' => 'required', 'minlength' => '3');
            echo form_password($data);
            ?>

            <input type="submit" value="Acessar" id="enviar" />
            
            <a href="admin/esquecisenha" title="Esqueci a senha">Esqueci a senha</a>

        </fieldset>

    </form>
</div>
