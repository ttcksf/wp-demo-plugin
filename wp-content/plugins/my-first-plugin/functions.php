<?php
function my_first_function($content){
    // 本文を引数で受け取って末尾に下線を追加する
    // includes/post-template.phpの256行目
    // apply_filters("the_content",$content)の部分
    // apply_filtersはフィルターフックを設置する関数で、第一引数がフック名、第二引数がfunctions.phpで使用するときの引数（コールバックに渡すもの）
    return $content . "<hr/>";
  }
  // the_content()関数のthe_contentというイベントで実行
  add_filter("the_content", "my_first_function");

  