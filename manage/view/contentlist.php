
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" >
<head><title>
	无标题页
</title>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<link href="<?=$GLOBALS['admin_root']?>css/StyleSheet.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?=$GLOBALS['style']?>js/jquery-1.5.min.js"></script>
<script type="text/javascript" src="<?=$GLOBALS['admin_root']?>js/manage.js"></script>
</head>
<body>
    <table border="0" cellspacing="0" cellpadding="0" width="100%">
        <tr>
            <td background="<?=$GLOBALS['admin_root']?>images/righttitle_bg.gif" style="height:35px;">
                <table border="0" cellspacing="0" cellpadding="0" width="100%">
                    <tr>
                        <td style="width:50px;" align="center"><img src="images/icon4.png"/></td>
                        <td style="height:35px;">&nbsp;<span id="ctl00_lblTitle" class="Title"><?=$msg['newslist']?></span></td>

                    </tr>
                </table>
                
            </td>
        </tr>
        <tr>
            <td >
                
<table border="0" width="95%" align="center">
    <tr>
        <td>&nbsp;</td>

    </tr> 
    <tr>
        <td style="border:#ADC5DD 1px solid;background:#fff;">
        	<form action="<?=$GLOBALS['admin_root']?>index.php" method="get" name="sreach" target="rightframe">
        	<input type="hidden" name="action" value="content" />
            <table border="0" width="95%" align="center">
                <tr>       
                    <td class="tdTitle" nowrap align="right" style="height:40px;">
                        <span id="ctl00_ContentPlaceHolder1_Label1"><?=$msg['type']?>:</span></td>
                    <td>
                        <input name="type" type="text" maxlength="10" id="type" style="width:168px;" value="<?=$sctype?>"/>                        
                    </td>     
                    <td class="tdTitle" nowrap align="right" style="height:40px;">
                        <span id="ctl00_ContentPlaceHolder1_Label1"><?=$msg['name']?>:</span></td>
                    <td>
                        <input name="title" type="text" maxlength="10" id="title" style="width:168px;" value="<?=$sctitle?>"/>                        
                    </td>   
                    <td>
                        <input type="submit" name="submit" value="<?=$msg['search']?> " class="btn1_mouseout" onmouseover="this.className='btn1_mouseover'" onmouseout="this.className='btn1_mouseout'" />
                    </td>
                </tr>
            </table>
            </form>
        </td>
    </tr>
    <tr>
        <td>&nbsp;</td>

    </tr>
    <tr>
        <td>

<form action="<?=$GLOBALS['admin_root']?>index.php?action=content&method=del" method="post" name="delit" target="rightframe">  
<input type="hidden" name="action" value="news" />
            <div>
 	<table class="DataWebControlStyle" cellspacing="0" rules="all" border="1" id="ctl00_ContentPlaceHolder1_GridView1" style="width:100%;border-collapse:collapse;">
		<thead>
		<tr class="HeaderStyle">
			<th scope="col">ID</th>
			<th scope="col"><?=$msg['type']?></th>
			<th scope="col"><?=$msg['title']?></th>
			<th scope="col">&nbsp;</th>
		</tr>
		</thead>
		<tbody>
		<?php 
		if (!empty($newslist)) foreach ($newslist as $news){
			fromStr($news);
		?>
			<tr class="RowStyle">
	            <td align="center"><?=$news['chncup_id']?></td>
	            <td align="center">
	            	<a class="GridViewUrl" href="<?=$GLOBALS['admin_root']?>index.php?action=content&method=edit&id=<?=$news['chncup_id']?>"><?=$news['type']?></a>
	            </td>
	            <td align="left">
	            	<a class="GridViewUrl" href="<?=$GLOBALS['admin_root']?>index.php?action=content&method=edit&id=<?=$news['chncup_id']?>"><?=$news['title']?></a>
	            </td>
	            <td align="center">
	            	<a class="GridViewUrl" href="<?=$GLOBALS['admin_root']?>index.php?action=content&method=edit&id=<?=$news['chncup_id']?>"><?=$msg['edit']?></a>
	            	</a>
	            </td>
			</tr>
		<?php 	
		}
		?>
		</tbody>
	</table>
</div>
<table width="100%" height="25" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
        <td align="left"></td>
              <td align="right" style="padding-top:5px;"><?=$pagehtml?></td>
    </tr>
</form>
         </td>
    </tr>
</table>

            </td>
        </tr>
    </table>
</body>
</html>