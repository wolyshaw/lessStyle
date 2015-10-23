<?php
// 加载主题相应 CSS 和 JS
add_action( 'wp_enqueue_scripts', 'lessStyle_theme_scripts' );
function lessStyle_theme_scripts() {
    wp_enqueue_style( 'lessStyle-css', get_template_directory_uri() . '/style.css', '14.11.26','screen' );
    wp_enqueue_style( 'font-css', '//cdn.bootcss.com/font-awesome/4.2.0/css/font-awesome.min.css', '14.11.26','screen' );
    wp_deregister_script( 'jquery' );
    wp_enqueue_script( 'jquery', '//libs.baidu.com/jquery/1.11.1/jquery.min.js',array(), '1.11.1', true);
    wp_enqueue_script( 'cookies', '//cdn.bootcss.com/jquery-cookie/1.4.1/jquery.cookie.js',array(), '15.09.30', true);
    wp_enqueue_script( 'form', '//cdn.bootcss.com/jquery.form/3.51/jquery.form.min.js',array(), '15.10.9', true);
    wp_enqueue_script( 'mainjs', get_template_directory_uri() . '/js/main.js',array(), '14.11.26', true);
}

//头像
function get_ssl_avatar($avatar) {
    $avatar = preg_replace('/.*\/avatar\/(.*)\?s=([\d]+)&.*/','<img src="https://secure.gravatar.com/avatar/$1?s=$2" class="avatar avatar-$2" height="$2" width="$2">',$avatar);
    return $avatar;
}
add_filter('get_avatar', 'get_ssl_avatar');

//登录用户浏览站点时不显示工具栏
add_filter('show_admin_bar', '__return_false');

// 移除后台 Google Font API
function remove_open_sans_from_wp_core() {
    wp_deregister_style('open-sans');
    wp_register_style('open-sans', FALSE);
    wp_enqueue_style('open-sans', '');
}
add_action('init', 'remove_open_sans_from_wp_core');

//注册导航
if ( function_exists('register_nav_menus') ) {
    register_nav_menus(array('primary' => '头部导航栏'));
}
if ( function_exists('register_nav_menus') ) {
    register_nav_menus(array('mobile' => '手机端导航'));
}
function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

function get_post_excerpt(){
    if(!$post) $post = get_post();

    $post_excerpt = $post->post_excerpt;
    if($post_excerpt == ''){
        $post_excerpt = mb_strimwidth(strip_tags(apply_filters($post_content, $post->post_content)), 0, 240,"...");
    }

    return $post_excerpt;
}

?>