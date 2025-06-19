<?php
/* ---------- Slickライブラリの読み込み ---------- */
function enqueue_slick() {
  wp_enqueue_style( 'slick-css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css' );
  wp_enqueue_style( 'slick-theme-css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css' );
  wp_enqueue_script( 'slick-js', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), '1.8.1', true );
}
add_action('wp_enqueue_scripts', 'enqueue_slick');

/* ---------- Slickライブラリの読み込み.end ---------- */

/* ---------- 自作Jsの読み込み ---------- */
function theme_enqueue_scripts() {
    wp_enqueue_script('main-js', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0', true);
    wp_enqueue_script('form-js', get_template_directory_uri() . '/assets/js/form.js', array('jquery'), '1.0', true);
    wp_localize_script('main-js', 'ajaxurl', admin_url('admin-ajax.php'));
}
add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');
/* ---------- 自作Jsの読み込み.end ---------- */

// =======================デフォルト投稿の設定================================= //
function setup() {
	//投稿内の画像をすべて取得
	function post_images() {
		global $post, $posts;
		ob_start();
		ob_end_clean();
		preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
		return $matches[1];
	}

	//アイキャッチ画像を取得
	function catch_that_image() {
		global $post, $posts;
		$first_img = '';
		ob_start();
		ob_end_clean();
		$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
		$first_img = $matches [1] [0];
		if(empty($first_img)){
			// 記事内で画像がなかったときのためのデフォルト画像を指定
			$first_img = "https://dream24fuk.com/img/default_img.jpg";
		}
		return $first_img;
	}

	add_theme_support( 'post-thumbnails' ); //アイキャッチ画像をON

	function twpp_change_excerpt_more( $more ) {
  		return '...';
	}

	add_filter( 'excerpt_more', 'twpp_change_excerpt_more' );

}

add_action( 'after_setup_theme', 'setup' ); //after_setup_themeアクションフック※に登録します。


function post_has_archive($args, $post_type) {
  if ('post' === $post_type) {
      $args['rewrite'] = array('slug' => 'news'); // アーカイブのスラッグ変更
      $args['has_archive'] = true;  // true でもOK
      $args['label'] = 'ニュース';  // 管理画面での表示名
  }
  return $args;
}
add_filter('register_post_type_args', 'post_has_archive', 10,2);


// =======================カスタム投稿の追加================================= //
add_action( 'init', 'create_post_type2' );
function create_post_type2() {
  // カスタム投稿タイプの登録
  register_post_type(
      'recruit', 
      array(
          'label' => '採用情報', // 管理画面上の表示
          'public' => true,
          'has_archive' => true,
          'rewrite' => array('slug' => 'recruit'), 
          'menu_position' => 5,
          'show_in_rest' => true,
          'supports' => array(
              'title',
              'editor',
              'thumbnail',
              'revisions',
          ),
      )
  );
  // カスタム投稿「recruit」にカテゴリーを追加
  register_taxonomy(
      'recruit_cat', // タクソノミーのスラッグ
      'recruit',     // 紐付ける投稿タイプ
      array(
          'label' => 'カテゴリー',
          'hierarchical' => true,
          'public' => true,
          'show_in_rest' => true,
      )
  );
  // カスタム投稿「recruit」にタグを追加
  register_taxonomy(
      'recruit_tag',
      'recruit',
      array(
          'label' => 'タグ',
          'public' => true,
          'hierarchical' => false,
          'show_in_rest' => true,
          'update_count_callback' => '_update_post_term_count',
      )
  );
}

// =======================各アーカイブページで何件表示させるか？================================= //
function column_posts($query){
  if(is_admin() ||!$query->is_main_query()){
    return;
  }

//デフォルト投稿ページの表示件数
    if($query->is_archive()){
      $query->set('posts_per_page','5');
      return;
    }
}
add_action('pre_get_posts', 'column_posts');


// =======================アーカイブページで使うフィルターの変数================================= //
function get_filtered_news($paged = 1, $posts_per_page = 8) {
$year = isset($_GET['filter_year']) ? intval($_GET['filter_year']) : 0;
$category = isset($_GET['filter_category']) ? sanitize_text_field($_GET['filter_category']) : '';


  $args = [
    'post_type'      => 'post',
    'posts_per_page' => $posts_per_page,
    'paged'          => $paged,
  ];

  // カテゴリー絞り込み
  if ($category) {
    $args['tax_query'] = [
      [
        'taxonomy' => 'category',
        'field'    => 'slug',
        'terms'    => $category,
      ]
    ];
  }

  // 年代絞り込み
  if ($year > 0) {
    $args['date_query'] = [
      [
        'after'     => "{$year}-01-01",
        'before'    => "{$year}-12-31",
        'inclusive' => true,
      ]
    ];
  }

  return new WP_Query($args);
}


// ================ アーカイブページで使う年代一覧を取得する関数 ========================= //
function get_available_years_for_posts($post_type = 'post') {
    global $wpdb;

    $years = $wpdb->get_col("
        SELECT DISTINCT YEAR(post_date)
        FROM {$wpdb->prefix}posts
        WHERE post_type = '{$post_type}'
        AND post_status = 'publish'
        ORDER BY post_date DESC
    ");

    return $years;
}

// ================ カスタム投稿「採用情報」を表示する絞り込み機能 ========================= //
// 投稿データ取得用関数
function get_recruit_post_data($cat_slug = '', $tag_slug = '') {

  // ▼ カテゴリー or タグが追加・変更された場合でも基本的には変更不要。
  // ▼ ただし、特定スラッグだけ特別な表示をしたい場合はこの関数に追記します。

  $args = array(
    'post_type' => 'recruit',
    'posts_per_page' => -1,
    'tax_query' => array(
      'relation' => 'AND',
    ),
  );

  if (!empty($cat_slug) && $cat_slug !== 'all') {
    $args['tax_query'][] = array(
      'taxonomy' => 'recruit_cat',
      'field' => 'slug',
      'terms' => $cat_slug,
    );
  }

  if (!empty($tag_slug) && $tag_slug !== 'all') {
    $args['tax_query'][] = array(
      'taxonomy' => 'recruit_tag',
      'field' => 'slug',
      'terms' => $tag_slug,
    );
  }

  $query = new WP_Query($args);
  $html = '';

  if ($query->have_posts()) {
    while ($query->have_posts()) {
      $query->the_post();
      $categories = get_the_terms(get_the_ID(), 'recruit_cat');
      $tags = get_the_terms(get_the_ID(), 'recruit_tag');

      $cat_names = $categories ? join(', ', wp_list_pluck($categories, 'name')) : 'カテゴリーなし';
      $tag_html = '';
      if ($tags) {
        foreach ($tags as $tag) {
          $tag_html .= '<span class="tag">'.esc_html($tag->name).'</span>';
        }
      }

      $html .= '
        <a href="'.get_permalink().'" class="recruit_item">
          <span class="recruit_category">'.esc_html($cat_names).'</span>
          <span class="title">'.esc_html(get_the_title()).'</span>
          <span class="content">'.esc_html(get_the_excerpt()).'</span>
          <div class="tag_list">'.$tag_html.'</div>
        </a>
      ';
    }
    wp_reset_postdata();
  } else {
    $html .= '<p class="recruit_no_posts">該当する投稿がありません。</p>';
  }

  return $html;
}

// Ajaxハンドラー
add_action('wp_ajax_get_recruit_posts', 'ajax_get_recruit_posts');
add_action('wp_ajax_nopriv_get_recruit_posts', 'ajax_get_recruit_posts');

function ajax_get_recruit_posts() {
  $cat = $_POST['cat'] ?? 'all';
  $tag = $_POST['tag'] ?? 'all';

  echo get_recruit_post_data($cat, $tag);
  wp_die();
}










?>
<?php
function enqueue_custom_scripts() {
    wp_enqueue_script( 'slick-init', get_template_directory_uri() . '/assets/js/slick-init.js', array('jquery', 'slick-js'), '1.0', true );
}
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');
?>
