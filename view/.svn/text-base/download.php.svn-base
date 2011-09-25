<?php include 'view/header.php';?>
<div class="w1000">

<div class="container">
	<div class="leftMain fl gray">
        <?php 
		if (!empty($news_list)) foreach ($news_list as $val){
		 	fromStr($val);
        ?>
		<div class="titlebar"><?=$val['title']?><a class="download_btn" title="下载" target="_blank" href="<?=$GLOBALS['upimages'].$val['team_img']?>"></a></div>
        <div class="down_description"><?=$val['title']?></div>
        <?php 
		}
		?> 
    </div>    
    <!--leftMain结束-->
	
	<?php include 'view/right.php';?>
	<!--sidebar结束-->

    <div class="clearfix"></div>
</div>



</div>
<!--w1000结束--> 
<?php include 'view/foot.php';?>