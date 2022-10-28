<?php

class Web_Data_Info_Db
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
          $this->table_name = 'info_user';

     }

     function create_table() 
     {
          global $wpdb;
          $chareset_collate   = $wpdb->get_chareset_collate();
          $table_name         = $wpdb->prefix . $this->table_name;
          $exists_table       = $wpdb->query("SHOW TABLES LIKE '$table_name'");

          if ( empty($exists_table) ) {
               $creare_tabel = "CREATE TABLE IF NOT EXISTS $table_name (
                    id int(9) NOT NULL AUTO_INCREMENT,
                    full_name varchar(255) DEFAULT '' NOT NULL,
                    email varchar(255) DEFAULT '' NOT NULL,
                    PRIMARY KEY (id)
                ) $chareset_collate;";

               dbDelta( $creare_tabel );
          }
     }

     public function insert_row( $args ) {
          global $wpdb;
          
          if ( empty( $args['email'] ) ) {
               return new WP_Error( 'bad_request', esc_html__('Missing email.', 'web-data') );
          }

          $table_name = $wpdb->prefix . $this->table_name;

          return $wpdb->insert( $table_name, $args );
     }

     public function get_row( $id ) {
          global $wpdb;

          $table_name = $wpdb->prefix . $this->table_name;
          
          $sql = "SELECT * FROM $table_name WHERE id = %d";

          return $wpdb->get_row( $wpdb->prepare( $sql, $id), ARRAY_A );
     }

     public function get_rows( $posts_per_page, $paged ) {
          global $wpdb;
          $table_name = $wpdb->prefix . $this->table_name;
          $offset = $posts_per_page * ( $paged - 1 );

          $sql = "SELECT * FROM $table_name WHERE 1=1 LIMIT $posts_per_page OFFSET $offset";

          return $wpdb->get_results( $wpdb->prepare( $sql ), ARRAY_A );
     }
}

Web_Data_Info_Db::instance();