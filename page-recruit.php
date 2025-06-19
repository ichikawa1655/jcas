<?php get_header(); ?>
<main id="RECRUIT" class="recruit">
<?php get_template_part( 'inc/parts-child-fv' ); ?>
<div class="main_flex section_wrap recruit_main_flex">
    <div class="right">
        <section class="our_mission">
            <p class="section_title_en">Our Mission</p>
            <h2 class="section_title">私たちのミッション</h2>
            <h4 class="main_heading mincho">
                新しい路をつくる
            </h4>
            <p class="main_sentence">
                ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。
            </p>
            <div class="recruit_page_airplane_img">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/fv-airplane.png" alt="航空機の画像">
            </div>
            <a href="<?php echo esc_url(home_url('//')); ?>" class="more_btn">私たちについて<i class="icon-mini-arrow"></i></a>
        </section>
        <section class="ideal_candidate">
            <p class="section_title_en">Ideal Candidate</p>
            <h2 class="section_title">求める人物像</h2>
            <p class="main_sentence">
                ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。
            </p>
        </section>
        <section class="pitch_deck">
            <p class="section_title_en">Pitch Deck</p>
            <h2 class="section_title">事業資料</h2>
            <p class="main_sentence">
                ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。
            </p>
            <div class="project_material_img sample">
                <span>ここに資料が入ります</span>
            </div>
            <!-- <div class="project_material_img">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/project-material-xxxxxx.jpg" alt="事業資料のイメージ">
            </div> -->
        </section>
        <a href="<?php echo esc_url(home_url('/contact-recruit/')); ?>" class="recruit_contact_button">
            <p class="heading">採用に関するお問い合わせ</p>
            <p class="main_sentence">
                採用に関するお問い合わせはこちらのフォームよりご連絡ください。<br>
                担当者より折り返しご連絡させていただきます。
            </p>
            <i class="icon-main-arrow"></i>
        </a>
    </div>
    <section class="recruit_wrap left">
        <div class="recruit_top">
            <p class="heading mincho">採用情報一覧</p>
            <div class="recruit_filter_buttons">
                <!-- カテゴリー -->
                <div class="recruit_filter_toggle_wrapper">
                <button class="recruit_filter_toggle category" data-value="all">
                    <span>カテゴリー</span>
                    <i class="icon-mini-arrow"></i>
                </button>
    <!------------- ▼ カテゴリー選択肢（内容を追加・削除・名称変更する場合ここ） ------->
                <ul class="dropdown category-options">
                    <li data-value="all">指定しない</li>
                    <li data-value="newgrad">新卒採用</li>
                    <li data-value="career">中途採用</li>
    <!------------- <li data-value="internship">インターン</li> --------------->
                </ul>
                </div>
                <!-- タグ -->
                <div class="recruit_filter_toggle_wrapper">
                <button class="recruit_filter_toggle tag" data-value="all">
                    <span>タグ</span>
                    <i class="icon-mini-arrow"></i>
                </button>
                <ul class="dropdown tag-options">
    <!------------- ▼ タグ選択肢（内容を追加・削除・名称変更する場合ここ） ----------->
                    <li data-value="all">指定しない</li>
                    <li data-value="weekend_off">土日休み</li>
                    <li data-value="car_commute">車通勤OK</li>
                    <li data-value="certification_support">資格取得支援</li>
    <!------------- <li data-value="remote_work">リモートワーク</li> ----------->
    <!-- 

    ▼ カテゴリーやタグの選択肢が変更になった場合はこの <ul> 内の <li> を編集します
    - data-value には「スラッグ（slug）」を入れる
    - 表示名は日本語などのユーザー向け名称
    - 「指定しない」は常に data-value="all" で維持してください

    -->
                </ul>
                </div>
            </div>
            <button class="filter_apply">絞り込み</button>
        </div>
        <div class="recruit_list_scroll" id="recruit-list">
            <?php echo get_recruit_post_data(); ?>
        </div>
    </section>
</div>
    <?php get_template_part( 'inc/parts-footer-contact' ); ?>
</main>

<script>
window.recruitCatOptions = <?php echo json_encode($cat_options, JSON_UNESCAPED_UNICODE); ?>;
window.recruitTagOptions = <?php echo json_encode($tag_options, JSON_UNESCAPED_UNICODE); ?>;
</script>
<?php get_footer(); ?>