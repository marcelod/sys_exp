$(function(){
    
    $('#ajaxLoadAni').fadeIn('slow'); //ABRE A IMAGEM DE CARRREGANDO
    
    //MENU
    $('ul.sf-menu').superfish();
    
    
    $('#ajaxLoadAni').fadeOut('slow'); //FECHA A IMAGEM DE CARRREGANDO
    
    
    
    $('#lista_submenus a').mouseover(function(){
        $(this).addClass('ui-state-hover');
    }).mouseout(function() {
        $(this).removeClass('ui-state-hover');
    });
    
    
    $('form.form_geral').addClass(' ui-widget-content');
    $('table.records').addClass(' ui-widget-content');
    
    
    $( "input:submit, input:reset, a.ui_class, button", ".form_geral" ).button();
    
    
    //COLOCA MASCARA PARA OS CAMPOS
    //MASCARA PARA CAMPO DE VALOR
    $("#dec_valor").maskMoney({
        thousands:'.', 
        decimal:','
    });
    //MASCARA PARA CAMPO DE CNPJ
    $("#str_cnpj").mask('99.999.999/9999-99');
    //MASCARA PARA CAMPO DE QTDE ACEITANDO SOMENTE NUMEROS
    $('.qtde').live({
        keypress:function(e){
            if ((e.which>=48 && e.which<=57) || e.which==8 || e.which==0) {
                return true;
            } else {
                return false;
            }
        }
     });
    
    //INICIALIZA O DATATABLE
    oTable = $('.records').dataTable({
        "oLanguage": {"sUrl": "assets/js/i18n/dataTables.pt-br.txt"},
        "sPaginationType": "full_numbers",
        "bJQueryUI": true,
        "aaSorting": [[ 0, "desc" ]]
    });
    
    // DATEPICKER
    $('#dt_venda').datepicker({
        showOtherMonths: true,
        selectOtherMonths: true
    });
    
    //NO CLICK ONDE HOUVER UM LINK COM A CLASSE .bt_voltar IRÁ VOLTAR UMA PÁGINA
    $('a.bt_voltar').click(function(){
        history.back()
    });
    
});
