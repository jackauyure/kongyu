<?php include 'view/header.php';?>
<div class="w1000">

<div class="container">
	<div class="leftMain fl gray">
		<div class="titlebar white"><a href="index.php">首页</a>&nbsp;&gt;&nbsp;<a href="?action=news&method=list&id=<?=$cate['category_id']?>"><?=$cate['category_name']?></a>&nbsp;&gt;&nbsp;正文</div>
        <div class="content gray article">
	        <h2><?=$news['title']?></h2>
	        <div class="article_info"><?=date('Y年m月d日',strtotime($news['news_date']))?></div>
	    	<?=$news['content']?>    
		</div>
    </div>
    
    <!--leftMain结束-->
	
	<?php include 'view/right.php';?>
	<!--sidebar结束-->

    <div class="clearfix"></div>
</div>



</div>
<!--w1000结束--> 
<?php include 'view/foot.php';?>