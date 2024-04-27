<?php
/* Plugin Name: My First Plugin */
  function add_script($hook){
    if("edit.php" != $hook){
      return;
    }
    wp_enqueue_script("my-js",plugins_url("js/plugin.js",__FILE__));
  }
  add_action("admin_enqueue_scripts","add_script");

?>
