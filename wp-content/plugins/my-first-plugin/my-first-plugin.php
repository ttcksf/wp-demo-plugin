<?php
/* Plugin Name: My First Plugin */
  function my_admin_menu(){
    add_menu_page(
      "新メニュー設定画面",
      "新メニュー",
      "manage_options",
      "new_menu",
      "render_new_menu",
      "dashicons-admin-generic",
      99
    );
    add_action("admin_init", "register_custom_form");
  }
  add_action("admin_menu", "my_admin_menu");

  function render_new_menu(){
    ?>
      <h1>新メニュー</h1>
      <form method="post" action="">
        <?php  
          settings_fields("admin-menu-form");
          do_settings_sections("admin-menu-form");
        ?>
        <div class="metabox-holder">
          <div class="postbox">
            <h3 class="hndle"><span>テキスト</span></h3>
            <div class="inside">
              <div class="main">
                <p class="setting_description">テキストを入力してください</p>
                <p><input type="text" id="text" name="text" value="<?php echo esc_attr(get_option("text")) ?>" /></p>
              </div>
            </div>
          </div>
        </div>
        <?php submit_button();?>
      </form>
    <?php
  }

  function register_custom_form(){
    register_setting("admin-menu-form", "text");
  }

  function admin_form_submit(){
    if($_SERVER["REQUEST_METHOD"] === "POST"){
      if(isset($_POST["text"]) && $_POST["text"]){
        update_option("text", $_POST["text"]);
      }else{
        update_option("text", "");
      }
      wp_safe_redirect(menu_page_url("new_menu", false));
    }
  }
  add_action("admin_init","admin_form_submit");
?>
