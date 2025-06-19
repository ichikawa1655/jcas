<?php get_header(); ?>
<main id="SINGLE" class="single">
<section class="child_fv section_wrap">
    <div class="child_fv_top">
        <!-- 下層ページタイトル -->
        <div class="title">
            <h2>
                <span class="section_title_en">News</span>
                ニュース
            </h2>
        </div>
        <!-- パンクズリスト -->
        <div class="pankuzu-list">
            <ul>
                <li><a href="<?php echo esc_url(home_url('/')); ?>">TOP</a></li>
                <li>/</li>
                <li>ニュース</li>
                <li>/</li>
                <li><?php the_title(); ?></li>
            </ul>
        </div>
    </div>
</section>
<!-- ------------------------------------------------------------------------------------------- -->
<!-- ------------------------------------------------------------------------------------------- -->
<div class="section_wrap">
    <div class="single_body">
        <div class="top_box">
            <p class="date"><?php echo get_the_date('Y.m.d'); ?></p>
            <p class="category">
                <?php
                $categories = get_the_category();
                if (!empty($categories)) {
                    echo esc_html($categories[0]->name);
                }
                ?>
            </p>
        </div>
        <h3><?php the_title(); ?></h3>
        <div class="share_buttons">
            <p class="share_heading">share</p>
            <a href="#" id="share-facebook" target="_blank" rel="noopener" class="share_button">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/icon-facebook.png'); ?>" alt="Facebook">
            </a>
            <a href="#" id="share-x" target="_blank" rel="noopener" class="share_button">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/icon-x.png'); ?>" alt="X">
            </a>
            <a href="#" id="share-line" target="_blank" rel="noopener" class="share_button">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/icon-line.png'); ?>" alt="LINE">
            </a>
            <button id="copy-link" class="share_button">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/icon-copy.png'); ?>" alt="リンクをコピー">
            </button>
        </div>
        <div class="top_img">
            <?php
            if (has_post_thumbnail()) {
                the_post_thumbnail('full');
            } else {
                echo '<img src="' . esc_url(get_template_directory_uri() . '/assets/img/default-thumbnail.jpg') . '" alt="デフォルトサムネイル">';
            }
            ?>
        </div>
        <h4><?php the_title(); ?></h4>
        <div class="single_content">
            <?php
            // コンテンツの出力
            the_content();
            ?>
        </div>
        <a href="<?php echo esc_url(home_url('/news/')); ?>" class="more_btn">一覧に戻る<i class="icon-mini-arrow"></i></a>
        <div class="related_posts_wrap">
            <p class="related_posts_heading">関連記事</p>
            <div class="related_posts">
                <?php
                // 現在の投稿のカテゴリを取得
                $categories = get_the_category();
                $cat_ids = [];
                if ($categories) {
                    foreach ($categories as $category) {
                        $cat_ids[] = $category->term_id;
                    }
                }
        
                // 関連記事のクエリ
                $related_args = [
                    'post_type'      => 'post',
                    'posts_per_page' => 3,
                    'post__not_in'   => [get_the_ID()],
                    'category__in'   => $cat_ids,
                    'orderby'        => 'date',
                    'order'          => 'DESC',
                ];
                $related_query = new WP_Query($related_args);
        
                if ($related_query->have_posts()) :
                    while ($related_query->have_posts()) : $related_query->the_post();
                ?>
                    <a href="<?php the_permalink(); ?>" class="posts_item">
                        <div class="posts_img">
                            <?php
                            if (has_post_thumbnail()) {
                                the_post_thumbnail('medium');
                            } else {
                                echo '<img src="' . esc_url(get_template_directory_uri() . '/assets/img/default-thumbnail.jpg') . '" alt="デフォルトサムネイル">';
                            }
                            ?>
                        </div>
                        <div class="posts_center">
                            <p class="posts_date"><?php echo get_the_date('Y.m.d'); ?></p>
                            <p class="posts_category">
                                <?php
                                $cat = get_the_category();
                                if ($cat && isset($cat[0])) {
                                    echo esc_html($cat[0]->name);
                                }
                                ?>
                            </p>
                        </div>
                        <h5 class="posts_title"><?php the_title(); ?></h5>
                    </a>
                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                ?>
                    <p>関連記事はありません。</p>
                <?php endif; ?>
            </div>
        </div>    
    </div>
</div>
<?php get_template_part( 'inc/parts-footer-contact' ); ?>
</main>
<?php get_footer(); ?>