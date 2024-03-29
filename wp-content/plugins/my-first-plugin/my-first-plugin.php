<?php
/*
Plugin Name: My First Plugin
*/

function create_plugin_page() {  
  $existing_page = get_page_by_path('slug');
  
  if (!$existing_page) {      
      $page_data = array(
          'post_type' => 'page',
          'post_title' => 'プラグイン',
          'post_name' => 'plugin',
          'post_status' => 'publish'
      );
      wp_insert_post($page_data);
  }
}
register_activation_hook(__FILE__, 'create_plugin_page');

// プラグインが無効化されたときに実行される関数
function delete_plugin_page() {
  // スラッグ
  $page_slug = 'plugin';
  // スラッグを使ってページを取得します
  $page = get_page_by_path($page_slug);
  // ページが存在するかどうかを確認
  if ($page) {
      wp_delete_post($page->ID, true);
  }
}
// プラグインが無効化されたときに実行
register_deactivation_hook(__FILE__, 'delete_plugin_page');
?>
