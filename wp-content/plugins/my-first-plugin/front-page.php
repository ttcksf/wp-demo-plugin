<?php
            $bug = '<a href="https://yahoo.co.jp">yahoo</a>';
            // HTMLタグのエスケープ（実行させない）
            echo esc_html($bug);
            // HTMLを除去してテキストのみにする
            echo sanitize_text_field($bug);
        ?>

        <!-- 限定されたURL以外は出力しない -->
        <?php $url = 'http://yahoo.co.jp';?>
        <h1><a href="<?php echo esc_url($url);?>">Yahoo</a></h1>
        <h1><a href="<?php 
        $ptc = ["https"];
        echo esc_url($url, $ptc);
        ?>">Yahoo</a></h1>
