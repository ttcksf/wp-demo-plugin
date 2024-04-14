<?php
/*
Plugin Name: My First Plugin
*/

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
  }
  add_action("admin_menu", "my_admin_menu");

  function render_new_menu(){
    ?>
      <h1>新メニュー設定画面</h1>
      <form action="" method="post" enctype="multipart/form-data" encoding="multipart/form-data">
        <?php settings_fields("admin-menu-form"); ?>
        <?php do_settings_sections("admin-menu-form");?>

        <div class="metabox-holder">
          <div class="postbox">
            <h3 class="hndle">
              <span>セレクトボックス</span>
            </h3>
            <div class="inside">
              <div class="main">
                <p class="setting_description">選択形式の質問項目です</p>
                <h4>セレクトボックス</h4>
                <select name="select" id="select">
                  <option value="0" <?php selected(0, get_option("select"));?>>選択してください</option>
                  <option value="1" <?php selected(1, get_option("select"));?>>アイテムA</option>
                  <option value="2" <?php selected(2, get_option("select"));?>>アイテムB</option>
                  <option value="3" <?php selected(3, get_option("select"));?>>アイテムC</option>
                </select>
              </div>
            </div>
          </div>
          <div class="postbox">
            <h3 class="hndle">
              <span>ラジオボタン</span>
            </h3>
            <div class="inside">
              <div class="main">
                <p class="setting_description">選択形式の質問項目です</p>
                <h4>ラジオボタン</h4>
                <ul>
                  <li>
                    <label>
                      <input type="radio" name="radio" value="0" <?php checked(0, get_option("radio"));?>/>
                      ラジオボタン0
                    </label>
                  </li>
                  <li>
                    <label>
                      <input type="radio" name="radio" value="1" <?php checked(1, get_option("radio"));?>/>
                      ラジオボタン1
                    </label>
                  </li>
                  <li>
                    <label>
                      <input type="radio" name="radio" value="2" <?php checked(2, get_option("radio"));?>/>
                      ラジオボタン2
                    </label>
                  </li>
                  <li>
                    <label>
                      <input type="radio" name="radio" value="3" <?php checked(3, get_option("radio"));?>/>
                      ラジオボタン3
                    </label>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="postbox">
            <h3 class="hndle">
              <span>チェックボックス</span>
            </h3>
            <div class="inside">
              <div class="main">
                <p class="setting_description">選択形式の質問項目です</p>
                <h4>チェックボックス</h4>
                <label for="">
                  <input type="checkbox" id="checkbox1" name="checkbox" value="0" <?php checked(0, get_option("checkbox"));?>>
                  選択肢0
                </label>
                <label for="">
                  <input type="checkbox" id="checkbox1" name="checkbox" value="1" <?php checked(1, get_option("checkbox"));?>>
                  選択肢1
                </label>
                <label for="">
                  <input type="checkbox" id="checkbox1" name="checkbox" value="2" <?php checked(2, get_option("checkbox"));?>>
                  選択肢2
                </label>
              </div>
            </div>
          </div>
          <?php submit_button();?>
        </div>
      </form>
    <?php
  }

  function register_custom_form(){
    register_setting("admin-menu-form", "text");
    register_setting("admin-menu-form", "textbox");
  }
  add_action("admin_init", "register_custom_form");
?>
