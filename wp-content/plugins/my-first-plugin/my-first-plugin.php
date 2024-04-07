<?php
/*
Plugin Name: My First Plugin
*/

  function my_admin_menu(){
    add_menu_page(
      '新メニュー設定画面',
      '新メニュー',
      'manage_options',
      'new_menu',
      'render_new_menu',
      'dashicons-admin-generic',
      99
    );

    add_submenu_page(
      'new_menu',
      'サブメニュー画面',
      'サブメニュー',
      'manage_options',
      'sub_new_menu',
      'create_sub_new_menu',
      0
    );
    // 既存のメニューにサブメニューを追加
    add_submenu_page(
      // 親メニューのファイル名
      // https://developer.wordpress.org/reference/functions/add_submenu_page/
      'post-new.php',
      // メニューのタイトル
      '自作メニューの設定画面',
      // メニューの表示名
      'サブメニュー',
      // 権限
      'manage_options',
      // スラッグ
      'post_new_sub_menu',
      // 表示関数
      'create_sub_new_menu',
      // 表示位置
      4
    );
  }
  function render_new_menu(){
    ?>
    <div class="wrap">
      <h2>新メニュー</h2>
    </div>
    <?php
  }
  function create_sub_new_menu(){
    ?>
    <div class="wrap">
      <h2>自作メニューの設定画面</h2>
    </div>
    <?php
  }
  add_action("admin_menu", "my_admin_menu");
?>
