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
      // 親メニューのスラッグ
      'new_menu',
      // サブメニューのタイトル
      'サブメニュー画面',
      // サブメニューの表示名
      'サブメニュー',
      // 権限
      'manage_options',
      // サブメニューのスラッグ
      'sub_new_menu',
      // サブメニューの表示関数
      'create_sub_new_menu',
      0
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
      <h2>サブメニュー</h2>
    </div>
    <?php
  }
  add_action("admin_menu", "my_admin_menu");
?>
