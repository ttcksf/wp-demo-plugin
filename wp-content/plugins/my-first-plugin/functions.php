<?php

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
?>
