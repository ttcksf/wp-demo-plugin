<?php

  // 管理画面から特定のメニューを削除する
  // https://developer.wordpress.org/reference/functions/remove_menu_page/
  function remove_admin_menu(){
    // ツールを削除
    // remove_menu_page("tools.php");
    // ツールの中のサブメニューのインポートだけ削除
    remove_submenu_page("tools.php","import.php");
  }
  add_action("admin_menu","remove_admin_menu");
?>
