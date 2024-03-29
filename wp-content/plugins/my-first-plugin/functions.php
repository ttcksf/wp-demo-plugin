<?php
  function my_first_function(){
    // headタグの中にstyleタグを使ったCSSを書く
    echo "<style>";
    echo ".single_title h2{color: red;}";
    echo "</style>";
  }
  // headタグを出力するwp_head関数で実行する
  add_filter("wp_head", "my_first_function");

?>
