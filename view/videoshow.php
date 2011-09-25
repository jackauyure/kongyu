<?php include 'view/header.php';?>
<div class="w1000">

<div class="container">
	<div class="leftMain fl gray">
		<div class="titlebar white"><a href="index.php?action=video&method=videolist">视频</a>&nbsp;&gt;&nbsp;正文</div>
        <div class="content gray article">
	        <h2><?=$videoinfo['title']?></h2>
	        <div class="article_info"><?=date('Y年m月d日',strtotime($videoinfo['video_date']))?></div>
	        
	        <div id="player" style="width:500px;height:400px;"></div>
	        
	        <script type="text/javascript" src="<?=$GLOBALS['www_root']?>style/js/flowplayer-3.2.4.min.js"></script>
			<script language="JavaScript">					
				flowplayer("player", "<?=$GLOBALS['www_root']?>style/swf/flowplayer-3.2.4.swf",  {
					playlist: [
						{
							url: '<?=$GLOBALS['upvideo'].$videoinfo['screen_img']?>', 
							scaling: 'fit'
						},
						{
							url: '<?=$GLOBALS['upvideo'].$videoinfo['flv_name']?>',                                       
							autoPlay: true, 
							autoBuffering: true
						}
					]
				});
			</script>
	        <br />
	    	<?=$videoinfo['desc']?>    
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