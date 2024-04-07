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
    add_action('admin_init', 'register_custom_form');
  }
  function render_new_menu(){
    ?>
<div class="wrap">
  <h2>新メニュー設定画面</h2>
  <form method="post" action="options.php" enctype="multipart/form-data" encoding="multipart/form-data">
    <?php
    // 設定グループ名。register_setting()で使用されるグループ名と一致する必要がある
    settings_fields('admin-menu-form');
    do_settings_sections('admin-menu-form'); ?>
    <!-- WordPressのスタイルを使うにはclass名を揃える必要がある -->
    <div class="metabox-holder">
      <div class="postbox ">
        <h3 class='hndle'><span>セレクトボックス</span></h3>
        <div class="inside">
          <div class="main">
            <p class="setting_description">セレクトボックスを選択してください。</p>
            <h4>セレクトボックス</h4>
            <select name="select" id="select">
              <option value="0" <?php selected(0, get_option('select')); ?> >選択してください</option>
              <option value="1" <?php selected(1, get_option('select')); ?> >セレクトボックス1</option>
              <option value="2" <?php selected(2, get_option('select')); ?> >セレクトボックス2</option>
              <option value="3" <?php selected(3, get_option('select')); ?> >セレクトボックス3</option>
            </select>
          </div>
        </div>
      </div>
      <div class="postbox ">
        <h3 class='hndle'><span>ラジオボタン</span></h3>
        <div class="inside">
          <div class="main">
            <p class="setting_description">ラジオボタンを選択してください。</p>
            <h4>ラジオボタン</h4>
            <ul>
              <li><label><input name="radio" type="radio" value="0" <?php checked(0, get_option('radio')); ?> />ラジオボタン0</label></li>
              <li><label><input name="radio" type="radio" value="1" <?php checked(1, get_option('radio')); ?> />ラジオボタン1</label></li>
              <li><label><input name="radio" type="radio" value="2" <?php checked(2, get_option('radio')); ?> />ラジオボタン2</label></li>
              <li><label><input name="radio" type="radio" value="3" <?php checked(3, get_option('radio')); ?> />ラジオボタン3</label></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="postbox ">
        <h3 class='hndle'><span>チェックボックス</span></h3>
        <div class="inside">
          <div class="main">
            <p class="setting_description">チェックボックスをチェックしてください。</p>
            <label><input name="checkbox" id="checkbox1" type="checkbox" value="1" <?php checked(1, get_option('checkbox')); ?> />チェックボックス1</label>
            <label><input name="checkbox" id="checkbox1" type="checkbox" value="1" <?php checked(1, get_option('checkbox')); ?> />チェックボックス2</label>
            <label><input name="checkbox" id="checkbox1" type="checkbox" value="1" <?php checked(1, get_option('checkbox')); ?> />チェックボックス3</label>
          </div>
        </div>
      </div>
    </div>
    <?php submit_button(); ?>
  </form>
</div>
    <?php
  }
  function register_custom_form()
  {
    register_setting('admin-menu-form', 'text');
    register_setting('admin-menu-form', 'textbox');
  }

  add_action("admin_menu", "my_admin_menu");
?>
