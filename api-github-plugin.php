<?php
    /*
        Plugin Name: Github api
        Plugin URI: https://www.linkedin.com/in/gabriel-freitas-803a88197/
        Description: Plugin que lista todos os repositórios do usuário
        Version: 0.0001
        Author: Gabriel Souza
        Author URI: https://github.com/Gabriel-souzaa
    */

    if(!defined('ABSPATH')){
        exit("Acesso negado");
    }

    define('API_PLUGIN_GITHUB', plugin_dir_path(__FILE__));

    require_once(API_PLUGIN_GITHUB.'WidgetGithub.php');

    function github_api_registro(){
        register_widget('WidgetGithub');
    }

    add_action('widgets_init', 'github_api_registro');
    