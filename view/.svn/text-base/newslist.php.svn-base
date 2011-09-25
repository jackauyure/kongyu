<?php include 'view/header.php';?>
<div class="w1000">

<div class="container">
	<div class="leftMain fl gray">
	    <?php 
	    if (!empty($cate)){
	    ?>
		<div class="titlebar"><h2><?=$cate['category_name']?></h2><a title="更多" class="more" target="_blank" href="?action=news"><?=$cate['category_name']?></a></div>
        <?php 
	    }
        ?>
        <div class="newsList">
      		<table width="100%" cellspacing="0" cellpadding="0" border="0" align="center" style="line-height:30px;" class="listTable">
                <tbody>
        	    <?php 
			    if (!empty($news_list)) foreach ($news_list as $val){
			    	fromStr($val);
			    	$date	=	toDate($val['news_date']);
        	    ?>
                	<tr><td align="right" style="width:20px;"><img src="style/images/dot.gif"></td><td><a href="?action=news&method=news&id=<?=$val['news_id']?>" target="_blank"><?=$val['title']?></a></td>
                	<td><?=(!empty($date))?"[".$date."]":""?></td></tr>
				<?php 
			    }
		        ?> 
			</tbody></table>
        </div>  
        <div class="pageBar">
        	<table width="100%" height="25" cellspacing="0" cellpadding="0" border="0" align="center">
                <tbody><tr>
                    <td class="turnPage" style=""><?=(!empty($news_list))?$pagehtml:''?></td>
                </tr>
            </tbody></table>
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