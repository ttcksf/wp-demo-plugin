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
      <div class="postbox">
        <h3 class='hndle'><span>テキスト</span></h3>
        <div class="inside">
          <div class="main">
            <p class="setting_description">テキストを入力してください。</p>
            <h4>テキスト</h4>
            <p><input type="text" id="text" name="text" value="<?php echo get_option('text'); ?>"></p>
          </div>
        </div>
      </div>
      <div class="postbox">
        <h3 class='hndle'><span>テキストボックス</span></h3>
        <div class="inside">
          <div class="main">
            <p class="setting_description">テキストボックスを入力してください。</p>
            <h4>テキストボックス</h4>
            <textarea id="textbox" class="regular-text" name="textbox" rows="10" cols="60"><?php echo get_option('textbox'); ?></textarea>
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
