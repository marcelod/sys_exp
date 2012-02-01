<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config = array(
    /*
     * validacao da area login
     */
    'home/send' => array(
        array('field'=>'login',
              'label'=>'Login',
              'rules'=>'required|min_length[3]|max_length[100]'),

        array('field'=>'senha',
              'label'=>'Senha',
              'rules'=>'required|min_length[3]|max_length[100]')
    ),
    
    
    /*
     * validacao da area esqueci a senha
     */
    'esquecisenha/send' => array(
        array('field'=>'email',
              'label'=>'E-mail',
              'rules'=>'required|min_length[3]|max_length[255]|valid_email')
    ),
    
    
    /*
     * validacao da area de cadastro de novo usuario
     */
    'cadastrar/send' => array(
        array('field'=>'nome',
              'label'=>'Nome',
              'rules'=>'required|min_length[1]|max_length[255]'),
        
        array('field'=>'login',
              'label'=>'Login',
              'rules'=>'required|min_length[3]|max_length[100]'),
        
        array('field'=>'email',
              'label'=>'E-mail',
              'rules'=>'required|min_length[3]|max_length[100]|valid_email'),
        
        array('field'=>'senha', 
              'label'=>'Senha', 
              'rules'=>'required|max_langth[255]|matches[conf_senha]'),
        
        array('field'=>'conf_senha', 
              'label'=>'Confirme Senha', 
              'rules'=>'max_langth[255]')
    ),
    
    
    /*
     * validacao da area editar perfil
     */
    'editar_perfil/alter' => array(
        array('field'=>'nome',
              'label'=>'Nome',
              'rules'=>'required|min_length[1]|max_length[255]'),
        
        array('field'=>'login',
              'label'=>'Login',
              'rules'=>'required|min_length[3]|max_length[100]'),
        
        array('field'=>'email',
              'label'=>'E-mail',
              'rules'=>'required|min_length[3]|max_length[100]|valid_email'),
        
        array('field'=>'senha', 
              'label'=>'Alterar Senha', 
              'rules'=>'max_langth[255]|matches[conf_senha]'),
        
        array('field'=>'conf_senha', 
              'label'=>'Confirme Nova Senha', 
              'rules'=>'max_langth[255]')
    ),
    
    /*
     * validacao da area de contato
     */
    'contato/send' => array(
        array('field'=>'nome',
              'label'=>'Nome',
              'rules'=>'required|min_length[1]|max_length[255]'),
        
        array('field'=>'email',
              'label'=>'E-mail',
              'rules'=>'required|min_length[3]|max_length[255]|valid_email'),
        
        array('field'=>'titulo',
              'label'=>'Titulo',
              'rules'=>'required|min_length[1]|max_length[255]'),
        
        array('field'=>'mensagem',
              'label'=>'Mensagem',
              'rules'=>'required')
    ),
    
    
    /*
     * validacao da area cadastrar usuarios
     */
    'cadastro_usuarios/send' => array(
        array('field'=>'nome',
              'label'=>'Nome',
              'rules'=>'required|min_length[1]|max_length[255]'),
        
        array('field'=>'login',
              'label'=>'Login',
              'rules'=>'required|min_length[3]|max_length[100]'),
        
        array('field'=>'email',
              'label'=>'E-mail',
              'rules'=>'required|min_length[3]|max_length[100]|valid_email'),
        
        array('field'=>'senha', 
              'label'=>'Senha', 
              'rules'=>'required|max_langth[255]|matches[conf_senha]'),
        
        array('field'=>'conf_senha', 
              'label'=>'Confirme Senha', 
              'rules'=>'max_langth[255]'),
        
        array('field'=>'acesso',
              'label'=>'Acesso',
              'rules'=>'required|is_natural_no_zero')
    ),
    
    /*
     * validacao da area alteracao de usuarios
     */
    'cadastro_usuarios/alter' => array(
        array('field'=>'nome',
              'label'=>'Nome',
              'rules'=>'required|min_length[1]|max_length[255]'),
        
        array('field'=>'login',
              'label'=>'Login',
              'rules'=>'required|min_length[3]|max_length[100]'),
        
        array('field'=>'email',
              'label'=>'E-mail',
              'rules'=>'required|min_length[3]|max_length[100]|valid_email'),
        
        array('field'=>'senha', 
              'label'=>'Alterar Senha', 
              'rules'=>'max_langth[255]|matches[conf_senha]'),
        
        array('field'=>'conf_senha', 
              'label'=>'Confirme Nova Senha', 
              'rules'=>'max_langth[255]'),
        
        array('field'=>'acesso',
              'label'=>'Acesso',
              'rules'=>'required|is_natural_no_zero')
    ),
    
    
    /*
     * validacao para area de cadastro de acesso
     */
    'cadastro_acesso/send' => array(
        array('field'=>'acesso',
              'label'=>'Acesso',
              'rules'=>'required|min_length[1]|max_length[100]|strtoupper')
    ),    
    /*
     * validacao para area de edicao de acesso
     */
    'cadastro_acesso/alter' => array(
        array('field'=>'acesso',
              'label'=>'Acesso',
              'rules'=>'required|min_length[1]|max_length[100]|strtoupper')
    ),
    
    
    /*
     * validacao para area de cadastro de template
     */
    'cadastro_template/send' => array(
        array('field'=>'str_input_text',
              'label'=>'Input Text',
              'rules'=>'required|min_length[1]|max_length[255]'),

        array('field'=>'id_select_option',
              'label'=>'Select Option',
              'rules'=>'required|is_natural_no_zero')
    ),
    /*
     * validacao para area de edicao de template
     */
    'cadastro_template/alter' => array(
        array('field'=>'str_input_text',
              'label'=>'Input Text',
              'rules'=>'required|min_length[1]|max_length[255]'),

        array('field'=>'id_select_option',
              'label'=>'Select Option',
              'rules'=>'required|is_natural_no_zero')
    )
    
    

);
