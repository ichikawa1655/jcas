(function($) {
    $(function(){  
    // ----------------------------------------
    //  なんのためのコードかを記載
    // ----------------------------------------

    
    });
})(jQuery);

document.addEventListener('DOMContentLoaded', () => {
    // ----------------------------------------
    //  スクロール時ヘッダーを表示
    // ----------------------------------------
    const scrollHeader = document.querySelector('.scroll_header');
    const offset = 150; // 表示を開始するスクロール位置（px）
    const menuBtn = document.querySelector('.menu_btn'); // ハンバーガーメニューのチェックボックス


    window.addEventListener('scroll', () => {
        const scrollY = window.scrollY; // 現在のスクロール位置

        if (scrollY >= offset) {
            scrollHeader.classList.add('visible');
        } else {
            scrollHeader.classList.remove('visible');
        }
    });
        //  -----ページトップに来てヘッダーが隠れたらハンバーガーを閉じる
    window.addEventListener('scroll', () => {
        const scrollY = window.scrollY; // 現在のスクロール位置

        // スクロール位置に応じてヘッダーの表示/非表示を切り替え
        if (scrollY >= offset) {
            scrollHeader.classList.add('visible');
        } else {
            scrollHeader.classList.remove('visible');

            // ハンバーガーメニューを閉じる
            if (menuBtn.checked) {
                menuBtn.checked = false;
            }
        }
    });

    // ----------------------------------------
    //  fvの写真スライドショー・クリックで切り替えも可能
    // ----------------------------------------
    const images = document.querySelectorAll('.slider_image');
    const buttons = document.querySelectorAll('.change_btn');
    let currentIndex = 0;
    let autoSlideInterval;

    const changeSlide = (index) => {
        // Remove active class from all images and buttons
        images.forEach((img) => img.classList.remove('active'));
        buttons.forEach((btn) => btn.classList.remove('active'));

        // Add active class to the current image and button
        images[index].classList.add('active');
        buttons[index].classList.add('active');
    };

    const startAutoSlide = () => {
        autoSlideInterval = setInterval(() => {
            currentIndex = (currentIndex + 1) % images.length;
            changeSlide(currentIndex);
        }, 3000); // 3秒ごとに切り替え
    };

    const stopAutoSlide = () => {
        clearInterval(autoSlideInterval);
    };

    // Initialize auto slide
    startAutoSlide();

    // Add click event to buttons
    buttons.forEach((button, index) => {
        button.addEventListener('click', () => {
            stopAutoSlide();
            currentIndex = index;
            changeSlide(currentIndex);
            startAutoSlide(); // 再び自動スライドを開始
        });
    });

    // ----------------------------------------
    //  上下スクロールでパララックス効果（ゆらゆら動く）
    // ----------------------------------------
    const isMobile = window.innerWidth <= 768;

    if (isMobile) return; // スマホでは無効化（必要に応じて）

    const parallaxItems = document.querySelectorAll(".parallax_item");

    window.addEventListener("scroll", () => {
        const scrollY = window.scrollY;

        parallaxItems.forEach((item) => {
        const speed = parseFloat(item.dataset.speed);
        const offset = scrollY * speed;

        item.style.transform = `translateY(${offset}px)`;
        });
    });

    // ----------------------------------------
    //  現在のページに合わせてヘッダーナビの見た目を変える
    // ----------------------------------------
    document.addEventListener('DOMContentLoaded', function () {
        const path = window.location.pathname;

        // === カテゴリボタンの処理 ===
        const categoryMap = {
            notice: 'notice',
            media: 'media',
            news_release: 'news_release',
            // ここに追加できる
        };

        let currentCategory = 'all';
        for (let key in categoryMap) {
            if (path.includes(key)) {
                currentCategory = categoryMap[key];
                break;
            }
        }

        const categories = document.querySelectorAll('.news_category, .xxxx_category');
        categories.forEach(category => {
            const dataCategory = category.dataset.category;
            if (dataCategory === currentCategory) {
                category.classList.add('active');
            }
        });
    });

    // ----------------------------------------
    //  現在のページに合わせて投稿カテゴリボタンのの見た目を変える
    // ----------------------------------------
    document.addEventListener('DOMContentLoaded', function () {
        // === ヘッダーナビの処理 ===
        const naviKeywords = ['strengths', 'about-us' ,'items' ,'recruit']; // このキーワードを含むリンクを対象にする
        const path = window.location.pathname;  // 現在のパスを定義
        const naviLinks = document.querySelectorAll('.header-navi-box .header-navi li a'); // このクラスにactiveを付与する

        naviLinks.forEach(link => {
            const href = link.getAttribute('href');
            naviKeywords.forEach(keyword => {
                if (href.includes(keyword) && path.includes(keyword)) {
                    link.classList.add('active');
                }
            });
        });
    });

});




// ---------------- 現在のページに合わせてヘッダーナビの見た目を変える ----------------------------
// ---------------- 現在のページに合わせてヘッダーナビの見た目を変える ----------------------------
document.addEventListener('DOMContentLoaded', function () {
  // === ヘッダーナビの処理 ===
  const naviKeywords = ['strengths', 'about-us' ,'items' ,'recruit']; // このキーワードを含むリンクを対象にする
  const path = window.location.pathname;  // 現在のパスを定義
  const naviLinks = document.querySelectorAll('.header-navi-box .header-navi li a'); // このクラスにactiveを付与する

  naviLinks.forEach(link => {
      const href = link.getAttribute('href');
      naviKeywords.forEach(keyword => {
          if (href.includes(keyword) && path.includes(keyword)) {
              link.classList.add('active');
          }
      });
  });
});


