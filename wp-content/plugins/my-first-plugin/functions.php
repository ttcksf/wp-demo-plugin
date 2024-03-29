<?php
  // 以下は同じ意味
function my_hidden_menu(){
  return false;
}
add_filter("show_admin_bar", "my_hidden_menu");
add_filter("show_admin_bar", "__return_false");

  // 以下は同じ意味
  function my_author_rule(){
    return array();
  }
  add_action("author_rewrite_rules", "my_author_rule");
  add_action("author_rewrite_rules", "__return_empty_array");

?>
