
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" >
<head><title>
	无标题页
</title><meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<link href="<?=$GLOBALS['admin_root']?>css/StyleSheet.css" rel="stylesheet" type="text/css" /></head>
<body>

    <div>
    <table width="100%" border="0" cellspacing="0" cellpadding="0" background="<?=$GLOBALS['admin_root']?>images/head_bg.gif">

        <tr align="center" valign="middle">
            <td style="width: 66px; height: 30px">
                <a href="../" target="_top" class="navLink"><?=$msg['return']?></a>
            </td>
            <td style="width: 23px;">
            </td>
            <td style="width: 61px; ">
                <a href="#" onclick="if (confirm ('是否确定退出系统?')) {top.location.href='<?=$GLOBALS['admin_root']?>index.php?action=login&method=loginout'}"
                     class="navLink">退出管理</a></td>

        </tr>
    </table>
    </div>
    <div id="head1" class="headClass">
        <table border="0" width="80%" style="height:100%;" align="center">
            <tr>
                <td><a class="articleTitle" href="javascript:ShowContent(1)" >网站基本设置</a></td>
                <td width="40"><a href="javascript:ShowContent(1)" ><img src="images/icon1.png" id="Img1" border="0"/></a></td>
            </tr>
        </table>
    </div>
    <div class="menu_list2" id="content1">
        <ul>               
            <li>
                <table border="0" width="80%" style="height:100%;" align="center">
                    <tr>
                        <td width="20"><img src="images/icon3.png" /> </td>
                        <td><a href="index.php?action=content" class="navLink" target="rightframe">信息管理</a></td>                        
                    </tr>
                </table>
            </li>  
        </ul>
    </div>
    <div id="head2" class="headClass">

        <table border="0" width="80%" style="height:100%;" align="center">
            <tr>
                <td><a class="articleTitle" href="javascript:ShowContent(2)" >网站图片管理</a></td>
                <td width="40"><a href="javascript:ShowContent(2)" ><img src="images/icon1.png" id="Img2" border="0"/></a></td>
            </tr>
        </table>
    </div>
    <div class="menu_list2" id="content2">

        <ul>               
            <li>
                <table border="0" width="80%" style="height:100%;" align="center">
                    <tr>
                        <td width="20"><img src="images/icon3.png" /> </td>
                        <td><a href="index.php?action=category&catetype=2" class="navLink" target="rightframe">图片分类管理</a></td>                        
                    </tr>
                </table>
            </li>                        
            <li>

                <table border="0" width="80%" style="height:100%;" align="center">
                    <tr>
                        <td width="20"><img src="images/icon3.png" /> </td>
                        <td><a href="index.php?action=news&catetype=2"  class="navLink" target="rightframe">图片列表</a></td>                        
                    </tr>
                </table>
            </li>
        </ul>
    </div>
    <!-- mini站点管理 -->
    <div id="head9" class="headClass">
        <table border="0" width="80%" style="height:100%;" align="center">
            <tr>
                <td><a class="articleTitle" href="javascript:ShowContent(10)" >MINI站点管理</a></td>
                <td width="40"><a href="javascript:ShowContent(10)" ><img src="images/icon1.png" id="Img10" border="0"/></a></td>
            </tr>
        </table>
    </div>
    <div class="menu_list2" id="content10" style="display:none;">
        <ul>               
           <li>
                <table border="0" width="80%" style="height:100%;" align="center">
                    <tr>
                        <td width="20"><img src="images/icon3.png" /> </td>
                        <td><a href="index.php?action=minisite" class="navLink" target="rightframe">基本信息设置</a></td>                        
                    </tr>
                </table>
            </li>     
           <li>
                <table border="0" width="80%" style="height:100%;" align="center">
                    <tr>
                        <td width="20"><img src="images/icon3.png" /> </td>
                        <td><a href="index.php?action=miniweibo" class="navLink" target="rightframe">微博展示设置</a></td>                        
                    </tr>
                </table>
            </li>                                      
        </ul>
    </div>
    <!-- mini站点管理结束 -->
</body>
</html>
<script type="text/javascript" language="javascript">
function ShowContent(nValue)
{
    var strButtonName = "Img" + nValue;
    var strContentName = "content" + nValue;
	if(document.getElementById(strContentName).style.display == "")
	{
		document.getElementById(strContentName).style.display = "none";
		document.getElementById(strButtonName).setAttribute("src","images/icon2.png");
	}
	else
	{
		document.getElementById(strButtonName).setAttribute("src","images/icon1.png");
		document.getElementById(strContentName).style.display = "";	
	}
}
function enablePngImages() {
 var imgArr = document.getElementsByTagName("IMG");
 for(i=0; i<imgArr.length; i++){
  if(imgArr[i].src.toLowerCase().lastIndexOf(".png") != -1){
   imgArr[i].style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='" + imgArr[i].src + "', sizingMethod='auto')";
   imgArr[i].src = "images/space.gif";
  }
  
  if(imgArr[i].currentStyle.backgroundImage.lastIndexOf(".png") != -1){
   var img = imgArr[i].currentStyle.backgroundImage.substring(5,imgArr[i].currentStyle.backgroundImage.length-2);
   imgArr[i].style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='"+img+"', sizingMethod='crop')";
   imgArr[i].style.backgroundImage = "url(images/space.gif)";
  }
 }
}

function enableBgPngImages(bgElements){
 for(i=0; i<bgElements.length; i++){
  if(bgElements[i].currentStyle.backgroundImage.lastIndexOf(".png") != -1){
   //alert(bgElements[i]);
   var img = bgElements[i].currentStyle.backgroundImage.substring(5,bgElements[i].currentStyle.backgroundImage.length-2);
   bgElements[i].style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='"+img+"', sizingMethod='crop')";
   bgElements[i].style.backgroundImage = "url(image/space.gif)";
  }
 }
}
</script>


<script type='text/javascript'>
var arVersion = navigator.appVersion.split("MSIE")
var version = parseFloat(arVersion[1]) 

if ((version >= 5.5 && version < 8.0) && (document.body.filters)) {
    var bgElements;
     enablePngImages();
     if(bgElements){
      enableBgPngImages(bgElements);
     }
 }
</script>