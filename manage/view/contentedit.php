
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" >
<head><title></title>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<link href="<?=$GLOBALS['admin_root']?>css/StyleSheet.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?=$GLOBALS['style']?>js/jquery-1.5.min.js"></script>
<script type="text/javascript" src="<?=$GLOBALS['admin_root']?>js/manage.js"></script>
<link rel="stylesheet" href="<?=$GLOBALS['admin_root']?>js/editor/themes/default/default.css" />
<script type="text/javascript" src="<?=$GLOBALS['admin_root']?>js/calendar/calendar.js"></script>
<script charset="utf-8" src="<?=$GLOBALS['admin_root']?>js/editor/kindeditor.js"></script>
<script charset="utf-8" src="<?=$GLOBALS['admin_root']?>js/editor/lang/zh_CN.js"></script>
<script>
        var editor;
        KindEditor.ready(function(K) {
                editor = K.create('#content');
        });
</script>
</head>
<body>
    <form name="aspnetForm" enctype="multipart/form-data" method="post" action="<?=$GLOBALS['admin_root']?>index.php?action=content&method=editsure&id=<?=$id?>" onsubmit="javascript:return WebForm_OnSubmit();" id="aspnetForm">
    <table border="0" cellspacing="0" cellpadding="0" width="100%">
        <tr>
            <td background="images/righttitle_bg.gif" style="height:35px;">
                <table border="0" cellspacing="0" cellpadding="0" width="100%">
                    <tr>

                        <td style="width:50px;" align="center"><img src="images/icon4.png"/></td>
                        <td style="height:35px;">&nbsp;<span id="ctl00_lblTitle" class="Title"><?=$msg['newsview']?></span></td>
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
            <table width="100%" border="0" align="center" style="border: 1px solid #B2C8DF;background:#fff;">
                <tr>
                    <td colspan="2">&nbsp;</td>

                </tr>
                <tr>
                    <td align="right" class="tdTitle"><span id="ctl00_ContentPlaceHolder1_Label2"><?=$msg['title']?>:</span></td>
                    <td><?=$news['title']?></td>
                </tr>
                <tr>
                    <td align="right" class="tdTitle"><span id="ctl00_ContentPlaceHolder1_Label2">语言:</span></td>
                    <td>
						<select name="lan_type">
							<option value="1" <?=is_selected($news['lan_type'],'1')?>>中文</option>
							<option value="2" <?=is_selected($news['lan_type'],'2')?>>英文</option>
						</select>
                    </td>
                </tr>
                <tr>
                    <td align="right" class="tdTitle"><span id="ctl00_ContentPlaceHolder1_Label7"><?=$msg['content']?>:</span></td>
                    <td><textarea rows="10" cols="10" id="content" name="content" style="width:700px;height:400px;"><?=$news['content']?></textarea></td>
                </tr>
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
    </table></form>
</body>
</html>