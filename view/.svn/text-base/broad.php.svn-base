<?php include 'view/header.php';?>
<div class="w1000">

<div class="container">
	<div class="leftMain fl gray">
        <?php 
		if (!empty($category)) foreach ($category as $cate){
		 	fromStr($cate);
        ?>
		<div class="titlebar"><?=$cate['category_name']?><a class="more" title="更多" target="_blank" href="index.php?action=news&method=newslist&id=<?=$cate['category_id']?>"></a></div>
        <div class="newsList">
			<table width="100%" cellspacing="0" cellpadding="0" border="0" align="center" style="line-height:30px;" class="listTable">
	          <tbody>
        	    <?php 
			    if (!empty($news_list[$cate['category_id']])) foreach ($news_list[$cate['category_id']] as $val){
			    	fromStr($val);
        	    ?>
	            <tr>
                    <td align="right" style="width:20px;"><img src="style/images/dot.gif"></td>
                    <td valign="top" align="left">
                        <p><a href="?action=news&method=news&id=<?=$val['news_id']?>" target="_blank"><?=$val['title']?></a></p>
                    </td>
                </tr>
                <?php 
			    }
		        ?> 
	          </tbody>
	        </table>
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