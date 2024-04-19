<?php
  function theme_setup(){
    add_theme_support("post-thumbnails");
    add_theme_support("automatic-feed-links");
  }
  add_action("after_setup_theme", "theme_setup");

  function custom_post_feed($query){
    if(is_feed()){
      $post_type = $query->get("post_type");
      if(empty($post_type)){
        $query->set("post_type", ["news","post"]);
      }
    }
  }
  add_action("pre_get_posts", "custom_post_feed");


  function my_archive($title){
    if(is_tag()){
      $title = single_tag_title("タグ名：", false);
      return $title;
    }
  }
  add_filter("get_the_archive_title", "my_archive");


  function add_custom_menu(){
    register_nav_menus([
      "header_nav" => "ヘッダーメニュー",
      "footer_nav" => "フッターメニュー"
    ]);
  }
  add_action("init", "add_custom_menu");



  function custom_short_code($attr, $content){
    extract(shortcode_atts([
      "class" => "test",
      "title" => "タイトル"
    ], $attr));

    return "<p class='$class'>" . $title . ":" . $content . "</p>";
  }

  add_shortcode("test_code", "custom_short_code");

  function custom_css(){
    global $post;
    $term = get_post_meta($post->ID, "CSS", true);

    if($term){
      echo "<style>";
      echo esc_html($term);
      echo "</style>";
    }
  }
  add_action("wp_head", "custom_css");

  function custom_desc(){
    global $post;
    $term = get_post_meta($post->ID, "Description", true);

    if($term){
      printf('<meta name="description content="%s"/>', esc_html($term));
    }
  }
  add_action("wp_head", "custom_desc");

  function add_widgets(){
    register_sidebar([
      "name" => "サイドバー",
      "description" => "サイドバーウィジェット",
      "id" => "sidebar",
      "before_widget" => "<div>",
      "after_widget" => "</div>",
      "before_title" => "<h3>",
      "after_title" => "</h3>"
    ]);
  }
  add_action("widgets_init", "add_widgets");

  // 固定ページに抜粋文を追加する
  add_post_type_support("page", "excerpt");
  // 投稿ページにページ属性を追加する
  add_post_type_support("post", "page-attributes");


  // アップロードできるファイルの種類を制限
  function my_mime_type($mime_types){
    $mime_types = [
      // キーは拡張子を正規表現で値はMIMEタイプ
      // https://developer.wordpress.org/reference/hooks/mime_types/
      "png" => "image/png",
      "jpg|jpeg|jpe" => "image/jpeg",
      "pdf" => "application/pdf",
    ];
    return $mime_types;
  }
  add_filter("upload_mimes", "my_mime_type",1,1);

  // 管理画面から特定のメニューを削除する
  // https://developer.wordpress.org/reference/functions/remove_menu_page/
  function remove_admin_menu(){
    // ツールを削除
    // remove_menu_page("tools.php");
    // ツールの中のサブメニューのインポートだけ削除
    remove_submenu_page("tools.php","import.php");
  }
  add_action("admin_menu","remove_admin_menu");

  // 投稿一覧ページにタグ一覧のフィルターを追加する
function add_tag_dropdown_filter() {
  global $wp_query;
  $selected_tag = isset($_GET['tag']) ? $_GET['tag'] : '';
  $tags = get_tags();
  ?>
  <select name="tag" id="tag-filter">
      <option value="" <?php selected($selected_tag, ''); ?>><?php _e('タグ一覧', 'text-domain'); ?></option>
      <?php foreach ($tags as $tag) : ?>
          <option value="<?php echo esc_attr($tag->slug); ?>" <?php selected($selected_tag, $tag->slug); ?>><?php echo esc_html($tag->name); ?></option>
      <?php endforeach; ?>
  </select>
  <?php
}
add_action('restrict_manage_posts', 'add_tag_dropdown_filter');

// タグの選択に応じてクエリを変更する
function filter_posts_by_tag($query) {
  global $pagenow;
  if (is_admin() && $pagenow == 'edit.php' && isset($_GET['tag']) && $_GET['tag'] != '') {
      $query->set('tag', $_GET['tag']);
  }
}
add_filter('parse_query', 'filter_posts_by_tag');

  
 
?>
