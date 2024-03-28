<?php
/*
Plugin Name: My First Plugin
*/

  function add_banner($content){
    // wp-content/pluginsにてmy-first-pluginを作成
    // 作成したフォルダ内でmy-first-plugin.phpを作成
    // 先頭にプラグインネームを記載して、管理画面のプラグインから有効化すると使用できるようになる
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
