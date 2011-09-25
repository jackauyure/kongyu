
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" >
<head><title>
	无标题页
</title>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<link href="<?=$GLOBALS['admin_root']?>css/StyleSheet.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?=$GLOBALS['style']?>js/jquery-1.5.min.js"></script>
<script type="text/javascript" src="<?=$GLOBALS['admin_root']?>js/manage.js"></script>
<script type="text/javascript" src="<?=$GLOBALS['admin_root']?>js/calendar/calendar.js"></script>
<link rel="stylesheet" href="<?=$GLOBALS['admin_root']?>js/editor/themes/default/default.css" />
<script charset="utf-8" src="<?=$GLOBALS['admin_root']?>js/editor/kindeditor.js"></script>
<script charset="utf-8" src="<?=$GLOBALS['admin_root']?>js/editor/lang/zh_CN.js"></script>
<script>
        var editor;
        KindEditor.ready(function(K) {
                editor = K.create('#img_desc');
        });
</script>
</head>
<body>
    <form id="formall" method="post" action="<?=$GLOBALS['admin_root']?>index.php?action=pics&method=actpost" enctype="multipart/form-data">
    <table border="0" cellspacing="0" cellpadding="0" width="100%">
        <tr>
            <td background="images/righttitle_bg.gif" style="height:35px;">
                <table border="0" cellspacing="0" cellpadding="0" width="100%">
                    <tr>
                     	<td style="width:50px;" align="center"><img src="images/icon4.png"/></td>
                        <td style="height:35px;">&nbsp;<span id="ctl00_lblTitle" class="Title">图片管理</span></td>
                    </tr>
                </table>              
            </td>
        </tr>
        <tr>
            <td >
		        <?php if($found){ ?>
		            <input type="hidden" name="img_id" value="<?=$imginfo['img_id'] ?>" />
		        <?php }?>
                <input type="hidden" name="act" value="<?php echo $found ? 'edit' : 'add'?>" /> 
				<table width="95%" border="0" align="center" cellpadding="5" cellspacing="0">
					<tr class="RowStyle">
						<td align="right" class="tdTitle" width="20%">图片标题</td>
						<td><input type="text" id="img_title" name="img_title" value="<?=$found ? cstr($imginfo['img_title']) : ''?>" maxlength="250" style="width:600px;"/></td>
					</tr>
					<tr class="RowStyle">
						<td align="right" class="tdTitle" width="20%">图片分类</td>
						<td>
						  <select name="category_id">
							<option value="">-- 图片分类 --</option>
							<?php 
							$sort = $found ? $imginfo['category_id'] : $sort;
							if (!empty($st)) foreach ($st as $k=>$v){
								$select	=	is_selected($k,$sort);
								echo "<option value='{$k}' {$select}>".cstr($st[$k]['category_name'])."</option>";
							}
							?>
						  </select> 						
						</td>
					</tr>
					<tr class="RowStyle">
	                    <td align="right" class="tdTitle"><span id="ctl00_ContentPlaceHolder1_Label5">日期:</span></td>
	                    <td>
	                         <input name="img_date" type="text" value="<?=$found ? date('Y-m-d H:i',strtotime($imginfo['img_date'])) : '' ?>" maxlength="16" id="news_date" class="Wdate" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm',skin:'whyGreen'})" style="width:175px;" />
	                         <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator3" style="color:Red;visibility:hidden;">*</span>
	                    </td>
                    </tr>
					<tr class="RowStyle">
	                    <td align="right" class="tdTitle"><span id="ctl00_ContentPlaceHolder1_Label6">显示标记:</span></td>
	                    <td class="tdTitle">
	                        <select name="show_flag" id="show_flag" style="width:86px;">
								<option <?=$found && $imginfo['show_flag']==1 ? 'selected="selected"' : ''?> value="1">是</option>
								<option <?=$found && $imginfo['show_flag']==0 ? 'selected="selected"' : ''?> value="0">否</option>						
							</select>            
	                    </td>
	                </tr>
	                <tr class="RowStyle">
	                    <td align="right" class="tdTitle"><span id="ctl00_ContentPlaceHolder1_Label6">是否首页:</span></td>
	                    <td class="tdTitle">
	                        <select name="index_flag" id="index_flag" style="width:86px;">
								<option <?=$found && $imginfo['index_flag']==1 ? 'selected="selected"' : ''?> value="1">是</option>
								<option <?=$found && $imginfo['index_flag']==0 ? 'selected="selected"' : ''?> value="0">否</option>						
							</select> 
							<span style="margin-left:10px;">(底部精彩图片)</span>           
	                    </td>
	                </tr>			
					<tr class="RowStyle">
                    <td align="right" class="tdTitle"><span id="ctl00_ContentPlaceHolder1_Label7">图片描述:</span></td>
                    <td><textarea rows="10" cols="10"  id="img_desc" name="img_desc" style="width:700px;height:400px;"><?=$found ? cstr($imginfo['img_desc']) : '' ?></textarea></td>
                    </tr>
					<tr class="RowStyle">
						<td align="right" class="tdTitle">选择文件</td>
						<td>
						<input type="file" name="imgfile" maxlength="250" style="width:600px;"/></td>
					</tr>
					<?php if($found){?>
					<tr class="RowStyle">
						<td align="right" class="tdTitle">图片预览</td>
						<td><img width="100" height="100" src="<?=$GLOBALS['upimages'].$imginfo['small_pic']?>" />
						<br>大图：<?=$GLOBALS['upimages'].$imginfo['big_pic']?>
						<br>小图：<?=$GLOBALS['upimages'].$imginfo['small_pic']?>
						</td>					
					</tr>				
					<input type="hidden" name="big_pic" value="<?= $imginfo['big_pic'] ?>" />	
					<input type="hidden" name="small_pic" value="<?= $imginfo['small_pic'] ?>" />
					<?php }?>	
				    <tr>
				    	<td colspan="2" align="center" height="60">
				            <input type="submit" value=" 确 认 " id="ctl00_ContentPlaceHolder1_btnOK" class="btn1_mouseout" onmouseover="this.className='btn1_mouseover'" onmouseout="this.className='btn1_mouseout'" style="width:75px;" />
				            <input type="reset"  value=" 重 置 " class="btn1_mouseout" onmouseover="this.className='btn1_mouseover'" onmouseout="this.className='btn1_mouseout'" style="width:75px;" />
				        </td>
				    </tr>
				</table>
            </td>
        </tr>
    </table>
 </form>
</body>
</html>