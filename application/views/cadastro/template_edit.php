<div id="content">

    <h3><a href="#">Editar</a></h3> 
    <div>
        <form action="cadastro_template/alter" method="POST" id="form_template" class="form_geral">
            <fieldset>
                
                <?php 
                    echo validation_errors();
                    
                    echo form_hidden('id', $edit->id);                
                ?>                
                
                <label for="str_input_text">Input Text</label>
                <?php
                $data = array('name' => 'str_input_text', 'id' => 'str_input_text', 'maxlength' => '255', 'class' => 'required', 'minlength' => '1');
                echo form_input($data, $edit->str_input_text);
                ?>
                
                <div class="union_inputs">
                <?php
                $data = array('name' => 'str_input_radio', 'id' => 'str_input_radio1', 'value' => 'Primeiro');
                echo form_radio($data);
                echo form_label('Input Radio Primeiro', 'str_input_radio1');
                
                $data = array('name' => 'str_input_radio', 'id' => 'str_input_radio2', 'value' => 'Segundo');
                echo form_radio($data);
                echo form_label('Input Radio Segundo', 'str_input_radio2');
                ?>
                </div>    
                
                <div class="union_inputs">
                <?php
                $data = array('name' => 'int_input_checkbox1', 'id' => 'int_input_checkbox1', 'value' => 'CheckBox 1');
                echo form_checkbox($data);
                echo form_label('Input CheckBox 1','int_input_checkbox1');
                echo br();
                $data = array('name' => 'int_input_checkbox2', 'id' => 'int_input_checkbox2', 'value' => 'CheckBox 2');
                echo form_checkbox($data);
                echo form_label('Input CheckBox 2','int_input_checkbox2');
                ?>
                </div>
                
                <label for="id_select_option">Select Option</label>
                <select id="id_select_option" name="id_select_option">
                    <option value="">--- Selecione ---</option>
                    <option value="1">Primeiro</option>
                    <option value="2">Segundo</option>
                    <option value="3">Terceiro</option>
                </select>
                
                <label for="txt_textarea">Textarea</label>
                <?php
                $data = array('name' => 'txt_textarea', 'id' => 'txt_textarea');
                echo form_textarea($data, $edit->txt_textarea);
                ?>
                      
                <br />
                <input type="submit" value="Enviar" id="enviar" />
                <a href="#" class="bt_voltar ui_class">Cancelar</a>
                
            </fieldset>
        </form>
    </div>
        
</div>