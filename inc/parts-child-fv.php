<section class="child_fv section_wrap">
    <div class="child_fv_top">
        <!-- 下層ページタイトル -->
        <div class="title">
            <h2>
                <span class="section_title_en"><?php the_content(); ?></span>
                <?php the_title(); ?>
            </h2>
        </div>
        <!-- パンクズリスト -->
        <div class="pankuzu-list">
            <ul>
                <li><a href="<?php echo esc_url(home_url('/')); ?>">TOP</a></li>
                <li>/</li>
                <li><?php the_title(); ?></li>
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