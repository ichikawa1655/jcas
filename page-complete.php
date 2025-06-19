<?php get_header(); ?>
<main id="CONTACT_CHECK" class="contact_check">
<section class="child_fv section_wrap">
    <div class="child_fv_top">
        <!-- 下層ページタイトル -->
        <div class="title">
            <h2>
                <span class="section_title_en">Check</span>
                お問い合わせ完了
            </h2>
        </div>
        <!-- パンクズリスト -->
        <div class="pankuzu-list">
            <ul>
                <li><a href="<?php echo esc_url(home_url('/')); ?>">TOP</a></li>
                <li>/</li>
                <li>お問い合わせ完了</li>
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
                <li class="step step2">送信内容確認</li>
                <li class="line"></li>
                <li class="step step3 now_step">送信完了</li>
            </ul>
        </div>
        <div class="confirm_email">
            メールアドレスをご確認ください。<br>
            <span class="email_address">taro.tanaka@jcasairways.com</span>
        </div>
        <p class="main_sentence complete">
            ご入力いただいた上記のメールアドレス宛に確認用の自動送信メールをお送りしました。送信内容を今一度ご確認ください。<br>
            また受信ボックスにメールが見当たらない場合、迷惑メールフォルダに入っている可能性、または入力いただいたメールアドレスに誤りがある可能性がございますので、今一度ご確認よろしくお願いいたします。<br>
            お問い合わせ内容を担当スタッフが確認し、折り返しご連絡させていただきますのでどうぞよろしくお願いいたします。        
        </p>
        <a href="<?php echo esc_url(home_url('//')); ?>" class="more_btn">トップへ戻る<i class="icon-mini-arrow"></i></a>
    </div>
</div>
</main>
<?php get_footer(); ?>