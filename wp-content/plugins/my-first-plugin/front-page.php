<?php get_header();?>
    <main>
        <section class="section postbox">
            <!-- エラー処理 -->
            <?php
                function error_check(){
                    // 第一引数：エラーコード
                    // $err = new WP_Error("500");
                    // var_dump($err->get_error_code());
                    // 第二引数：エラーメッセージ
                    // $err = new WP_Error("500", "エラー");
                    // var_dump($err->get_error_message());
                    // 第三引数：エラーデータ(別のデータを渡して処理を切り替えるなど)
                    // $err = new WP_Error("500", "エラー",["aaa",100]);
                    // var_dump($err->get_error_data());

                    // 空のエラーを作成した後から引数を追加することも可能
                    // エラーメッセージをパターンで切り替えるなど
                    $err = new WP_Error();
                    if(true){
                        $err->add("500","必須項目です");
                    }
                    var_dump($err);
                }
                error_check();
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
