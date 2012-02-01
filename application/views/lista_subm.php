<div id="lista_submenus">

<?php
    foreach ($smenus as $smenu):
        echo "<a href='$smenu->str_link' 
                 title='$smenu->str_alt' 
                 target='$smenu->str_target' 
                 class='lista_itens ui-state-default ui-corner-all'>$smenu->str_menu</a>";
    endforeach;
?>

</div>