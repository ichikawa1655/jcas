<?php get_header(); ?>
<main id="TOP">
<div class="top_sec_warp">
<section id="TOP_FV" class="top_fv">
    <div class="main">
        <div class="left">
            <h2 class="heading sec_title">
                日本のローカルが<br>
                もっと活きる路を。
            </h2>
            <h3 class="main_sentence">
                私たち「JCAS Airways（ジェイキャス エアウェイズ）」は、関西地域と富山・山陰地域の空をつなぎ、国内外のお客様をご案内するリージョナルエアラインです。<br>
                また、空のインフラサービスだけでなく、まだ見ぬ地域の魅力を発掘し、お客様に感動体験をお届けします。<br>
                私たちは、地域の皆様と新たな価値を共創し、<br>
                その魅力を世界に発信する新しい時代のエアラインベンチャーです。
            </h3>
        </div>
        <div class="right">
            <div class="img_box">
                <div class="slider_image active" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/fv-top-01.jpg');"></div>
                <div class="slider_image" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/fv-top-02.jpg');"></div>
                <div class="slider_image" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/fv-top-03.jpg');"></div>
            </div>
            <div class="img_change_buttons">
                <button class="change_btn active" data-index="0">01</button>
                <button class="change_btn" data-index="1">02</button>
                <button class="change_btn" data-index="2">03</button>
            </div>
        </div>        </div>
    <div class="airplane_img_box">
        <div class="airplane_img">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/fv-airplane.png">
        </div>
    </div>
</section>
</div>
<div class="top_sec_warp top_bg_color">
<section id="START_POINT" class="start_point">
    <h3 class="sec_title">2026年春 就航</h3>
    <p class="main_sentence">
        まずは関空国際空港から北陸・山陰エリアに国内外のお客様をお連れし、<br>
        日本のローカルの魅力を存分にご提供いたします。<br>
        さらに航空路線のない地域に照準を当て、 地方と地方を接続することで人の流れを生み出し、<br>
        地域に住む人々や旅行客に選択と出会いの自由を提供いたします。
    </p>
    <div class="top_map">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/japan-map.png">
    </div>
</section>
<section id="BUSINESS_MISSION" class="top_business">
    <div class="main">
        <div class="left">
            <p class="sec_title_en">Our Business and mission</p>
            <h3 class="sec_title">移動と出逢いに<br>自由の翼を</h3>
        </div>
        <div class="right">
            <p class="main_sentence">
                日本国内の旅行客に人気の都市や観光地は、地域の魅力やコンテンツの力に加え<br>
                「交通インフラの力」によって支えられています。<br>
                これは、魅力のある地域が人気という側面と「行きやすい地域が人気」という両方の側面を持っているということです。
                日本国内にはまだまだ多くの可能性を秘めているにもかかわらず、交通インフラ格差によって、なかなかその価値を伸ばすことができていない地域が多くあります。
                私たちはそうした格差を緩和し、地域の魅力を届け、多くの人に選択と出会いという自由で豊かな翼を提供します。
            </p>
            <a href="<?php echo esc_url(home_url('//')); ?>" class="more_btn">事業紹介<i class="icon-mini-arrow"></i></a>
        </div>
    </div>


    <div class="auto-scroll-gallery">
        <div class="scroll-track">
            <div class="slide slide_1"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/img-group-sakura.jpg" alt=""></div>
            <div class="slide slide_2"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/img-group-cow.jpg" alt=""></div>
            <div class="slide slide_3"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/img-group-build.jpg" alt=""></div>
            <div class="slide slide_4"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/img-group-train.jpg" alt=""></div>
            <!-- ループのため複製 -->
            <div class="slide slide_1"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/img-group-sakura.jpg" alt=""></div>
            <div class="slide slide_2"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/img-group-cow.jpg" alt=""></div>
            <div class="slide slide_3"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/img-group-build.jpg" alt=""></div>
            <div class="slide slide_4"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/img-group-train.jpg" alt=""></div>
        </div>
    </div>


</section>
</div>
<div class="top_sec_warp">

</div>
</main>
<?php get_footer(); ?>