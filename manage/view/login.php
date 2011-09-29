

<html xmlns="http://www.w3.org/1999/xhtml" >
<head><title>
	用户登录-中国杯帆船赛网站后台管理
</title><meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<style type="text/css">
    .titleFont
    {
        color:#000;
        font-size:14px;
    }
     .btn1_mouseout {
BORDER-RIGHT: #ADC5DD 1px solid; PADDING-RIGHT: 2px; 
BORDER-TOP: #ADC5DD 1px solid; PADDING-LEFT: 2px; 
FONT-SIZE: 12px; FILTER: progid:DXImageTransform.Microsoft.Gradient(GradientType=0,StartColorStr=#ffffff, EndColorStr=#CCF7FD ); 
BORDER-LEFT: #ADC5DD 1px solid; CURSOR: hand; COLOR: #1A6ECA; PADDING-TOP: 2px; 
BORDER-BOTTOM: #ADC5DD 1px solid;
height:25px;
}
.btn1_mouseover {
BORDER-RIGHT: #ADC5DD 1px solid; PADDING-RIGHT: 2px; 
BORDER-TOP: #ADC5DD 1px solid; PADDING-LEFT: 2px; 
FONT-SIZE: 12px; FILTER: progid:DXImageTransform.Microsoft.Gradient(GradientType=0, StartColorStr=#CCF7FD, EndColorStr=#ffffff); 
BORDER-LEFT: #ADC5DD 1px solid; CURSOR: hand; COLOR: #1A6ECA; PADDING-TOP: 2px; 
BORDER-BOTTOM: #ADC5DD 1px solid;
height:25px;
}
    body {
	background-color: #002779;
}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<body>
    <form name="form1" method="post" action="<?=$GLOBALS['admin_root']?>index.php?action=login&method=dologin" onsubmit="javascript:return WebForm_OnSubmit();" id="form1">
<div></div>
    <div>
    <table width="100%" height="80%" border="0"  align="center">

	<tr><td valign="middle" align="center">
		<table border="0" cellspacing="1" cellpadding="1" width="681" height="383" align="center"  background="images/login.jpg" style='background-repeat:no-repeat;background-position:center'>
		    <tr>
		        <td style="height:100px;" colspan="3"></td>
		    </tr>
            <tr>
                <td rowspan="2" style="width:200px;">&nbsp;</td>
              <td height="62" valign="bottom">&nbsp;              </td>
                       <td rowspan="2" style="width:10px;">&nbsp;</td>
            </tr>
            <tr>
              <td><table border="0" cellpadding="0" width="400">
                <tr>
                  <td align="right" style="width:100px;">
                    <label for="tbxUserName" id="UserNameLabel" class="titleFont">用户名：</label>
                  </td>
                  <td align="Left" style="width:300px;">
                    <input name="username" type="text" id="username" style="width:112px;" />
                    <span id="UserNameRequired" title="必须填写“用户名”。" style="color:Red;visibility:hidden;">*</span> </td>
                </tr>
                <tr>
                  <td align="right">
                    <label for="Password" id="PasswordLabel" class="titleFont">密　码：</label>
                  </td>
                  <td align="Left">
                    <input name="password" type="password" id="password" style="width:112px;" />
                    <span id="PasswordRequired" title="必须填写“密码”。" style="color:Red;visibility:hidden;">*</span> </td>
                </tr>
                <tr>
                  <td align="right"> <span class="titleFont" id="Label1">验证码：</span></td>
                  <td height="22" align="Left">
                    <input type="text" style="width:50px;" id="checkcode" maxlength="4" name="checkcode">
                    <span style="color:Red;visibility:hidden;" title="必须填写“验证码”。" id="RequiredFieldValidator1">*</span> <img width="46" height="20" onclick="this.src=this.src+'&'" alt="看不清？点击更换" src="<?=$GLOBALS['www_root']?>index.php?method=getCode" style="cursor:hand;" id="imgVerify"> </td>
                </tr>
                <tr>
                  <td>&nbsp</td>
                  <td height="42">
                    <input type="image" name="ImageButton1" id="ImageButton1" Title="登录" src="images/btn_login.png" onclick="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ImageButton1&quot;, &quot;&quot;, true, &quot;Login1&quot;, &quot;&quot;, false, false))" style="border-width:0px;" />
                  </td>
                </tr>
                <tr>
                  <td align="center" colspan="2" style="color: red"> </td>
                </tr>
                <tr> </tr>
              </table></td>
            </tr>
          </table>
                </td>
      </tr>
      </table>
    </div>
    

<script type="text/javascript">

</script>
</form>
</body>

</html>