<?php get_header(); ?>
<main id="SITE_MAP" class="site_map">
<?php get_template_part( 'inc/parts-child-fv' ); ?>
<div class="section_wrap">
    <p class="section_title_en">Site Map</p>
    <h3 class="section_title">サイトマップ</h3>
    <div class="site_map_wrap">
        <div class="button_container">
            <div class="buttons">
                <a href="<?php echo esc_url(home_url('//')); ?>" class="page_button">トップページ<i class="icon-mini-arrow"></i></a>
            </div>
        </div>
        <div class="button_container">
            <div class="buttons">
                <a href="<?php echo esc_url(home_url('/aboutus/')); ?>" class="page_button">私たちについて<i class="icon-mini-arrow"></i></a>
                <p class="section_name">企業理念</p>
                <p class="section_name">チーム・体制</p>
            </div>
            <div class="buttons">
                <a href="<?php echo esc_url(home_url('/company/')); ?>" class="page_button">会社概要<i class="icon-mini-arrow"></i></a>
                <p class="section_name">会社概要</p>
                <p class="section_name">株主・投資家一覧</p>
                <p class="section_name">オウンドメディア・SNS</p>
            </div>
            <div class="buttons">
                <a href="<?php echo esc_url(home_url('/business/')); ?>" class="page_button">事業紹介<i class="icon-mini-arrow"></i></a>
            </div>
            <div class="buttons">
                <a href="<?php echo esc_url(home_url('/cocreation/')); ?>" class="page_button">地域連携<i class="icon-mini-arrow"></i></a>
                <p class="section_name">富山</p>
                <p class="section_name">米子</p>
            </div>
        </div>
        <div class="button_container right">
            <div class="buttons">
                <a href="<?php echo esc_url(home_url('/news/')); ?>" class="page_button">ニュース<i class="icon-mini-arrow"></i></a>
            </div>
            <div class="buttons">
                <a href="<?php echo esc_url(home_url('/recruit/')); ?>" class="page_button">採用情報<i class="icon-mini-arrow"></i></a>
            </div>
            <div class="buttons">
                <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="page_button">お問い合わせ<i class="icon-mini-arrow"></i></a>
            </div>
        </div>
    </div>
</div>
</main>
<?php get_footer(); ?>