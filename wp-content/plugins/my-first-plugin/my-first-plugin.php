<?php
/* Plugin Name: My First Plugin */

// プラグインが有効化された時にだけ実行するCSS,JSファイル
// function add_scripts(){
//   wp_enqueue_script("my-script", plugins_url("js/plugin.js", __FILE__));
// }
// add_action("wp_enqueue_scripts", "add_scripts");

// 管理画面のみで実行したい時
function add_scripts($hook){
  if("edit.php" != $hook){
    return;
  }
  wp_enqueue_script("my-script", plugins_url("js/plugin.js", __FILE__));
}
add_action("admin_enqueue_scripts", "add_scripts");
?>
