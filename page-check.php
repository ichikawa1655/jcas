<?php get_header(); ?>
<main id="CONTACT_CHECK" class="contact_check">
<section class="child_fv section_wrap">
    <div class="child_fv_top">
        <!-- 下層ページタイトル -->
        <div class="title">
            <h2>
                <span class="section_title_en">Check</span>
                お問い合わせ
            </h2>
        </div>
        <!-- パンクズリスト -->
        <div class="pankuzu-list">
            <ul>
                <li><a href="<?php echo esc_url(home_url('/')); ?>">TOP</a></li>
                <li>/</li>
                <li>お問い合わせ</li>
            </ul>
        </div>
    </div>
</section>
<!-- ------------------------------------------------------------------------------------------- -->
<!-- ------------------------------------------------------------------------------------------- -->
<div class="section_wrap">
    <div class="form_wrap">
        <div class="step_wrapper">
            <ul>
                <li class="step step1">入力</li>
                <li class="line"></li>
                <li class="step step2 now_step">送信内容確認</li>
                <li class="line"></li>
                <li class="step step3">送信完了</li>
            </ul>
        </div>
        <p class="main_sentence">
            お問い合わせ送信後、確認用の自動送信メールをお送りします。送信内容を今一度お確かめください。<br>
            お問い合わせいただいた内容は担当者が確認し折り返しご連絡させていただきます。<br>
        </p>
        <div class="form_bg">
            <?php the_content(); ?>
        </div>
    </div>
</div>
</main>
<?php get_footer(); ?>