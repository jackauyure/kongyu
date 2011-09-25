<?php include 'view/header.php';?>
<div class="w1000">
<div class="container">
	<div class="leftMain fl gray">
	<div class="titlebar">页面打印<a href="#" class="print_btn"></a></div>
	<div class="content">
	    <h2><?=cstr($contentinfo['title'])?></h2>
	    <p><?=cstr($contentinfo['content'])?></p>
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