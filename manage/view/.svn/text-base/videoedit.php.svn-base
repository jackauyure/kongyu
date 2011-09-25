<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head><title></title>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<link href="<?=$GLOBALS['admin_root']?>css/StyleSheet.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?=$GLOBALS['www_root']?>js/jquery-1.5.min.js"></script>
<script type="text/javascript" src="<?=$GLOBALS['admin_root']?>js/manage.js"></script>
<script type="text/javascript" src="<?=$GLOBALS['admin_root']?>js/calendar/calendar.js"></script>
<link rel="stylesheet" href="<?=$GLOBALS['admin_root']?>js/editor/themes/default/default.css" />
<script charset="utf-8" src="<?=$GLOBALS['admin_root']?>js/editor/kindeditor.js"></script>
<script charset="utf-8" src="<?=$GLOBALS['admin_root']?>js/editor/lang/zh_CN.js"></script>
<script>
        var editor;
        KindEditor.ready(function(K) {
                editor = K.create('#descr');
        });
</script>
</head>
<body>
    <form name="aspnetForm" method="post" action="<?=$GLOBALS['admin_root']?>index.php?action=video&method=actpost" onsubmit="javascript:return WebForm_OnSubmit();" id="aspnetForm" enctype="multipart/form-data">
    <table border="0" cellspacing="0" cellpadding="0" width="100%">
        <tr>
            <td background="images/righttitle_bg.gif" style="height:35px;">
                <table border="0" cellspacing="0" cellpadding="0" width="100%">
                    <tr>
                        <td style="width:50px;" align="center"><img src="images/icon4.png"/></td>
                        <td style="height:35px;">&nbsp;<span id="ctl00_lblTitle" class="Title"><?=$msg['videoview']?></span></td>
                    </tr>
                </table>                
            </td>
        </tr>
        <tr>
            <td >
