<?php
/*
Plugin Name: My First Plugin
*/

  function add_banner($content){
    $html = '<div class="add_banner">バナーです</div>';
    return $html . $content;
  }
  add_filter("the_content", "add_banner");

  function add_banner_css(){
    echo "<style>";
    echo ".add_banner{color:red}";
    echo "</style>";
  }
  add_action("wp_head", "add_banner_css");
?>
