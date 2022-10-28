<?php
/*
Plugin Name: Web data
Plugin URI: http://wordpress.org/plugins/hello-dolly/
Description: This is not just a plugin, it symbolizes the hope and enthusiasm of an entire generation summed up in two words sung most famously by Louis Armstrong: Hello, Dolly. When activated you will randomly see a lyric from <cite>Hello, Dolly</cite> in the upper right of your admin screen on every page.
Author: Matt Mullenweg
Version: 1.7.2
Author URI: http://ma.tt/
Text domain: web-data
*/

define( 'WEB_DATA_DIR_PATH', plugin_dir_path(__FILE__) );

require WEB_DATA_DIR_PATH . 'inc/plugin-init.php';

function run_web_data() {
     error_log('run 1');
     Web_Data_Init::instance();
}

run_web_data();