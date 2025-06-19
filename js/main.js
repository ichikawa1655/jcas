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
    if (isMobile) return; // スマホでは無効化

        const parallaxItems = document.querySelectorAll(".parallax_item");

        window.addEventListener("scroll", () => {
        const scrollY = window.scrollY;

        parallaxItems.forEach((item) => {
            const speed = parseFloat(item.dataset.speed);
            const direction = item.dataset.direction || "y"; // デフォルトはY

            let offsetX = 0;
            let offsetY = 0;

            if (direction === "y") {
            offsetY = scrollY * speed;
            } else if (direction === "x-left") {
            offsetX = -scrollY * speed; // 左に動かす
            } else if (direction === "x-right") {
            offsetX = scrollY * speed; // 右に動かす
            }

            item.style.transform = `translate(${offsetX}px, ${offsetY}px)`;
        });
    });

    // ----------------------------------------
    //  リンクコピーボタン
    // ----------------------------------------
    const url = encodeURIComponent(window.location.href);
    const title = encodeURIComponent(document.title);
    
    document.getElementById("share-facebook").href =
      `https://www.facebook.com/sharer/sharer.php?u=${url}`;
    
    document.getElementById("share-x").href =
      `https://twitter.com/intent/tweet?url=${url}&text=${title}`;
    
    document.getElementById("share-line").href =
      `https://social-plugins.line.me/lineit/share?url=${url}`;
    
    document.getElementById("copy-link").addEventListener("click", function (event) {
      event.preventDefault(); // ←これを追加
      navigator.clipboard.writeText(window.location.href).then(function () {
        alert("リンクをコピーしました！");
      }, function () {
        alert("コピーに失敗しました。");
      });
    });
});

// ------------------------------------------------------------------------------------
//  トグルで表示、絞り込み
// ------------------------------------------------------------------------------------
document.addEventListener("DOMContentLoaded", function () {
    const categoryToggle = document.querySelector(".recruit_filter_toggle.category");
    const tagToggle = document.querySelector(".recruit_filter_toggle.tag");
    const categoryOptions = document.querySelector(".category-options");
    const tagOptions = document.querySelector(".tag-options");
    const applyBtn = document.querySelector(".filter_apply");

    let selectedCat = "all";
    let selectedTag = "all";

    // トグル開閉
    categoryToggle.addEventListener("click", () => {
        categoryOptions.classList.toggle("open");
    });
    tagToggle.addEventListener("click", () => {
        tagOptions.classList.toggle("open");
    });

    // ▼ カテゴリー・タグ選択肢は data-value を元に反映されるため、
    // HTML（page-recruit.php）側の選択肢を更新すればここは基本的に変更不要です

    // カテゴリー選択
    categoryOptions.querySelectorAll("li").forEach((item) => {
        item.addEventListener("click", () => {
        selectedCat = item.dataset.value; // ← HTMLの data-value を参照している
        categoryToggle.querySelector("span").textContent = item.textContent;
        categoryOptions.classList.remove("open");
        });
    });

    // タグ選択
    tagOptions.querySelectorAll("li").forEach((item) => {
        item.addEventListener("click", () => {
        selectedTag = item.dataset.value; // ← HTMLの data-value を参照している
        tagToggle.querySelector("span").textContent = item.textContent;
        tagOptions.classList.remove("open");
        });
    });

    // 絞り込み実行
    applyBtn.addEventListener("click", () => {
        const formData = new FormData();
        formData.append("action", "get_recruit_posts");
        formData.append("cat", selectedCat || "all");
        formData.append("tag", selectedTag || "all");

        fetch(ajaxurl, {
        method: "POST",
        body: formData,
        })
        .then((res) => res.text())
        .then((html) => {
            document.getElementById("recruit-list").innerHTML = html;
        });
    });

    // 画面のどこを触ってもトグルを閉じる
    document.addEventListener("click", function (e) {
    const isCategoryClick = categoryToggle.contains(e.target) || categoryOptions.contains(e.target);
    const isTagClick = tagToggle.contains(e.target) || tagOptions.contains(e.target);

    if (!isCategoryClick) {
        categoryOptions.classList.remove("open");
    }

    if (!isTagClick) {
        tagOptions.classList.remove("open");
    }
    });

});

// ------------------------------------------------------------------------------------
//  採用情報の高さを調節（右カラムの高さ - 229px）
// ------------------------------------------------------------------------------------
window.addEventListener('load', matchHeight);
window.addEventListener('resize', matchHeight);

function matchHeight() {
  const sibling = document.querySelector('#RECRUIT .main_flex .right');
  const match = document.querySelector('#RECRUIT .recruit_wrap .recruit_list_scroll');

  if (sibling && match) {
    const adjustedHeight = sibling.offsetHeight - 229;
    match.style.height = adjustedHeight > 0 ? adjustedHeight + 'px' : '0px';
  }
}
