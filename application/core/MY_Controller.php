<?php if ( ! defined('BASEPATH')) exit ('No direct script access allowed');

class MY_Controller extends CI_Controller {

    /*
     * @param: $data
     * @description: dados/informações passados para as views
     */
    public $data = array();

    /*
     * @param: $content
     * @description: define qual view ira chamar, se não for passado nenhum
     *               será chamado a padrão (home)
     */
    public $content = 'home';


    public function __construct() {
        parent::__construct();
    }
    

    public function usable($content) {
        
        if( ! $this->session->userdata('logSite')) {
            redirect(base_url(), 'refresh');
        }
	
        $this->content = $content;
        
        $this->header();
        $this->topo();
        $this->menu('tb_menu');
        
        $this->load->view($this->content, $this->data);
        
        $this->footer();
    }
    
    
    public function header() {
        $this->data['theme'] = load_theme();
            
        $this->data['css'] = load_css(array(
                                        'superfish',
                                        'superfish-navbar',
                                        'grid',
                                        'site')
                                     );
        
        $this->data['js']  = load_js(array(
                                        'min/jquery.min', 
                                        'min/jquery-ui-1.8.16.custom.min',
                                        'min/jquery.validate.min',
                                        'min/jquery.styletable.min',
                                        'min/superfish.min',
                                        'min/hoverIntent.min',
                                        'min/jquery.ui.datepicker-pt-BR.min',
                                        'min/jquery.dataTables.min',
                                        'min/jquery.maskMoney.min',
                                        'min/jquery.maskedinput-1.3.min',
                                        'validate_form',
                                        'main')
                                    );
        
        $this->load->view('default/header', $this->data);
    }
    
    public function topo() {
        $this->load->view('default/topo', $this->data);
    }

    /*
     * cria o menu do site e da area administrativa
     * @param table recebe a tabela que ira pesquisar no banco
     */
    public function menu($table = 'tb_menu')
    {
        if($table == 'tb_menu') {
            $table = 'tb_menu';
            $mn = "<ul class='sf-menu'>\n";
            $view = 'default/menu';
        } else {
            $table = $table;
            $mn = "<ul class='sf-menu sf-vertical'>\n";
            $view = 'admin/default/menu';
        }

        $this->load->model('menu_model');

        foreach($this->menu_model->get_menu($table) as $menu) {
            $mn.= "<li>\n";
            $mn.= "<a href='".base_url() . $menu->str_link."' title='". $menu->str_alt."' target='".$menu->str_target."'>";
            $mn.= $menu->str_menu;
            $mn.= "</a>\n";

            $SubMenu = $this->menu_model->get_menu($table, $menu->id);
            
            if($SubMenu){
                $mn.= "<ul>\n";
                foreach ($SubMenu as $submenu){
                    $mn.= "<li>\n";
                    $mn.= "<a href='".base_url() . $submenu->str_link."' title='".$submenu->str_alt."' target='".$submenu->str_target."'>";
                    $mn.= $submenu->str_menu;
                    $mn.= "</a>\n";

                    $SubSubMenu = $this->menu_model->get_menu($table,$submenu->id);

                    if($SubSubMenu){
                        $mn.= "<ul>\n";
                        foreach ($SubSubMenu as $subsubmenu){
                            $mn.= "<li>\n";
                            $mn.= "<a href='".base_url() . $subsubmenu->str_link."' title='".$subsubmenu->str_alt."' target='".$subsubmenu->str_target."'>";
                            $mn.= $subsubmenu->str_menu;
                            $mn.= "</a>\n";
                            $mn.= "</li>\n";
                        }
                        $mn.= "</ul>\n";
                    }
                    $mn.= "</li>\n";
                }
                $mn.= "</ul>\n";
            }
            $mn.= "</li>\n";
        }
        $mn.= "</ul>\n";

        $this->data['menu'] = $mn;
        $this->load->view($view, $this->data);        
    }

    
    public function footer() {
        $this->load->view('default/footer');
    }
    
    
    
    /*
     * parte administrativa
     */    
    public function admin($content) {
        
        if( ! $this->session->userdata('logAdm')) {
            redirect(base_url(), 'refresh');
        }
	
        $this->content = $content;
        
        $this->header_adm();
        $this->topo_adm();
        $this->menu('tb_sys_menu');
        
        $this->load->view('admin/' . $this->content, $this->data);
        
        $this->footer_adm();
    }
    
    
    public function header_adm() {
        $this->data['theme'] = $this->theme();
            
        $this->data['css'] = load_css(array(
                                        'superfish',
                                        'superfish-navbar',
                                        'grid',
                                        'admin')
                                     );
        
        $this->data['js']  = load_js(array(
                                        'min/jquery.min', 
                                        'min/jquery-ui-1.8.16.custom.min',
                                        'min/jquery.validate.min',
                                        'min/jquery.styletable.min',
                                        'min/superfish.min',
                                        'min/hoverIntent.min',
                                        'min/jquery.ui.datepicker-pt-BR.min',
                                        'min/jquery.dataTables.min',
                                        'min/jquery.maskMoney.min',
                                        'min/jquery.maskedinput-1.3.min',
                                        'validate_form_admin',
                                        'admin')
                                    );
        
        $this->load->view('admin/default/header', $this->data);
    }
    
    
    public function topo_adm() {
        $this->load->view('admin/default/topo', $this->data);
    }
    
    
    public function footer_adm() {
        $this->load->view('admin/default/footer');
    }
    
    
    private function theme() {
        $this->load->model('theme_model');
        
        return load_theme($this->theme_model->get_theme());
    }


}