<?php 

// 取友情链接
$db	=	DB::factory();
$where	=	"lan_type = '".$GLOBALS['lantype']."' AND show_flag = '1' AND category_id = '81'";
$order	=	"show_order DESC";
$yqlink	=	$db->getAllRow("chn_news",$where,$order);
?>
<div class="footer">
  <div class="footer_nav"><a href="about.shtml">关于中国杯</a> | <a href="http://mail.chncup.com/index/index3.jsp?domainName=chncup.com&domainId=f611821927f3a65d0127f6a4a67d5866&ic=1&ifn=1&ifs=1&flag=&languageId=1">邮箱登陆</a> | <a href="http://chinasailing.com/Html/index.shtml">中国帆船网</a> | <a href="contact.shtml">联系我们</a>
<select onchange="if (this.value != ''){ window.open(this.value);}">
	<option value=''> 友情链接</option>
	<?php 
	if (!empty($yqlink)) foreach ($yqlink as $v){
		fromStr($v);
		echo "<option value='".$v['link']."'>".$v['title']."</option>";
	}
	?>
</select>
  </div>
  <div class="coypright">
    <div class="p1">主办单位：国家体育总局水上运动管理中心　　深圳市文体旅游局</div>
    <div class="p2">Copyright &copy; 2007-2010 China Cup International Regatta.Contact Email:info@chncuo.com</div>
  </div>
</div>
</body>
</html>