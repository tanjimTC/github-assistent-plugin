<?php

/**
 * Plugin Name:       github-assistent
 * Plugin URI:        https://tanjim-chowdhury.web.app/
 * Description:       Handle the basics with this plugin.
 * Version:           1.01.1
 * Author:            Tanjim Chowdhury
 * Author URI:        https://tanjim-chowdhury.web.app/
 */

if (!defined('ABSPATH')) {exit;}

require_once __DIR__ . "/vendor/autoload.php";

final class Github_Assistent {

    const version  = "1.01.1";

    private function __construct (){
        $this->define_constants();  
        register_activation_hook(__FILE__ , [$this , "activate"]);
        add_action("plugins_loaded",[$this , "init_plugin"]);       
    }

    public static function init(){
        static $instance = false;
        if(!$instance){
            return new self();
        };
        return $instance;
    }

    public function define_constants(){
        define("Assistent_VERSION" , self::version);   
        define("Assistent_FILE" , __FILE__);
        define("Assistent_PATH" , __DIR__);   
        define("Assistent_URL" , plugins_url("", Assistent_FILE));   
        define("Assistent_ASSETS", Assistent_URL. "/assets");
    }

    public function init_plugin(){
        if (is_admin()){
            new Tanjim\GithubAssistent\Admin();
        } else{
            new  \Tanjim\GithubAssistent\Frontend();
        }
    }

    public function activate (){
        $installed = get_option("assistent_installed");
        if(! $installed){
            update_option("assistent_installed" , time());
        }
        update_option("ninja_version" , Assistent_VERSION);
    }

}

function github_assistent () {
    return Github_Assistent::init();
}

github_assistent();