<?php
get_header();

$current_category = isset($_GET['filter_category']) ? sanitize_text_field($_GET['filter_category']) : '';
$current_year = isset($_GET['filter_year']) ? intval($_GET['filter_year']) : 0;
$paged = get_query_var('paged') ? get_query_var('paged') : 1;
$query = get_filtered_news($paged);

// DBから実際に投稿がある年を取得し、直近3年だけ表示
$available_years = get_available_years_for_posts('post');
$available_years = array_slice($available_years, 0, 3);
?>

<main id="NEWS">
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
            </ul>
        </div>
    </div>
    <!-- 背景画像 -->
    <?php
    // 画像の「サーバー上のパス」（globで使う）
    $dir_path = get_template_directory() . '/assets/img/child-fv-images/';

    // 画像の「URL」（ブラウザからアクセスされる）
    $dir_url = get_template_directory_uri() . '/assets/img/child-fv-images/';

    // jpg画像をすべて取得
    $images = glob($dir_path . '*.jpg');

    if ($images && count($images) > 0) {
        // ランダムに1つ選んで、ファイル名だけを取得
        $random_image = basename($images[array_rand($images)]);
        // 表示用URLを作成
        $image_url = $dir_url . $random_image;
    } else {
        // デフォルト画像（必要なら置き換え）
        $image_url = get_template_directory_uri() . '/assets/img/child-fv-default.jpg';
    }
    ?>
    <div class="child_fv_img">
        <img src="<?php echo esc_url($image_url); ?>" alt="ランダム画像">
    </div>
</section>
<!-- ------------------------------------------------------------------------------------------- -->
<!-- ------------------------------------------------------------------------------------------- -->
<section id="NEWS_BODY" class="section_wrap">
    <div class="news_wrapper">
        <div class="news_filters">
            <div class="filters_column">
            <p class="heading">カテゴリー</p>
            <div class="line"></div>
            <div class="filter_buttons">
                <?php
                $categories = [
                '' => 'すべて',
                'news_release' => 'ニュースリリース',
                'media' => 'メディア掲載',
                'notice' => 'お知らせ',
                ];
                foreach ($categories as $slug => $label) {
                $active = ($current_category === $slug) ? 'active' : '';
                $link = esc_url(add_query_arg([
                    'filter_category' => $slug,
                    'filter_year' => $current_year,
                ], home_url('/news/')));
                echo "<a href='{$link}' class='filter_button {$active}'>{$label}</a>";
                }
                ?>
            </div>
            </div>

            <div class="filters_column">
            <p class="heading">年代</p>
            <div class="line"></div>
            <div class="filter_buttons">
                <?php
                // 「すべて」ボタン
                $active = ($current_year === 0) ? 'active' : '';
                $link = esc_url(add_query_arg([
                'filter_category' => $current_category,
                'filter_year' => '',
                ], home_url('/news/')));
                echo "<a href='{$link}' class='filter_button {$active}'>すべて</a>";

                foreach ($available_years as $year) {
                $active = ($current_year === intval($year)) ? 'active' : '';
                $link = esc_url(add_query_arg([
                    'filter_category' => $current_category,
                    'filter_year' => $year,
                ], home_url('/news/')));
                echo "<a href='{$link}' class='filter_button {$active}'>{$year}年</a>";
                }
                ?>
            </div>
            </div>
        </div>
        <div class="news_list">
            <?php if ($query->have_posts()) : ?>
            <?php while ($query->have_posts()) : $query->the_post(); ?>
            <a class="news_item" href="<?php the_permalink(); ?>">
                <div class="news_item_main">
                    <div class="news_item_top">
                        <span class="news_date">
                            <?php echo get_the_date('Y.m.d'); ?>
                        </span>
                        <span class="news_category">
                            <?php
                            $cats = get_the_category();
                            if (!empty($cats)) echo esc_html($cats[0]->name);
                            ?>
                        </span>
                    </div>
                    <p class="news_title"><?php the_title(); ?></p>
                </div>
                <div class="news_item_arrow"><i class="icon-main-arrow"></i></div>
            </a>
            <?php endwhile; ?>
            <!-- ページネーション -->
            <div class="pagination">
                <?php
                echo paginate_links([
                'total' => $query->max_num_pages,
                'current' => $paged,
                'format' => '?paged=%#%',
                'add_args' => [
                    'filter_category' => $current_category,
                    'filter_year' => $current_year,
                ],
                'prev_text' => '<div class="icon_box"><i class="icon-mini-arrow"></i><i class="icon-mini-arrow"></i></div>Prev',
                'next_text' => 'Next<div class="icon_box"><i class="icon-mini-arrow"></i><i class="icon-mini-arrow"></i></div>',
                ]);
                ?>
            </div>
            <?php else : ?>
            <div class="news_item no_news"><p class="news_title">現在お知らせはありません。</p></div>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
        </div>
    </div>
</section>
<?php get_template_part( 'inc/parts-footer-contact' ); ?>
</main>
<?php get_footer(); ?>