<?php
/*
Template Name: 获取文章json数据
*/

$arr = array();

// 该循环只可以在index或者可以查询全部文章的页面使用
// while ( have_posts() ) : the_post();
//     $postArr = array(
//         'title'=>get_the_title(),
//         'link' =>get_the_permalink(),
//         'time' =>get_the_time('Y-m-d h:m:s')
//     );
// array_push($arr,$postArr);
// endwhile;

// echo json_encode($arr);

// 按照条件索引

$back = $_GET["callback"];

global $post; // 必需
$args = array(); // 如需排除数据可以在数组中声明
$custom_posts = get_posts($args);
foreach($custom_posts as $post) : setup_postdata($post);
    $postArr = array(
        'title'=>get_the_title(),
        'link' =>get_the_permalink(),
        'time' =>get_the_time('Y-m-d h:m:s')
    );
    array_push($arr,$postArr);
endforeach;

// 判断如果有传入callback参数返回jsonp否则传出json
if ($back != "") {
    echo $back . '(' . json_encode($arr) . ')';
} else {
    echo json_encode($arr);
}
