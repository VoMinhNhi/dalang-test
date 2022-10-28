<?php
/**
 * Info page admin
 * 
 * @package Web_data
 * @author minhnhi
 * @since 0.0.1
 */

class Web_Data_Info_Page
{
     private static $instance;

     public final static function instance()
     {
          if ( is_null(self::$instance) ) {
               self::$instance = new self();
          }

          return self::$instance;
     }

     public function __contruct()
     {
          $this->name_page_slug    = 'page_list_email';
          // $this->title             = esc_html__( 'List email', 'web-data' );

          add_action( 'admin_menu', [$this, 'register_menus'] );
     }

     function register_menus() 
     {
          add_menu_page(
               esc_html__( 'List email', 'web-data' ),
               esc_html__( 'List email', 'web-data' ),
               'manage_options',
               'page_list_email',
               [$this, 'render_list_email_page'],
               5
          );
     }

     function render_list_email_page ()
     {
          echo "<h1> List email page</h1>";
     }
}

Web_Data_Info_Page::instance();