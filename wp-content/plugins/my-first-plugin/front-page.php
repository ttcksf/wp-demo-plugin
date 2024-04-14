<?php get_header();?>
    <main>
        <section class="section postbox">
            <!-- optionsAPIはデータを一時的に保存する関数 -->
            <?php
                update_option("text","aaa");
                $text = get_option("text");
                // var_dump($text);
                // データの変更は上書きするだけ
                update_option("text","bbb");
                $text = get_option("text");
                // var_dump($text);
                // データの削除(falseになる)
                delete_option("text");
                $text = get_option("text");
                // var_dump($text);
                

           ?>
           <!-- transientsAPIはoptionsAPIと同じく一時保存できて有効期限を設定する関数 -->
           <?php
                set_transient("text", "aaa", 3);
                // sleep(2);
                // データが3秒を超えると空になる（falseになる）
                sleep(5);
                $text = get_transient("text");
                var_dump($text);
           ?>
            <div class="postbox_inner inner">
                <div class="cards">
                    <?php if(have_posts()):
                        $args = [
                            "orderby" => "date",
                            "order" => "DESC",
                            "posts_per_page" => 3,
                            "post_type" => "post"
                        ];

                        $query = new WP_Query($args);

                        while($query->have_posts()):
                            $query->the_post();
                    ?>
                    <div class="card">
                        <a href="<?php the_permalink();?>">
                            <div class="card_img">
                                <span>コンテンツ</span>
                            </div>
                            <div class="card_text">
                                <h2><?php the_title();?></h2>
                                <p><?php the_excerpt();?></p>
                            </div>
                        </a>
                    </div>
                    <?php endwhile;?>
                    <?php wp_reset_postdata();?>
                    <?php else:?>
                        <p>投稿がありません。</p>
                    <?php endif; ?>
                </div>
            </div>
        </section>

        <section class="section profile">
            <div class="profile_inner inner">
                <div class="card">
                    <div class="card_img">
                    </div>
                    <div class="card_text">
                        <div class="name">
                            <h2>山田太郎</h2>
                            <h3>IT系フリーランス</h3>
                        </div>
                        <div class="detail">
                            <p>
                                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim.Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php get_footer();?>
