<?php
/**
 * PLugin Init
 * 
 * @package Web_data
 * @author minhnhi
 * @since 0.0.1
 */

class Web_Data_Init
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
          error_log( 'load init');
         
          $this->load_dependencies();
     }

     function load_dependencies() 
     {
          $this->load_classes();
         
     }

     function load_classes() {
          // require_once WEB_DATA_DIR_PATH . 'inc/classes/class-info-db.php';
          // require_once WEB_DATA_DIR_PATH . 'inc/classes/class-info-page';
     }
}

