<?php get_header();?>
    <main>
        <section class="section postbox">
            <!-- 投稿のアイキャッチ画像、ユーザーのメールアドレスなど、そのデータ特有の項目をメタデータという -->
            <?php
                // 第一引数に投稿ID、第二引数にキー、第三引数に値、第四引数に単一データか？カスタム投稿でよく使われる
                update_post_meta(100, "sub_title", "hello", true);
                // 第四引数はデフォルトでfalseつまり配列になっている
                // update_post_meta(100, "sub_title", "hello");
                $meta_data = get_post_meta(100, "sub_title");
                var_dump($meta_data);
                // 削除するとからの配列になる
                delete_post_meta(100, "sub_title");
                $meta_data = get_post_meta(100, "sub_title");
                var_dump($meta_data);
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
