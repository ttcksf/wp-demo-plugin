<?php
/*
Plugin Name: My First Plugin
*/

  function my_admin_menu(){
    add_menu_page(
      // $page_title　：　ページタイトル（title）,
      '新メニュー設定画面',
      // $menu_title　：　メニュータイトル,
      '新メニュー',
      // $capability　：　メニュー表示するユーザーの権限,
      'manage_options',
      // $menu_slug,　：　メニューのスラッグ,
      'new_menu',
      // $function,　：　メニュー表示時に使われる関数,
      'render_new_menu',
      // $icon_url,　：　メニューのテキスト左のアイコン,
      'dashicons-admin-generic',
      // $position 　：　メニューを表示する位置;
      // https://developer.wordpress.org/reference/functions/add_menu_page/
      99
    );
  }
  function render_new_menu(){
    ?>
    <div class="wrap">
      <h2>新メニュー設定画面</h2>
    </div>
    <?php
  }
  add_action("admin_menu", "my_admin_menu");
?>
