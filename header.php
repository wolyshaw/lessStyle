<!DCOTYPE html>
<html>
<head>
    <title>
        <?php
        global $page, $paged;
        $site_description = get_bloginfo( 'description', 'display' );
        if ($site_description && ( is_home() || is_front_page() )) {
            bloginfo('name');
            echo " - $site_description";
        } else {
            echo trim(wp_title('',0));
            echo ' - ';
            bloginfo('name');
        }
        if ( $paged >= 2 || $page >= 2 )
        {
            echo ' - ' . sprintf( __( '第%s页' ), max( $paged, $page ) );
        }
        ?>
    </title>
    <meta http-equiv=Content-Type content="text/html;charset=utf-8">
    <meta http-equiv=X-UA-Compatible content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<?php wp_head(); ?>
<!--[if lt IE 9]>
<style type="text/css">
    a{
        color: #3a3e3f;
    }
    .loginBox{
       background:transparent;
       filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#e5ffffff,endColorstr=#e5ffffff);
       zoom: 1;
    }
</style>
<script src="//cdn.bootcss.com/html5shiv/r29/html5.min.js"></script>
<![endif]-->
</head>
<body>
<header class="header">
    <div class="headerCon comWidth clearfix">
        <div class="logo fl">
            <a href="<?php bloginfo('url'); ?>">
                <img src="http://tucdn.abcdea.com/logo/xwlongLogo.png" alt="xwlong.com logo">
            </a>
            <p><?php echo $site_description;?></p>
        </div>
        <nav class="topNav clearfix fl">
            <?php wp_nav_menu( array( 'theme_location' => 'primary','container' => 'false','items_wrap' => '%3$s')) ?>
        </nav>
        <div class="userBox fr">
            <?php if (!(current_user_can('level_0'))){ ?>
                <a href="javascript:;" class="openLogin">登录</a>
                <span>|</span>
                <a href="javascript:;">注册</a>
            <?php } else { ?>
                <a href="<?php echo home_url(); ?>/wp-admin/">管理</a>
                <span>|</span>
                <a href="<?php echo wp_logout_url( get_bloginfo('url') ); ?>" title="">退出</a>
            <?php }?>
        </div>
    </div>
</header>
<div class="loginBox">
    <div class="login">
        <form action="<?php echo get_option('home'); ?>/wp-login.php" method="post">
            <label for="username">账号：</label>
            <input type="text" id="username" class="username" name="log" placeholder="请输入用户名" value="<?php echo wp_specialchars(stripslashes($user_login), 1) ?>"  autocomplete="off" />
            <label for="userpass">密码：</label>
            <input type="password" id="userpass" class="userpass" name="pwd" placeholder="请输入密码" />
            <input class="radio" type="checkbox" name="rememberme" id="rememberme" checked="checked" value="forever">
            <label for="rememberme"><span class="checkbox radioInput nextme"></span>记住我？</label>
            <button type="submit" class="loginBtn">登录</button>
            <input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>" />
        </form>
        <a class="closeLogin" href="javascript:;"><i class="iconfont">&#xe633;</i></a>
    </div>
</div>