<?php if ( ! defined( 'BASEPATH' ))  exit ( 'No direct script access allowed' );

/*
 * debug - usado para debugar a aplicação durante o desenvolvimento
 * $content: o valor a ser mostrado na tela
 * $die: para parar de rodar o script
 */
function debug($content, $die = TRUE) {
    echo "<pre>";
    print_r($content);
    echo "</pre>";
    if ($die === TRUE) {
        die();
    }
}

/*
 * converte de um formato americano para um formato brasileiro
 */
function data_us_to_br($dateUSA)
{
    if($dateUSA) {
         $ano = substr($dateUSA, 0, 4);
         $mes = substr($dateUSA, 5, 2);
         $dia = substr($dateUSA, 8, 2);
         $dateBR = $dia .'/'. $mes .'/'. $ano;
         return $dateBR;
    } else {
        return NULL;
    }
}

/*
 * converte de um formato brasileiro para um formato americano
 */
function data_br_to_us($dateBR)
{
    if($dateBR) {
         $ano = substr($dateBR, 6, 4);
         $mes = substr($dateBR, 3, 2);
         $dia = substr($dateBR, 0, 2);
         $dateUSA = $ano .'-'. $mes .'-'. $dia;
         return $dateUSA;
    } else {
        return NULL;
    }
}

/*
 * recebe uma string e retorna somente os numeros
 */
function limpa_num($str)
{
    if($str != "") {
        return preg_replace("/[^0-9\s]/", "", $str);
    } 
    
    return $str;
}

/*
 * retorna o valor formatado para guardar no BD 
 */
function num_to_db($num = 0)
{
    if($num != 0) {
        $num = str_replace('.', '', $num);
        $num = str_replace(',', '.', $num);
        
        return number_format($num, 2, '.', '');
    }
    
    return '0.00';
}

/*
 * retorna o valor do BD e formata para exibir ao usuario final
 */
function num_to_user($num = 0)
{
    if($num != 0) {
        return number_format($num, 2, ',', '.');
    }
    
    return '0,00';
}


/*
 * cria uma tag p
 */
function p($param){
    if($param != NULL){
        return "<p>$param</p>";
    }
    
    return FALSE;
}

/*
 * cria uma tag span
 */
function span($string, $class) {
    if($string) {
        $span = "<span ";
        
        if($class) $span.= "class='$class'";
        
        $span.= ">";
        
        $span.= $string;        
        
        $span.= "</span>";
        
        return $span;
    }
    
    return FALSE;
}


/*
 * cria o link com a imagem para liberar o item
 * @valor int
 * @link string
 * @id int
 */
function liberar_item($valor, $link, $id) {
    $CI = & get_instance();
    
    $html = "<div id='div_li_$id'></div>";
    if($valor == 1) {
        $html.= "<img src='assets/img/ico-active.png' alt='Venda Liberada' title='Venda Liberada'>";
    } else {
        if($CI->session->userdata('id_acesso') != 2){
            $html.= "<a href='$link' id='lib_$id' class='liberar_item'>";
            $html.= "<img id='li_$id' src='assets/img/ico-inactive.png' alt='Liberar Venda' title='Liberar Venda'>";        
            $html.= "</a>";
        } else {
            $html.= "<img src='assets/img/ico-inactive.png' alt='Venda à Liberar' title='Venda à Liberar'>";        
        }
            
    }
    
    return $html;
}

/*
 * cria o link com a imagem para ativar ou inativar
 * @valor int
 * @link string
 * @id int
 */
function active_inactive($valor, $link, $id) {
    
    $html = "<a href='$link' id='$id' class='active_inactive'>";
    if($valor == 0) {
        $html.= "<img id='im$id' src='assets/img/ico-inactive.png' alt='Ativar' title='Ativar'>";
    } else {
        $html.= "<img id='im$id' src='assets/img/ico-active.png' alt='Inativar' title='Inativar'>";        
    }
    $html.= "</a>";
    
    return $html;
}


/*
 * cria um link com a imagem para deletar um item
 * 
 */
function delete_item($id, $link) {
    $html = "<a href='$link' id='$id' class='delete_row'>";
    $html.= "<img id='de$id' src='assets/img/ico-delete.png' alt='Delete' title='Delete'>";
    $html.= "</a>";
    
    return $html;
}

/*
 * cria um link com a imagem para edição do item
 * 
 */
function edit_item($id, $link) {
    $l = $link . $id;
    $html = "<a href='$l' id='edit_$id' class='edit_row'>";
    $html.= "<img id='ed$id' src='assets/img/ico-edit.png' alt='Edit' title='Edit'>";
    $html.= "</a>";
    
    return $html;
}


/*
 * exibe a imagem do usuario ou a imagem padrao de avatar
 */
function avatar_user($thumb=FALSE, $link=TRUE, $local = '') {
    $CI = & get_instance();
    
    $CI->load->model('user_model');
    $img = $CI->user_model->avatar_user()->str_image;
    $path = 'assets/upload/image_user/';
    if($thumb == TRUE) $path.= 'thumb/';
    $html = '';
    
    if($link) $html.= "<a href='" . $local . "editar_perfil/alterar_avatar' id='alterar_avatar'>";
    
    if($img == '' || !file_exists($path . $img)) {
        $imagem = $path . "android.png";   
    } else {
        $imagem = $path . $img;
    }
    
    $html.= "<img class='' src='$imagem' alt='Alterar Imagem' title='Alterar Imagem'>";
    
//    if($link) $html.= "<div id='alter_img'>Alterar imagem</div>";
    
    if($link) $html.= "</a>";    
    
    return $html;
}
