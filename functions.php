<?php
/**
 * JavaScript や CSS を読み込みます。
 */
function enqueue_theme_scripts() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' ,array(), '20151207' );
    wp_enqueue_style( 'twentysixteen-child-fonts', '//fonts.googleapis.com/earlyaccess/notosansjapanese.css' );
}
add_action( 'wp_enqueue_scripts', 'enqueue_theme_scripts' );

/**
 * more タグで URL 末端に付く #more-xxxx を削除します。
 */
function remove_more_link_scroll( $link ) {
    $link = preg_replace( '|#more-[0-9]+|', '', $link );
    return $link;
}
add_filter( 'the_content_more_link', 'remove_more_link_scroll' );

/**
 * メニューに検索フォームを追加します。
 */
function add_search_box_to_menu( $items, $args ) {
    if( $args->theme_location == 'primary' ){
        return $items . '<li>' . get_search_form(false) . '</li>';
    }
}
add_filter( 'wp_nav_menu_items', 'add_search_box_to_menu', 10, 2);

/**
 * 親テーマのセットアップに追加する処理を定義します。
 */
function oki2a24_twentysixteen_child_setup() {
    // デフォルトヘッダー画像を設定
    register_default_headers( array(
        'P1010303' => array(
            'url' => '%2$s/images/headers/P1010303.jpg',
            'thumbnail_url' => '%2$s/images/headers/P1010303-thumbnail.jpg',
            'description' => 'P1010303'
        ),
        'PC312989' => array(
            'url' => '%2$s/images/headers/PC312989.jpg',
            'thumbnail_url' => '%2$s/images/headers/PC312989-thumbnail.jpg',
            'description' => 'PC312989'
        ),
        'P1083464' => array(
            'url' => '%2$s/images/headers/P1083464.jpg',
            'thumbnail_url' => '%2$s/images/headers/P1083464-thumbnail.jpg',
            'description' => 'P1083464'
        ),
        'R0013152' => array(
            'url' => '%2$s/images/headers/R0013152.jpg',
            'thumbnail_url' => '%2$s/images/headers/R0013152-thumbnail.jpg',
            'description' => 'R0013152'
        )
    ) );
}
add_action( 'after_setup_theme', 'oki2a24_twentysixteen_child_setup' );