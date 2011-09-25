<?php include 'view/header.php';?>
<div class="w1000">

<div class="container">
	<div class="leftMain fl gray">
	<?php 
     if (!empty($category)) foreach ($category as $cate){
    	fromStr($cate);
    ?>
		<div class="titlebar">
		<h2><?=$cate['category_name']?></h2>
		<a href="?action=video&method=video&id=<?=$cate['category_id'] ?>" target="_blank" class="more" title="更多"><?=$cate['category_name']?></a></div>
        <div class="newsList">
			<div class="video_list">        
            <ul class="list6">    
            <?php 
            if (!empty($video_list[$cate['category_id']])) foreach ($video_list[$cate['category_id']] as $val){
			    	fromStr($val);
        	?>     
                <li>
                    <div class="video_Img">
                        <a target="_blank" href="?action=video&id=<?=$val['video_id'] ?>"><img width="100" height="75" alt="<?=$val['title']?>" src="<?=$GLOBALS['upvideo'].$val['screen_img'] ?>"></a>
                    </div>
                    <div class="video_title"><a target="_blank" href="?action=video&id=<?=$val['video_id'] ?>"><?=$val['title']?> </a></div>    
                </li> 
            <?php 
              }
            ?>           
            </ul>
            <div class="clearfix"></div>
        </div>
        </div>                        
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