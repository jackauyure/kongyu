<?php include 'view/header.php';?>
<div class="w1000">

<div class="container">
	<div class="leftMain fl gray">
	    <?php 
	    if (!empty($cate)){
	    ?>
		   <div class="titlebar"><h2><?=$cate['category_name']?></h2></div>
		<?php 
	    }
        ?>
        <div class="newsList">
			<div class="video_list">           
            <ul class="list6">   
               <?php 
			    if (!empty($video_list)) foreach ($video_list as $val){
			    	fromStr($val);
        	    ?>              
                <li>
                    <div class="video_Img">
                        <a href="?action=video&id=<?=$val['video_id'] ?>"><img width="100" height="75" alt="<?=$val['title']?>" src="<?=$GLOBALS['www_root'].'video/'.$val['screen_img']?>"></a>
                    </div>
                    <div class="video_title"><a href="?action=video&id=<?=$val['video_id'] ?>"><?=$val['title']?></a></div>    
                </li>
				<?php 
			    }
		        ?>                                              
            </ul>
            <div class="clearfix"></div>
        </div>
        </div> 
        <div class="pageBar">
        	<table width="100%" height="25" cellspacing="0" cellpadding="0" border="0" align="center">
                <tbody><tr>
                    <td class="turnPage" style=""><?=$pagehtml?></td>
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