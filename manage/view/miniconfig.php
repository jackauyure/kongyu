
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" >
<head><title>
	无标题页
</title>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<link href="<?=$GLOBALS['admin_root']?>css/StyleSheet.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?=$GLOBALS['style']?>js/jquery-1.5.min.js"></script>
<script type="text/javascript" src="<?=$GLOBALS['admin_root']?>js/manage.js"></script>
<link rel="stylesheet" href="<?=$GLOBALS['admin_root']?>js/editor/themes/default/default.css" />
<script charset="utf-8" src="<?=$GLOBALS['admin_root']?>js/editor/kindeditor.js"></script>
<script charset="utf-8" src="<?=$GLOBALS['admin_root']?>js/editor/lang/zh_CN.js"></script>
<script>
        var editor;
        KindEditor.ready(function(K) {
                editor = K.create('#hdjs');
                editor = K.create('#zgbjj');
                editor = K.create('#xqyg');
                editor = K.create('#wqhg');
                editor = K.create('#xlwbojj');
                editor = K.create('#dfcydjs');
                editor = K.create('#wft');
        });
</script>
</head>
<body>
    <form name="config" method="post" action="<?=$GLOBALS['admin_root']?>index.php?action=minisite&method=setconfig" id="config">
    <table border="0" cellspacing="0" cellpadding="0" width="100%">
        <tr>
            <td background="images/righttitle_bg.gif" style="height:35px;">
                <table border="0" cellspacing="0" cellpadding="0" width="100%">
                    <tr>
                     	<td style="width:50px;" align="center"><img src="images/icon4.png"/></td>
                        <td style="height:35px;">&nbsp;<span id="ctl00_lblTitle" class="Title">基本设置</span></td>
                    </tr>
                </table>
                
            </td>
        </tr>
        <tr>
            <td >
				<table width="95%" border="0" align="center" cellpadding="5" cellspacing="0">
					<tr class="RowStyle">
						<td align="right" class="tdTitle" width="20%">本期活动</td>
						<td><input type="text" name="bqhd" value="<?=$config['bqhd']?>" maxlength="250" style="width:600px;"/></td>
					</tr>
					<tr class="RowStyle">
						<td align="right" class="tdTitle" width="20%">本期活动链接</td>
						<td><input type="text" name="bqhdlj" value="<?=$config['bqhdlj']?>" maxlength="250" style="width:600px;"/></td>
					</tr>
					<tr class="RowStyle">
						<td align="right" class="tdTitle">活动介绍</td>
						<td>
						<textarea rows="10" cols="10" id="hdjs" name="hdjs" style="width:700px;height:300px;"><?=$config['hdjs']?></textarea></td>
					</tr>
					<tr class="RowStyle">
						<td align="right" class="tdTitle">微博话题</td>
						<td>
						<textarea rows="10" cols="10" name="wbht" style="width:700px;height:100px;"><?=$config['wbht']?></textarea></td>
					</tr>
					<tr class="RowStyle">
						<td align="right" class="tdTitle">下期预告</td>
						<td>
						<textarea rows="10" cols="10" id="xqyg" name="xqyg" style="width:700px;height:300px;"><?=$config['xqyg']?></textarea></td>
					</tr>
					<tr class="RowStyle">
						<td align="right" class="tdTitle">往期回顾</td>
						<td>
						<textarea rows="10" cols="10" id="wqhg" name="wqhg" style="width:700px;height:300px;"><?=$config['wqhg']?></textarea></td>
					</tr>
					<tr class="RowStyle">
						<td align="right" class="tdTitle">中国杯简介</td>
						<td>
						<textarea rows="10" cols="10" id="zgbjj" name="zgbjj" style="width:700px;height:300px;"><?=$config['zgbjj']?></textarea></td>
					</tr>
					<tr class="RowStyle">
						<td align="right" class="tdTitle">新浪微博号简介</td>
						<td>
						<textarea rows="10" cols="10" id="xlwbojj" name="xlwbojj" style="width:700px;height:300px;"><?=$config['xlwbojj']?></textarea></td>
					</tr>
					<tr class="RowStyle">
						<td align="right" class="tdTitle">大帆船运动介绍</td>
						<td>
						<textarea rows="10" cols="10" id="dfcydjs" name="dfcydjs" style="width:700px;height:300px;"><?=$config['dfcydjs']?></textarea></td>
					</tr>
					<tr class="RowStyle">
						<td align="right" class="tdTitle">微访谈</td>
						<td>
						<textarea rows="10" cols="10" id="wft" name="wft" style="width:700px;height:300px;"><?=$config['wft']?></textarea></td>
					</tr>
					<tr class="RowStyle">
						<td align="right" class="tdTitle" width="20%">视频缩略图</td>
						<td><input type="text" name="spslt" value="<?=$config['spslt']?>" maxlength="250" style="width:600px;"/></td>
					</tr>
					<tr class="RowStyle">
						<td align="right" class="tdTitle" width="20%">视频链接</td>
						<td><input type="text" name="splj" value="<?=$config['splj']?>" maxlength="250" style="width:600px;"/></td>
					</tr>
					<tr class="RowStyle">
						<td align="right" class="tdTitle" width="20%">左侧图片1</td>
						<td><input type="text" name="zctp1" value="<?=$config['zctp1']?>" maxlength="250" style="width:600px;"/></td>
					</tr>
					<tr class="RowStyle">
						<td align="right" class="tdTitle" width="20%">左侧图片2</td>
						<td><input type="text" name="zctp2" value="<?=$config['zctp2']?>" maxlength="250" style="width:600px;"/></td>
					</tr>
					<tr class="RowStyle">
						<td align="right" class="tdTitle" width="20%">左侧图片3</td>
						<td><input type="text" name="zctp3" value="<?=$config['zctp3']?>" maxlength="250" style="width:600px;"/></td>
					</tr>
					<tr class="RowStyle">
						<td align="right" class="tdTitle" width="20%">左侧图片4</td>
						<td><input type="text" name="zctp4" value="<?=$config['zctp4']?>" maxlength="250" style="width:600px;"/></td>
					</tr>
					<tr class="RowStyle">
						<td align="right" class="tdTitle" width="20%">右侧图片1</td>
						<td><input type="text" name="yctp1" value="<?=$config['yctp1']?>" maxlength="250" style="width:600px;"/></td>
					</tr>
					<tr class="RowStyle">
						<td align="right" class="tdTitle" width="20%">右侧图片2</td>
						<td><input type="text" name="yctp2" value="<?=$config['yctp2']?>" maxlength="250" style="width:600px;"/></td>
					</tr>
					<tr class="RowStyle">
						<td align="right" class="tdTitle" width="20%">右侧图片3</td>
						<td><input type="text" name="yctp3" value="<?=$config['yctp3']?>" maxlength="250" style="width:600px;"/></td>
					</tr>
					<tr class="RowStyle">
						<td align="right" class="tdTitle" width="20%">右侧图片4</td>
						<td><input type="text" name="yctp4" value="<?=$config['yctp4']?>" maxlength="250" style="width:600px;"/></td>
					</tr>
				    <tr>
				    	<td colspan="2" align="center" height="60">
				            <input type="submit" name="submit" value=" 确 认 " id="ctl00_ContentPlaceHolder1_btnOK" class="btn1_mouseout" onmouseover="this.className='btn1_mouseover'" onmouseout="this.className='btn1_mouseout'" style="width:75px;" />
				            <input type="reset" name="reset" value=" 重 置 " class="btn1_mouseout" onmouseover="this.className='btn1_mouseover'" onmouseout="this.className='btn1_mouseout'" style="width:75px;" />
				        </td>
				    </tr>
				</table>
            </td>
        </tr>
    </table></form>
</body>
</html>