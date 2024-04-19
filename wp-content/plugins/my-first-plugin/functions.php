<?php

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
?>
