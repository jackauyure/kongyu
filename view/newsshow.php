<?php include 'view/header.php';?>
<div class="w1000">

<div class="container">
	<div class="leftMain fl gray">
	    <?php 
	    if (!empty($category)) foreach ($category as $cate){
	    	fromStr($cate);
	    ?>
		<div class="titlebar"><h2><?=$cate['category_name']?></h2><a title="更多" class="more" target="_blank" href="?action=news&method=newslist&id=<?=$cate['category_id']?>"><?=$cate['category_name']?></a></div>
        <div class="newsList">
        	<ul>
        	    <?php 
			    if (!empty($news_list[$cate['category_id']])) foreach ($news_list[$cate['category_id']] as $val){
			    	fromStr($val);
        	    ?>
            	<li><span><?=date('m.d',strtotime($val['news_date']))?></span><span>[<?=$val['tiny_title']?>]</span><a href="?action=news&method=news&id=<?=$val['news_id']?>" target="_blank"><?=$val['title']?></a></li>
	         	<?php 
			    }
		        ?> 
            </ul>
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