<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:79:"D:\2020\mySpace\vipstar\public/../application/index\view\information\index.html";i:1611728724;s:66:"D:\2020\mySpace\vipstar\application\index\view\layout\default.html";i:1602168705;s:63:"D:\2020\mySpace\vipstar\application\index\view\common\meta.html";i:1602168705;s:66:"D:\2020\mySpace\vipstar\application\index\view\common\sidenav.html";i:1602168705;s:65:"D:\2020\mySpace\vipstar\application\index\view\common\script.html";i:1602168705;}*/ ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
<title><?php echo (isset($title) && ($title !== '')?$title:''); ?> – <?php echo $site['name']; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="renderer" content="webkit">

<?php if(isset($keywords)): ?>
<meta name="keywords" content="<?php echo $keywords; ?>">
<?php endif; if(isset($description)): ?>
<meta name="description" content="<?php echo $description; ?>">
<?php endif; ?>

<link rel="shortcut icon" href="/assets/img/favicon.ico" />

<link href="/assets/css/frontend<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.css?v=<?php echo \think\Config::get('site.version'); ?>" rel="stylesheet">

<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
<!--[if lt IE 9]>
  <script src="/assets/js/html5shiv.js"></script>
  <script src="/assets/js/respond.min.js"></script>
<![endif]-->
<script type="text/javascript">
    var require = {
        config: <?php echo json_encode($config); ?>
    };
</script>
        <link href="/assets/css/user.css?v=<?php echo \think\Config::get('site.version'); ?>" rel="stylesheet">
    </head>

    <body>

        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#header-navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo url('/'); ?>"><?php echo $site['name']; ?></a>
                </div>
                <div class="collapse navbar-collapse" id="header-navbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="<?php echo url('/'); ?>"><?php echo __('Home'); ?></a></li>
                        <li class="dropdown">
                            <?php if($user): ?>
                            <a href="<?php echo url('user/index'); ?>" class="dropdown-toggle" data-toggle="dropdown" style="padding-top: 10px;height: 50px;">
                                <span class="avatar-img"><img src="<?php echo cdnurl($user['avatar']); ?>" alt=""></span>
                            </a>
                            <?php else: ?>
                            <a href="<?php echo url('user/index'); ?>" class="dropdown-toggle" data-toggle="dropdown"><?php echo __('User center'); ?> <b class="caret"></b></a>
                            <?php endif; ?>
                            <ul class="dropdown-menu">
                                <?php if($user): ?>
                                <li><a href="<?php echo url('user/index'); ?>"><i class="fa fa-user-circle fa-fw"></i><?php echo __('User center'); ?></a></li>
                                <li><a href="<?php echo url('user/profile'); ?>"><i class="fa fa-user-o fa-fw"></i><?php echo __('Profile'); ?></a></li>
                                <li><a href="<?php echo url('user/changepwd'); ?>"><i class="fa fa-key fa-fw"></i><?php echo __('Change password'); ?></a></li>
                                <li><a href="<?php echo url('user/logout'); ?>"><i class="fa fa-sign-out fa-fw"></i><?php echo __('Sign out'); ?></a></li>
                                <?php else: ?>
                                <li><a href="<?php echo url('user/login'); ?>"><i class="fa fa-sign-in fa-fw"></i> <?php echo __('Sign in'); ?></a></li>
                                <li><a href="<?php echo url('user/register'); ?>"><i class="fa fa-user-o fa-fw"></i> <?php echo __('Sign up'); ?></a></li>
                                <?php endif; ?>

                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="content">
            <style>
    .basicinfo {
        margin: 15px 0;
    }

    .basicinfo .row > .col-xs-4 {
        padding-right: 0;
    }

    .basicinfo .row > div {
        margin: 5px 0;
    }
</style>
<div id="content-container" class="container">
    <div class="row">

        <!--<div class="col-md-3">-->
            <!--<div class="sidebar-toggle"><i class="fa fa-bars"></i></div>
<div class="sidenav" id="sidebar-nav">
    <?php echo hook('user_sidenav_before'); ?>
    <ul class="list-group">
        <li class="list-group-heading"><?php echo __('Member center'); ?></li>
        <li class="list-group-item <?php echo check_nav_active('user/index'); ?>"> <a href="<?php echo url('user/index'); ?>"><i class="fa fa-user-circle fa-fw"></i> <?php echo __('User center'); ?></a> </li>
        <li class="list-group-item <?php echo check_nav_active('user/profile'); ?>"> <a href="<?php echo url('user/profile'); ?>"><i class="fa fa-user-o fa-fw"></i> <?php echo __('Profile'); ?></a> </li>
        <li class="list-group-item <?php echo check_nav_active('user/changepwd'); ?>"> <a href="<?php echo url('user/changepwd'); ?>"><i class="fa fa-key fa-fw"></i> <?php echo __('Change password'); ?></a> </li>
        <li class="list-group-item <?php echo check_nav_active('user/logout'); ?>"> <a href="<?php echo url('user/logout'); ?>"><i class="fa fa-sign-out fa-fw"></i> <?php echo __('Sign out'); ?></a> </li>
    </ul>
    <?php echo hook('user_sidenav_after'); ?>
