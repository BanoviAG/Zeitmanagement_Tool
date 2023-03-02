<?php
if ( !is_user_logged_in()) {

wp_redirect( 'http://localhost/Zeitmanagement_Tool/login/' ); 
    exit;
   } else {
    get_header();
   }
?>