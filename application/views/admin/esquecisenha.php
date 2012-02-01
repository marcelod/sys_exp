<div id="form-login">    
    <h1><?php echo NAME_ADMIN ?> PADR&Atilde;O</h1>

    <form action="admin/esquecisenha/send" method="POST" id="form_esqsenha">

        <fieldset>

            <legend>Esqueci a Senha</legend>

            <?php echo validation_errors();?>
            <?php echo $msg;?>

            <label for="email">E-mail</label>
            <?php
            $data = array('name' => 'email', 'id' => 'email', 'maxlength' => '255', 'class' => 'required', 'minlength' => '3');
            echo form_input($data, set_value('email'));
            ?>

            <input type="submit" value="Enviar" id="enviar" />
            
            <a href="admin" title="Voltar">Voltar</a>

        </fieldset>

    </form>
</div>
