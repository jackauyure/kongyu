<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head><title></title>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<link href="<?=$GLOBALS['admin_root']?>css/StyleSheet.css" rel="stylesheet" type="text/css" /></head>
<body>
<script type="text/javascript" src="<?=$GLOBALS['style']?>js/jquery-1.5.min.js"></script>
<script type="text/javascript" src="<?=$GLOBALS['admin_root']?>js/manage.js"></script>  
    <table border="0" cellspacing="0" cellpadding="0" width="100%">    
        <tr>
            <td background="<?=$GLOBALS['admin_root']?>images/righttitle_bg.gif" style="height:35px;">
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
		<form action="<?=$GLOBALS['admin_root']?>index.php?action=category&method=addsure&catetype=<?=$this->catetype?>" method="post"  target="rightframe">
       		<table border="0" width="95%" align="center">
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
		         <td align="right" class="tdTitle"><span id="ctl00_ContentPlaceHolder1_Label2"><?=$msg['name']?>:</span></td><td><input type="text" name="category_name" value="" /></td>
		        </tr> 
		         <tr>
		         <td align="right" class="tdTitle"><span id="ctl00_ContentPlaceHolder1_Label2"><?=$msg['isshow']?>:</span></td>
		         <td>
		           <select name="show_flag">
		              <option value="1" ><?=$msg['yes']?></option>
		              <option value="0" ><?=$msg['no']?></option>
		           </select>
		         </td>
		        </tr> 	            	        
			    <tr>
			        <td colspan="2" align="center" style="height: 41px">
			            <input type="submit" name="" value="<?=$msg['submit']?>"  class="btn1_mouseout" onmouseover="this.className='btn1_mouseover'" onmouseout="this.className='btn1_mouseout'" style="width:70px;" />                      
			        </td>
			    </tr>
			</table>
		  </form>	
		</td>
        </tr>
    </table>
 
</body>
</html>