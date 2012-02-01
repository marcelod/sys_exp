<?php

function fLog(){
    $CI = & get_instance();
    
    $dados['id_usuario'] = $CI->session->userdata('id_usuario') != "" ? $CI->session->userdata('id_usuario') : "0";
    $dados['ip_address'] = $_SERVER['REMOTE_ADDR'];
    $dados['str_user_agent'] = $_SERVER['HTTP_USER_AGENT'];
    $dados['str_link'] = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    $dados['class_method'] = $CI->router->class . "::" . $CI->router->method;

    $CI->load->model('log_model');
    $CI->log_model->insert_log($dados);
}
