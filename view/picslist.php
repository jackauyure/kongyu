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
        <a href="?action=pics&id=<?=$cate['category_id'] ?>" target="_blank" class="more" title="更多"><?=$cate['category_name']?></a></div>
      <div class="newsList">
        <table width="100%" cellspacing="0" cellpadding="0" border="0">
          <tbody>
            <tr>
            <?php 
            if (!empty($pics_list[$cate['category_id']])) foreach ($pics_list[$cate['category_id']] as $val){
			    	fromStr($val);
        	?>
              <td width="15px">&nbsp;</td>
              <td><a target="_blank" href="?action=pics&id=<?=$cate['category_id'] ?>"><img width="120" height="70" alt="<?=$val['img_title']?>" src="<?=$GLOBALS['upimages'].$val['small_pic'] ?>"></a></td>
            <?php 
            }
            ?>  
            </tr>
            <tr>
            <?php 
            if (!empty($pics_list[$cate['category_id']])) foreach ($pics_list[$cate['category_id']] as $val){
			    	fromStr($val);
        	?>
              <td></td>
              <td valign="bottom" style="height:20px;"><a target="_blank" title="<?=$val['img_title']?>" class="pic_title" href="?action=pics&id=<?=$cate['category_id'] ?>"><?=$val['img_title']?></a></td>
            <?php 
            }
            ?> 
            </tr>
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