</div>
-->
        <!--</div>-->
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h2 class="page-header">
                        信息列表
                        <!--<a href="<?php echo url('user/profile'); ?>" class="btn btn-success pull-right"><i class="fa fa-pencil"></i>-->
                            <!--<?php echo __('Profile'); ?></a>-->
                    </h2>
                    <form name="form" action="<?php echo url('index/information/index'); ?>" id="search" class="form-inline margin-bottom" method="GET"  >
                        <div class="input-group">
                            <input type="text" class="form-control" name="search"  placeholder="标题">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">搜索</button>
                            </span>
                        </div>
                    </form>
                    <?php if(is_array($list['data']) || $list['data'] instanceof \think\Collection || $list['data'] instanceof \think\Paginator): $i = 0; $__LIST__ = $list['data'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <div class="row user-baseinfo" >
                            <div class="col-md-3 col-sm-3 col-xs-2 text-center user-center">
                                <span class="avatar-img">
                                        <img src="<?php echo cdnurl($vo['image']); ?>" alt="">
                                </span>
                            </div>
                            <div class="col-md-9 col-sm-9 col-xs-10">
                                <!-- Content -->
                                <div class="ui-content">
                                    <!-- Heading -->
                                    <h4><?php echo $vo['nickname']; ?></h4>
                                    <!-- Paragraph -->
                                    <p>
                                            <?php echo (isset($vo['title']) && ($vo['title'] !== '')?$vo['title']:''); ?>
                                    </p>
                                    <!-- Success -->
                                </div>
                            </div>

                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <!-- Content -->
                                <div class="ui-content">
                                    <div class="basicinfo">
                                        <div class="row">
                                            <div class="col-xs-4 col-md-2"><?php echo __('Money'); ?></div>
                                            <div class="col-xs-8 col-md-4">
                                                <a href="javascript:;" class="viewmoney"><?php echo $user['money']; ?></a>
                                            </div>
                                            <div class="col-xs-4 col-md-2"><?php echo __('Score'); ?></div>
                                            <div class="col-xs-8 col-md-4">
                                                <a href="javascript:;" class="viewscore"><?php echo $user['score']; ?></a>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-4 col-md-2"><?php echo __('Successions'); ?></div>
                                            <div class="col-xs-8 col-md-4"><?php echo $user['successions']; ?> <?php echo __('Day'); ?></div>
                                            <div class="col-xs-4 col-md-2"><?php echo __('Maxsuccessions'); ?></div>
                                            <div class="col-xs-8 col-md-4"><?php echo $user['maxsuccessions']; ?> <?php echo __('Day'); ?></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-4 col-md-2"><?php echo __('Logintime'); ?></div>
                                            <div class="col-xs-8 col-md-4"><?php echo date("Y-m-d H:i:s",$user['logintime']); ?></div>
                                            <div class="col-xs-4 col-md-2"><?php echo __('Prevtime'); ?></div>
                                            <div class="col-xs-8 col-md-4"><?php echo date("Y-m-d H:i:s",$user['prevtime']); ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                            <li>
                                <a href="<?php echo url('index/information/index'); ?>?limit=<?php echo $list['per_page']; ?>&page=1" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <?php $__FOR_START_376963866__=1;$__FOR_END_376963866__=$list['last_page']+1;for($i=$__FOR_START_376963866__;$i < $__FOR_END_376963866__;$i+=1){ ?>
                                <li><a href="<?php echo url('index/information/index'); ?>?limit=<?php echo $list['per_page']; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                            <?php } ?>
                            <li>
                                <a href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<script>


</script>

        </main>

        <footer class="footer" style="clear:both">
            <p class="copyright">Copyright&nbsp;©&nbsp;2017-2020 <?php echo $site['name']; ?> All Rights Reserved <a href="http://www.beian.miit.gov.cn" target="_blank"><?php echo htmlentities($site['beian']); ?></a></p>
        </footer>

        <script src="/assets/js/require<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.js" data-main="/assets/js/require-frontend<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.js?v=<?php echo htmlentities($site['version']); ?>"></script>

    </body>

</html>