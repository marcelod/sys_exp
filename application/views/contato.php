<div id="content">

    <h1>Contato</h1> 
    <div>
        <form action="contato/send" method="POST" id="form_contato" class="form_geral">
            <fieldset>
                <?php
                    echo validation_errors();
                    echo $msg;
                ?>
                
                <label for="nome">Nome</label>
                <?php
                $data = array('name' => 'nome', 'id' => 'nome', 'maxlength' => '255', 'class' => 'required', 'minlength' => '1');
                echo form_input($data, set_value('nome'));
                ?>
                
                <label for="email">E-mail</label>
                <?php
                $data = array('name' => 'email', 'id' => 'email', 'maxlength' => '255', 'class' => 'required', 'minlength' => '3');
                echo form_input($data, set_value('email'));
                ?>
                
                <label for="titulo">T&iacute;tulo</label>
                <?php
                $data = array('name' => 'titulo', 'id' => 'titulo', 'maxlength' => '255', 'class' => 'required', 'minlength' => '1');
                echo form_input($data, set_value('titulo'));
                ?>
                
                <label for="mensagem">Mensagem</label>
                <?php
                $data = array('name' => 'mensagem', 'id' => 'mensagem', 'class' => 'required');
                echo form_textarea($data, set_value('mensagem'));
                ?>
                
                <br /><br />
                <input type="submit" value="Enviar" id="enviar" />
                
                <a href="#" class="bt_voltar ui_class">Cancelar</a>
                
            </fieldset>
        </form>
    </div>
        
</div>
