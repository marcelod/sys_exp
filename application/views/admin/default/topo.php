<div id="ajaxLoadAni">
    <img src="assets/img/ajax-loader.gif" alt="Carregando..." />
    <span>Carregando...</span>
</div>

<div id="top">
    <a href=""><img src="assets/img/logo.png" alt="Home" title="Home" /></a>
    
    <div id="top_links">
        <ul>
            <li><?php echo avatar_user(TRUE, TRUE, 'admin/'); ?></li>
            <li><?php echo $this->session->userdata('str_nome'); ?></li>
            <li><a href="admin/editar_perfil" title="Editar Perfil">Editar Perfil</a></li>
            <li><a href="admin/home/logout" title="Sair">Sair</a></li>
        </ul>
    </div>
</div>