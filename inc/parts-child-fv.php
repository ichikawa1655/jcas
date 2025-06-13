<section class="child_fv">
    <!-- パンクズリスト -->
    <div class="pankuzu-list">
        <ul>
            <li><a href="<?php echo esc_url(home_url('/')); ?>">TOP</a></li>
            <li>|</li>
            <li><?php the_title(); ?></li>
        </ul>
    </div>
    <!-- 下層ページタイトル -->
    <div class="title">
        <h2><?php the_title(); ?><span><?php the_content(); ?></span></h2>
    </div>
    <!-- 背景画像 -->
    <div class="child_fv_img">
        <?php the_post_thumbnail(); ?>
    </div>
</section>