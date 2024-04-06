<?php
  /*
  Plugin Name: My First Plugin
  */

  function create_plugin_page(){
    $existing_page = get_page_by_path("plugin");
    if(!$existing_page){
      $post_data = [
        "post_type" => "page",
        "post_title" => "プラグイン",
        "post_name" => "plugin",
        "post_status" => "publish"
      ];
      wp_insert_post($post_data);
    }
  }
  register_activation_hook(__FILE__, "create_plugin_page");

  function delete_plugin_page(){
    $page_slug = "plugin";
    // pluginというスラッグの固定ページを取得
    $page = get_page_by_path($page_slug);
    // 対象の固定ページがあれば削除する
    if($page){
      wp_delete_post($page->ID, true);
    };
  }
  // プラグインを無効化した時に実行する関数
  register_deactivation_hook(__FILE__, "delete_plugin_page");
?>
