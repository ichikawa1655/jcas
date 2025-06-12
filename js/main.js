(function($) {
    $(function(){  
    // ----------------------------------------
    //  なんのためのコードかを記載
    // ----------------------------------------

    
    });
})(jQuery);

// ----------------------------------------
//  スクロール時ヘッダーを表示
// ----------------------------------------
document.addEventListener('DOMContentLoaded', () => {
    const scrollHeader = document.querySelector('.scroll-header');
    const offset = 150; // 表示を開始するスクロール位置（px）

    window.addEventListener('scroll', () => {
        const scrollY = window.scrollY; // 現在のスクロール位置

        if (scrollY >= offset) {
            scrollHeader.classList.add('visible');
        } else {
            scrollHeader.classList.remove('visible');
        }
    });
});