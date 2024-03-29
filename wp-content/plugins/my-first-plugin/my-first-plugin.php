<?php
/*
Plugin Name: My First Plugin
*/

function create_plugin_page() {  
  // スラグ'plugin'のページが存在するか確認
  $existing_page = get_page_by_path('slug');
  
  if (!$existing_page) {      
      // 新しいページを作成
      $page_data = array(
          // 固定ページ
          'post_type' => 'page',
          // タイトル
          'post_title' => 'プラグイン',
          // スラッグ
          'post_name' => 'plugin',
          // 公開
          'post_status' => 'publish'
      );
      
      // ページをデータベースに挿入
      wp_insert_post($page_data);
  }
}

// プラグイン有効化時
register_activation_hook(__FILE__, 'create_plugin_page');
?>
