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
    
    
    //ACCORDION
    $("#content").accordion({
        autoHeight: false,
        navigation: true,
        collapsible: true
    });
    
    
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

        
    //LIBERAR ITEM DE VENDA
    $('a.liberar_item').click(function() {
        idd = $(this).find('img').attr('id');
        link = $(this).attr('href');
        cod = $(this).attr('id').split("_");        
        $('#itemConfDialog').dialog('open');
        return false;        
    });
    
    //FAZ AS AÇÕES DO DIALOG DE LIBERAR ITEM DE VENDA
    $('#itemConfDialog').dialog({
        autoOpen: false,
        modal: true,
        hide: 'slide',
        show: 'slide',
        buttons: {
            'Não': function() {
                $(this).dialog( 'close' );
            },            
            'Sim': function() {
                $(this).dialog('close');

                 $.ajax({
                    type: "POST",
                    url: link,
                    data: "cod="+cod[1],
                    success: function() {
                        elem = cod[0]+"_"+cod[1];
                        //elemento a remover da tela
                        $('a#'+elem).remove();
                        //cria a imagem no lugar
                        $("<img src='assets/img/ico-active.png' alt='Venda Liberada' title='Venda Liberada'>").appendTo('#div_li_'+cod[1]);
                        //cria o css para a imagem
                        $('#div_li_'+cod[1]).css('display', 'inline');
                        //remove o link de remover
                        $('a[id='+cod[1]+'][class=delete_row]').css('display', 'none');
                    }
                });
            }
        }
    });
    
    
    
    //ATIVA OU INATIVA O ITEM
    $('a.active_inactive').click(function() {
        img = $(this).find('img').attr('alt') == "Inativar" ? "inactive" : "active";
        lib = $(this).find('img').attr('alt') == "Inativar" ? "Ativar" : "Inativar";
        idd = $(this).find('img').attr('id');
        link = $(this).attr('href');
        cod = $(this).attr('id');
        $.ajax({
            type: "POST",
            url: link,
            data: "cod="+cod,
            success: function() {
                $('#'+idd).attr('src', 'assets/img/ico-' + img + '.png'); 
                $('#'+idd).attr('alt', lib); 
                $('#'+idd).attr('title', lib); 
            }
        });
        return false;
    });
    
    
    
    //NO CLICK DO DELETE ABRE O DIALOG
    $("a.delete_row").click(function() {
        link = $(this).attr('href');
        cod = $(this).attr('id');        
        $('#delConfDialog').dialog('open');
        return false;
    });   
    
    //FAZ AS AÇÕES DO DIALOG DE EXCLUSÃO
    $('#delConfDialog').dialog({
        autoOpen: false,
        modal: true,
        hide: 'slide',
        show: 'slide',
        buttons: {
            'Não': function() {
                $(this).dialog( 'close' );
            },            
            'Sim': function() {
                $(this).dialog('close');

                 $.ajax({
                    type: "POST",
                    url: link,
                    data: "cod="+cod,
                    success: function() {
                        var getNode = oTable.fnGetNodes();
                        for(var i = 0; i < getNode.length; i++) {
                            if($(getNode[i]).attr('id') == cod){
                                oTable.fnDeleteRow( i );
                            }
                        }
                    }
                });
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
    
    
    //APÓS SER CRIADO A TAG <p> DENTRO DO .form_geral IRÁ ESCONDER EM 10 SEGUNDOS
    $('form.form_geral').ready(function(){
        setTimeout( function(){
            $('p').hide('slow')
        }, 6000);
    }); 
    
    
    // DATEPICKER
    $('#dt_venda').datepicker({
        showOtherMonths: true,
        selectOtherMonths: true
    });
    
    
    //CRIA HTML DOS KITS DINAMICAMENTE PARA CADASTRO DE VENDA DE KIT
    $('.add_prod').click(function(){
        $('#ajaxLoadAni').fadeIn('fast'); //ABRE A IMAGEM DE CARRREGANDO
        var num = $("#products > label:last").attr("for").split("_");
        var n = parseInt(num[2]) + 1;
        $.ajax({
            url: "cadastro_venda/create_product_html/"+n,
            cache: false,
            success: function(html){
                $("#tot_produtos").val(n);
                $("#products").append(html);
                $('#ajaxLoadAni').fadeOut('fast'); //FECHA A IMAGEM DE CARRREGANDO
            }
        });
        
        return false;
    });
   
   
   //CRIO UM DIALOG MOSTRANDO OS ITENS DA VENDA
   $('a.qtde_venda').click(function() {
       $('#ajaxLoadAni').fadeIn('slow'); //ABRE A IMAGEM DE CARRREGANDO
       vHref = $( this ).attr( 'href' );
        
       var div = $('<div style="display:hidden"></div>').appendTo('body');
       div.load(
           vHref, 
           {},
           function (responseText, textStatus, XMLHttpRequest) {
               div.dialog({
                   title: "Itens da Venda",
                   modal: true
               });
           }
       );
       $('#ajaxLoadAni').fadeOut('slow'); //FECHA A IMAGEM DE CARRREGANDO
       //prevent the browser to follow the link
       return false;
   });
   
   
    //NO CLICK ONDE HOUVER UM LINK COM A CLASSE .bt_voltar IRÁ VOLTAR UMA PÁGINA
    $('a.bt_voltar').click(function(){
        history.back()
    });
    
});
