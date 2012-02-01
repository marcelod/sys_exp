<div id="content">

    <h3><a href="#">Cadastrar Acesso</a></h3> 
    <div>
        <form action="admin/cadastro_acesso/send" method="POST" id="form_acesso" class="form_geral">
            <fieldset>
                
                <?php echo validation_errors();?>
                <?php echo $msg;?>
                
                <label for="acesso">Acesso</label>
                <?php
                $data = array('name' => 'acesso', 'id' => 'acesso', 'maxlength' => '100', 'class' => 'required', 'minlength' => '1');
                echo form_input($data, set_value('acesso'));
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
