<?php

  // 固定ページに抜粋文を追加する
  add_post_type_support("page", "excerpt");
  // 投稿ページにページ属性を追加する
  add_post_type_support("post", "page-attributes");
?>
