<?php 
namespace Tanjim\GithubAssistent\Admin;

class Menu {

    function __construct ()
    {
        add_action('admin_menu', [$this , 'register_admin_menu']);
    }

    public function register_admin_menu() 
    {
        add_menu_page( 
            __('Github Assitent' , 'assitent'),
            __('Git Assitent Menu' , 'assitent'),
            'manage_options',
            'assitent',
            [$this , "github_assistent_menu_page"],
        ); 
    }


    public function github_assistent_menu_page()
    {
        wp_enqueue_script('github-assistent', Assistent_ASSETS . '/app.js');
        wp_localize_script(
            'github-assistent',
            'github_assistent_obj',
            [
                'ajax_url_tanjim' => admin_url( 'admin-ajax.php' ),
                'nonce' => wp_create_nonce( 'github_assistent_nonce' )
            ]
        );
        
        $main = new Views\Main();
        $main->main();
    }

}