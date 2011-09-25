<?php 
/*
 * 配置顶部导航
 */
$db	=	DB::factory();
// 取帆船ABC类型
$where	=	"lan_type = '".$GLOBALS['lantype']."' AND show_flag='1' AND category_type='9'";
$order	=	"show_order DESC";
$abc	=	$db->getAllRow("chn_category",$where,$order);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>中国杯</title>
<meta name="keywords" content="中国杯" />
<meta name="description" content="“中国杯”国际帆船赛是首个由中国人创办的大帆船国际赛事，是目前唯一在国内举行的大帆船赛事，也是唯一一个以“中国杯”命名的自主体育品牌赛事。" />
<link href="<?=$GLOBALS['style']?>css/main.css" rel="stylesheet" type="text/css" />
<link href="<?=$GLOBALS['style']?>css/header.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?=$GLOBALS['style']?>js/jquery-1.5.min.js"></script> 
<script type="text/javascript" src="<?=$GLOBALS['style']?>js/topbanner.js"></script>
<!--[if IE 6]>
<script type="text/javascript" src="<?=$GLOBALS['style']?>js/DD_belatedPNG.js"></script>
<script type="text/javascript">DD_belatedPNG.fix('.logo_left,.logo_right')</script>
<![endif]-->
<script type="text/javascript" src="<?=$GLOBALS['style']?>js/flowplayer-3.2.4.min.js"></script> 
</head>
<body>
<div class="topbanner">
  <div class="logo_left"></div>

  <div class="logo_right"></div>
  <div class="language"><a href="index.php">中文</a> | <a href="index.php?lang=en">English</a></div>
  <div class="slides">
    <ul class="slide-pic">
      <li class="cur"><img src="<?=$GLOBALS['style']?>images/header/topbanner1.jpg" /></li>
      <li><img src="<?=$GLOBALS['style']?>images/header/topbanner2.jpg" /></li>
      <li><img src="<?=$GLOBALS['style']?>images/header/topbanner3.jpg" /></li>

      <li><img src="<?=$GLOBALS['style']?>images/header/topbanner4.jpg" /></li>
      <li><img src="<?=$GLOBALS['style']?>images/header/topbanner5.jpg" /></li>
    </ul>
  </div>
</div>
<div class="topnav">
  <ul class="cnhome">
    <li><a href="index.php">首页</a></li>
    <li><a href="<?=$GLOBALS['www_root']?>index.php?action=news">新闻</a></li>

    <li class="togglenav"><a href="#">赛事</a>
    <div class="subnavwrap shaishi" style="display:none">
    <ul class="subnav">
      <li><a href="index.php?action=news&method=broad">船队资料</a></li>
      <li><a href="index.php?action=content&id=2">赛事公告</a></li>
      <li><a href=index.php?action=content&id=3>航行指南</a></li>
      <li><a href="index.php?action=content&id=4">比赛水域图</a></li>

      <li><a href="index.php?action=content&id=5">赛程</a></li>
      <li><a href="index.php?action=content&id=6">网上报名</a></li>
    </ul>
  </div>
    </li>
    <li class="togglenav"><a href="#">媒体</a>
    <div class="subnavwrap meiti" style="display:none">

    <ul class="subnav">
      <li><a href="index.php?action=content&id=7">媒体报名</a></li>
      <li><a href="index.php?action=content&id=8">媒体日程表</a></li>
      <li><a href="index.php?action=news&method=download">媒体包下载</a></li>
    </ul>
  </div>
    </li>

    <li class="togglenav"><a href="#">商务</a>
    <div class="subnavwrap shangwu" style="display:none">
    <ul class="subnav">
      <li><a href="index.php?action=news&method=cooplist">合作伙伴</a></li>
      <li><a href="index.php?action=content&id=9">成功案例</a></li>
    </ul>
  </div>

    </li>
    <li class="togglenav"><a href="#">视频图片</a>
    <div class="subnavwrap shipin" style="display:none">
    <ul class="subnav">
      <li><a href="index.php?action=pics&method=picslist">精彩图片</a></li>
      <li><a href="index.php?action=video&method=videolist">中国杯视频</a></li>
    </ul>

  </div>
    </li>
    <li><a href="index.php?action=content&id=10">服务中心</a></li>
    <li class="togglenav"><a href="#">关于中国杯</a>
    <div class="subnavwrap about" style="display:none">
    <ul class="subnav">
      <li><a href="index.php?action=content&id=12">2011中国杯</a></li>

      <li><a href="index.php?action=content&id=11">关于中国杯</a></li>
    </ul>
  </div>
    </li>
    <li class="togglenav"><a href="#">帆船ABC</a>
    <div class="subnavwrap fanchuan" style="display:none">
    <ul class="subnav">
      <?php 		
      if (!empty($abc)) foreach ($abc as $v){
      	fromStr($v);
      	echo "<li><a href='index.php?action=news&method=newslist&id=".$v['category_id']."'>".$v['category_name']."</a></li>";
      }
      ?>
    </ul>
  </div>
    </li>
  </ul>
</div>