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
  <form method="post" action="" enctype="multipart/form-data" encoding="multipart/form-data">
    <?php
    settings_fields('admin-menu-form');
    do_settings_sections('admin-menu-form'); ?>
    <div class="metabox-holder">
      <div class="postbox">
        <h3 class='hndle'><span>テキスト</span></h3>
        <div class="inside">
          <div class="main">
            <p class="setting_description">テキストを入力してください。</p>
            <h4>テキスト</h4>
            <p><input type="text" id="text" name="text" value="<?php echo esc_attr(get_option('text')); ?>"></p>
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

  function admin_form_submit(){
    if($_SERVER["REQUEST_METHOD"] === "POST"){
      if(isset($_POST["text"]) && $_POST["text"]){
        // 入力値を保存
        update_option("text", $_POST["text"]);
      }else{
        // 無ければ空文字
        update_option("text","");
      }
      // 終わったらリダイレクト(メニューのスラッグを第一引数に指定)
      wp_safe_redirect(menu_page_url("new_menu",false));
      exit;
    }
  }

  add_action("admin_init", "admin_form_submit");
?>
