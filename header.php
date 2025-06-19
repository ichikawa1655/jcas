<!DOCTYPE html>
<html dir="ltr" lang="ja">
<head>
    <meta charset="UTF-8">
    <!-- metaタグ -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no, address=no, email=no">
    <!-- css -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/icon/style.css">
    <!-- font -->
    <link href="https://fonts.googleapis.com/css2?family=Shippori+Mincho&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>
<body>
<div class="wrapper">
    <!-- ページのトップに置いておくヘッダー -->
    <header id="TOP_HEADER" class="top_header">
        <h1><a href="<?php echo esc_url(home_url('//')); ?>" class="left_logo"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" alt="JCAS Airways"></a></h1>
        <ul class="right_buttons">
            <li><a href="<?php echo esc_url(home_url('/aboutus/')); ?>">私たちについて</a></li>
            <li><a href="<?php echo esc_url(home_url('/cocreation/')); ?>">地域連携</a></li>
            <li><a href="<?php echo esc_url(home_url('/company/')); ?>">会社概要</a></li>
            <li><a href="<?php echo esc_url(home_url('/news/')); ?>">ニュース</a></li>
            <li><a href="<?php echo esc_url(home_url('/business/')); ?>">事業紹介</a></li>
            <li><a href="<?php echo esc_url(home_url('/recruit/')); ?>">採用情報</a></li>
        </ul>
    </header>
    <!-- スクロール時に出てくる固定ヘッダー -->
    <header class="scroll_header">
        <h1><a href="<?php echo esc_url(home_url('//')); ?>" class="left_logo"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" alt="JCAS Airways"></a></h1>
        <input type="checkbox" class="menu_btn" id="menu_btn">
        <label for="menu_btn" class="menu_icon"><span class="navicon"></span></label>
        <div class="menu">
            <ul class="menu_buttons">
                <li>
                    <a href="<?php echo esc_url(home_url('/aboutus/')); ?>">
                        <div class="text_box">
                            <p class="en">About us</p>
                            <p class="button_title">私たちについて</p>
                        </div>
                        <i class="icon-main-arrow"></i>
                    </a>
                    <a href="<?php echo esc_url(home_url('/company/')); ?>">
                        <div class="text_box">
                            <p class="en">Company</p>
                            <p class="button_title">会社概要</p>
                        </div>
                        <i class="icon-main-arrow"></i>
                    </a>
                    <a href="<?php echo esc_url(home_url('/business/')); ?>">
                        <div class="text_box">
                            <p class="en">Business</p>
                            <p class="button_title">事業紹介</p>
                        </div>
                        <i class="icon-main-arrow"></i>
                    </a>
                    <a href="<?php echo esc_url(home_url('/cocreation/')); ?>">
                        <div class="text_box">
                            <p class="en">Co-Creation Ares</p>
                            <p class="button_title">地域連携</p>
                        </div>
                        <i class="icon-main-arrow"></i>
                    </a>
                    <a href="<?php echo esc_url(home_url('/news/')); ?>">
                        <div class="text_box">
                            <p class="en">News</p>
                            <p class="button_title">ニュース</p>
                        </div>
                        <i class="icon-main-arrow"></i>
                    </a>
                    <a href="<?php echo esc_url(home_url('/recruit/')); ?>">
                        <div class="text_box">
                            <p class="en">Recruitment</p>
                            <p class="button_title">採用情報</p>
                        </div>
                        <i class="icon-main-arrow"></i>
                    </a>
                </li>
            </ul>
        </div>
    </header>