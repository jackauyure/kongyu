
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
    <form name="aspnetForm" enctype="multipart/form-data" method="post" action="<?=$GLOBALS['admin_root']?>index.php?action=news&method=editsure&id=<?=$news_id?>&catetype=<?=$this->catetype?>" onsubmit="javascript:return WebForm_OnSubmit();" id="aspnetForm">
    <table border="0" cellspacing="0" cellpadding="0" width="100%">
        <tr>
            <td background="images/righttitle_bg.gif" style="height:35px;">
                <table border="0" cellspacing="0" cellpadding="0" width="100%">
                    <tr>

                        <td style="width:50px;" align="center"><img src="images/icon4.png"/></td>
                        <td style="height:35px;">&nbsp;<span id="ctl00_lblTitle" class="Title"><?=$msg['news'.$this->catetype]?></span></td>
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
                <?php 
                if (in_array('type', $allow)){
                ?>
                <tr>
                    <td align="right" class="tdTitle" style="width:180px;">
                        <span id="ctl00_ContentPlaceHolder1_Label1"><?=$msg['newstype']?>:</span></td>
                    <td>
                        <select name="category_id" id="category_id">
							<?php 
							if (!empty($categorylist)) foreach ($categorylist as $key=>$val){
								$select	=	is_selected($news['category_id'],$key);
								echo "<option value='$key' $select>$val</option>";
							}
							?>
						</select>                              
                    </td>
                </tr>
                <?php 
                }
                if (in_array('title', $allow)){
                ?>
                <tr>
                    <td align="right" class="tdTitle"><span id="ctl00_ContentPlaceHolder1_Label2"><?=$msg['title']?>:</span></td>
                    <td>
                        <input name="title" type="text" maxlength="250" id="title" style="width:470px;" value="<?=$news['title']?>" />
                        <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator1" style="color:Red;visibility:hidden;">*</span>

                    </td>
                </tr>
                <?php 
                }
                if (in_array('tiny', $allow)){
                ?>
                <tr>
                    <td align="right" class="tdTitle"><span id="ctl00_ContentPlaceHolder1_Label2"><?=$msg['tiny']?>:</span></td>
                    <td>
                        <input name="tiny_title" type="text" maxlength="250" id="tiny_title" style="width:100px;" value="<?=$news['tiny_title']?>" />
                        <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator1" style="color:Red;visibility:hidden;">*</span>

                    </td>
                </tr>
                <?php 
                }
                if (in_array('shorttitle', $allow)){
                ?>
                <tr>
                    <td align="right" class="tdTitle"><span id="ctl00_ContentPlaceHolder1_Label3"><?=$msg['shorttitle']?>:</span></td>
                    <td>
                        <textarea name="short_title" rows="2" cols="20" id="short_title" style="height:69px;width:470px;"><?=$news['short_title']?></textarea>
                        <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator2" style="color:Red;visibility:hidden;">*</span> 
                    </td>

                </tr>
                <?php 
                }
                if (in_array('keyword', $allow)){
                ?>
                <tr>
                    <td align="right" class="tdTitle"><span id="ctl00_ContentPlaceHolder1_Label4"><?=$msg['keyword']?>:</span></td>
                    <td>
                        <input name="key_word" type="text" maxlength="200" id="key_word" style="width:253px;" value="<?=$news['key_word']?>" />
                        <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator4" style="color:Red;visibility:hidden;">*</span>
                    </td>
                </tr>
                <?php 
                }
                if (in_array('order', $allow)){
                ?>
                <tr>
                    <td align="right" class="tdTitle"><span id="ctl00_ContentPlaceHolder1_Label4"><?=$msg['order']?>:</span></td>
                    <td>
                        <input name="show_order" type="text" maxlength="200" id="show_order" style="width:60px;" value="<?=$news['show_order']?>" />
                        <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator4" style="color:Red;visibility:hidden;">*</span>
                    </td>
                </tr>
                <?php 
                }
                if (in_array('newsdate', $allow)){
                ?>
                <tr>
                    <td align="right" class="tdTitle"><span id="ctl00_ContentPlaceHolder1_Label5"><?=$msg['newsdate']?>:</span></td>
                    <td>
                         <input name="news_date" type="text" maxlength="16" id="news_date" class="Wdate" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm',skin:'whyGreen'})" style="width:175px;" value="<?=toDate($news['news_date'])?>" />
                         <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator3" style="color:Red;visibility:hidden;">*</span>
                    </td>
                </tr>
                <?php 
                }
                if (in_array('show', $allow)){
                ?>
                <tr>

                    <td align="right" class="tdTitle"><span id="ctl00_ContentPlaceHolder1_Label6"><?=$msg['show']?>:</span></td>
                    <td class="tdTitle">
                        <select name="show_flag" id="show_flag" style="width:86px;">
							<option value="1" <?php echo is_selected($news['show_flag'], 1)?>><?=$msg['yes']?></option>
							<option value="0" <?php echo is_selected($news['show_flag'], 0)?>><?=$msg['no']?></option>
						</select>            
                    </td>
                </tr>
                <?php 
                }
                if (in_array('content', $allow)){
                ?>
                <tr>
                    <td align="right" class="tdTitle"><span id="ctl00_ContentPlaceHolder1_Label7"><?=$msg['content']?>:</span></td>
                    <td><textarea rows="10" cols="10" id="content" name="content" style="width:700px;height:400px;"><?=$news['content']?></textarea></td>
                </tr>
                <?php 
                }
                if (in_array('toindex', $allow)){
                ?>
                <tr>
                    <td align="right" class="tdTitle"><span id="ctl00_ContentPlaceHolder1_Label7"><?=$msg['toindex']?>:</span></td>
                    <td>
                    <select name="index_flag" id="index_flag" style="width:86px;">
						<option value="1" <?php echo is_selected($news['index_flag'], '1')?>><?=$msg['yes']?></option>
						<option value="0" <?php echo is_selected($news['index_flag'], '0')?>><?=$msg['no']?></option>
					</select>  
					</td>
                </tr>
                <?php 
                }
                if (in_array('tofocus', $allow)){
                ?>
                <tr>
                    <td align="right" class="tdTitle"><span id="ctl00_ContentPlaceHolder1_Label7"><?=$msg['tofocus']?>:</span></td>
                    <td>
                    <select name="focus_flag" id="focus_flag" style="width:86px;">
						<option value="1" <?php echo is_selected($news['focus_flag'], '1')?>><?=$msg['yes']?></option>
						<option value="0" <?php echo is_selected($news['focus_flag'], '0')?>><?=$msg['no']?></option>
					</select>  
					</td>
                </tr>
                <?php 
                }
                if (in_array('topic', $allow)){
                ?>
                <tr>
                    <td align="right" class="tdTitle"><span id="ctl00_ContentPlaceHolder1_Label7"><?=$msg['topic']?>:</span></td>
                    <td>
                    <select name="pic_flag" id="pic_flag" style="width:86px;">
						<option value="1" <?php echo is_selected($news['pic_flag'], '1')?>><?=$msg['yes']?></option>
						<option value="0" <?php echo is_selected($news['pic_flag'], '0')?>><?=$msg['no']?></option>
					</select>  
					</td>
                </tr>
                <?php 
                }
                if (in_array('link', $allow)){
                ?>
                <tr>
                    <td align="right" class="tdTitle"><span id="ctl00_ContentPlaceHolder1_Label7"><?=$msg['link']?>:</span></td>
                    <td><input name="link" type="text" maxlength="200" value="<?=$news['link'] ?>" id="link" style="width:470px;" /></td>
                </tr>
                <?php 
                }
                if (in_array('upload', $allow)){
                ?>
                <tr>
                    <td align="right" class="tdTitle"><span id="ctl00_ContentPlaceHolder1_Label7"><?=$msg['upload']?>:</span></td>
                    <td><input type="file" style="width:600px;" maxlength="250" name="imgfile"></td>
                </tr>
                <?php 
                	$link	=	trim($news['team_img']);
                	if (!empty($link)){
                ?>
                <tr>
                    <td align="right" class="tdTitle"></td>
                    <td><a href="<?=$GLOBALS['upimages'].$link?>" target="_blank"><?=$msg['see']?></a></td>
                </tr>
                <?php 
                	}
                }
                ?>
            </table>
        </td>
    </tr>
    
    <tr>

        <td colspan="2" align="center" style="height: 60px">
            <input type="submit" name="submit" value="<?=$msg['submit']?>" onclick="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$ContentPlaceHolder1$btnOK&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, false))" id="ctl00_ContentPlaceHolder1_btnOK" class="btn1_mouseout" onmouseover="this.className='btn1_mouseover'" onmouseout="this.className='btn1_mouseout'" style="width:75px;" />
            <input type="button" name="cancel" value="<?=$msg['chanel']?>" id="cancel" class="btn1_mouseout" onmouseover="this.className='btn1_mouseover'" onmouseout="this.className='btn1_mouseout'" style="width:75px;" onclick="history.go(-1)"/>
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