<table width="95%" border="0" align="center">
    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>
            <input type="hidden" name="act" value=<?=$found ? 'edit' : 'add' ?> />
              <?php if($found){?>
                 <input type="hidden" name="video_id" value="<?=$videoinfo['video_id']?>" />
              <?php }?>
            <table width="100%" border="0" align="center" style="border: 1px solid #B2C8DF;background:#fff;">
                <tr>
                    <td colspan="2">&nbsp;</td>

                </tr>             
                <tr>
                    <td align="right" class="tdTitle"><span id="ctl00_ContentPlaceHolder1_Label2"><?=$msg['title']?>:</span></td>
                    <td>
                        <input name="title" type="text" maxlength="250" id="title" value="<?=$found ? cstr($videoinfo['title']) : '' ?>" style="width:470px;" />
                        <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator1" style="color:Red;visibility:hidden;">*</span>
                    </td>
                </tr>      
                <tr>
                    <td align="right" class="tdTitle"><span id="ctl00_ContentPlaceHolder1_Label5"><?=$msg['videodate']?>:</span></td>
                    <td>
                         <input name="video_date" type="text" value="<?=$found ? date('Y-m-d H:i',strtotime($videoinfo['video_date'])) : '' ?>" maxlength="16" id="news_date" class="Wdate" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm',skin:'whyGreen'})" style="width:175px;" />
                         <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator3" style="color:Red;visibility:hidden;">*</span>
                    </td>
                </tr>              
                <tr>
                    <td align="right" class="tdTitle"><span id="ctl00_ContentPlaceHolder1_Label7"><?=$msg['content']?>:</span></td>
                    <td><textarea rows="10" cols="10"  id="descr" name="descr" style="width:700px;height:400px;"><?=$found ? cstr($videoinfo['desc']) : '' ?></textarea></td>
                </tr>
                <tr>
                    <td align="right" class="tdTitle" style="width:180px;">
                        <span id="ctl00_ContentPlaceHolder1_Label1"><?=$msg['videotype']?>:</span></td>
                    <td>
                        <select name="category_id" id="category_id">
							<?php 
							if (!empty($categorylist)) foreach ($categorylist as $key=>$val){
								echo "<option value='$key'>$val</option>";
							}
							?>
						</select>                              
                    </td>
                </tr>
                <tr>
                    <td align="right" class="tdTitle"><span id="ctl00_ContentPlaceHolder1_Label6"><?=$msg['show']?>:</span></td>
                    <td class="tdTitle">
                        <select name="show_flag" id="show_flag" style="width:86px;">
							<option <?=$found && $videoinfo['show_flag']==1 ? 'selected="selected"' : ''?> value="1"><?=$msg['yes']?></option>
							<option <?=$found && $videoinfo['show_flag']==0 ? 'selected="selected"' : ''?> value="0"><?=$msg['no']?></option>						
						</select>            
                    </td>
                </tr>
                <tr>
                    <td align="right" class="tdTitle"><span id="ctl00_ContentPlaceHolder1_Label6">是否首页:</span></td>
                    <td class="tdTitle">
                        <select name="isindex" id="isindex" style="width:86px;">
							<option <?=$found && $videoinfo['isindex']==1 ? 'selected="selected"' : ''?> value="1"><?=$msg['yes']?></option>
							<option <?=$found && $videoinfo['isindex']==0 ? 'selected="selected"' : ''?> value="0"><?=$msg['no']?></option>						
						</select>            
                    </td>
                </tr>
                <tr>
                    <td align="right" class="tdTitle"><span id="ctl00_ContentPlaceHolder1_Label6"><?=$msg['videoimg']?>:</span></td>
                    <td class="tdTitle">
                       <input type="file" name="videoimg" />          
                    </td>
                </tr>
                <?php if($found){?>
	                <tr>
	                    <td align="right" class="tdTitle"><span id="ctl00_ContentPlaceHolder1_Label6"></span></td>
	                    <td class="tdTitle">             
	                       <input type="hidden" name="screen_img" value="<?=$found ? $videoinfo['screen_img'] : '' ?>"/>  
	                       <img src="<?=$GLOBALS['upvideo'].$videoinfo['screen_img']?>" width="100" height="100" />  
	                       <br><?=$GLOBALS['upvideo'].$videoinfo['screen_img']?>                        
	                    </td>
	                </tr>
                <?php }?>  
                <tr>
                    <td align="right" class="tdTitle"><span id="ctl00_ContentPlaceHolder1_Label6"><?=$msg['videofile']?>:</span></td>
                    <td class="tdTitle">
                       <input type="file" name="videofile" />            
                    </td>
                </tr>
                <?php if($found){?>
	                <tr>	                
	                    <td align="right" class="tdTitle"><span id="ctl00_ContentPlaceHolder1_Label6"></span></td>
	                    <td class="tdTitle">
	                       <input type="hidden" name="flv_name" value="<?=$found ? $videoinfo['flv_name'] : '' ?>" />
	                       <div id="mediaplayer" style="width:200px;height:200px;"></div>
	                       <br><?=$GLOBALS['upvideo'].$videoinfo['flv_name']?>           
	                    </td>
	                    <script type="text/javascript" src="<?=$GLOBALS['www_root']?>style/js/flowplayer-3.2.4.min.js"></script>
						<script language="JavaScript">					
							flowplayer("mediaplayer", "<?=$GLOBALS['www_root']?>style/swf/flowplayer-3.2.4.swf",  {
								playlist: [
									{
										url: '<?=$GLOBALS['upvideo'].$videoinfo['screen_img']?>', //封面图片
										scaling: 'fit'
									},
									{
										url: '<?=$GLOBALS['upvideo'].$videoinfo['flv_name']?>',                                       
										autoPlay: false, 
										autoBuffering: true
									}
								]
							});
						</script>
	                </tr>
                <?php }?> 
            </table>
        </td>
    </tr>   
    <tr>
        <td colspan="2" align="center" style="height: 60px">
            <input type="submit" name="submit" value="<?=$msg['submit']?>" onclick="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$ContentPlaceHolder1$btnOK&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, false))" id="ctl00_ContentPlaceHolder1_btnOK" class="btn1_mouseout" onmouseover="this.className='btn1_mouseover'" onmouseout="this.className='btn1_mouseout'" style="width:75px;" />
            <input type="button" name="cancel" value="<?=$msg['chanel']?>" id="cancel" class="btn1_mouseout" onmouseover="this.className='btn1_mouseover'" onmouseout="this.className='btn1_mouseout'" style="width:75px;" />
        </td>
    </tr>  
    <tr>
        <td colspan="2">&nbsp;</td>
    </tr>
</table>
</td>
</tr>
</table>
</form>
</body>
</html>