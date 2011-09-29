<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>康浚针织</title>
<meta name="keywords" content="康浚针织" />
<meta name="description" content="康浚针织" />
<link href="<?=$GLOBALS['style']?>css/main.css" rel="stylesheet" type="text/css" />
<link href="<?=$GLOBALS['style']?>css/header.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?=$GLOBALS['style']?>js/jquery-1.5.min.js"></script> 
<!--[if IE 6]>
<script type="text/javascript" src="<?=$GLOBALS['style']?>js/DD_belatedPNG.js"></script>
<script type="text/javascript">DD_belatedPNG.fix('.logo_left,.logo_right')</script>
<![endif]-->
</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<!-- ImageReady Slices (关于康.jpg) -->
<table id="__01" border="0" cellpadding="0" cellspacing="0" align="center">
	<tr>
		<td colspan="3">
			<img src="<?=$GLOBALS['style']?>images/companyablum_01.gif" alt="" usemap="#MapTop"></td>
	</tr>
	<tr>
		<td>
			<img src="<?=$GLOBALS['style']?>images/companyablum_02.gif" alt="" usemap="#Left"></td>
		<td width="739" height="825" valign="top">
			<table width="700"  border="0" cellspacing="20" cellpadding="0" align="center">
              <tr>
                <td><table width="100%"  border="0" cellspacing="0" cellpadding="10">
                  <tr>
					<?
					$i=0;
					if (!empty($news_list)) foreach ($news_list as $v){
						$i++;
					?>
                    <td height="180" align="center" valign="top"><a href="<?=$GLOBALS['upimages'].$v["team_img"]?>" target="_blank"><table cellspacing="4" bgcolor="#f0dfd5">
                    <tr><td><img src="<?=$GLOBALS['upimages'].'s_'.$v["team_img"]?>" width="160" height="107" border=0 /></td></tr></table><a></td>
					<?
						if($i%3 == 0){
							echo '</tr><tr>';
						}
					}	
					?>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td align="right" valign="top"><?if (!empty($news_list)){echo $pagehtml;}?></td>
              </tr>
            </table>
		</td>
		<td>
			<img src="<?=$GLOBALS['style']?>images/companyablum_04.gif" alt=""></td>
	</tr>
	<tr>
		<td colspan="3">
			<img src="<?=$GLOBALS['style']?>images/companyablum_05.gif" alt=""></td>
	</tr>
	<? include 'view/end.php'?>
</table>
<!-- End ImageReady Slices -->
<map name="MapTop">
  <area shape="rect" coords="261,49,369,79" 	href="<?=$GLOBALS['url'][0]?>">
  <area shape="rect" coords="55,92,94,112" 		href="<?=$GLOBALS['url'][1]?>">
  <area shape="rect" coords="101,92,140,112" 	href="<?=$GLOBALS['url'][2]?>">
  <area shape="rect" coords="381,50,500,77" 	href="<?=$GLOBALS['url'][3]?>">
  <area shape="rect" coords="530,49,610,77" 	href="<?=$GLOBALS['url'][4]?>">
  <area shape="rect" coords="641,48,687,77" 	href="<?=$GLOBALS['url'][5]?>">
  <area shape="rect" coords="718,48,769,79" 	href="<?=$GLOBALS['url'][6]?>">
  <area shape="rect" coords="794,51,864,78" 	href="<?=$GLOBALS['url'][7]?>">
  <area shape="rect" coords="885,48,970,82" 	href="<?=$GLOBALS['url'][8]?>">
</map>
<map name="Left" id="Left">
  <area shape="rect" coords="49,29,228,57" href="<?=$GLOBALS['url'][14]?>">
  <area shape="rect" coords="50,65,228,95" href="<?=$GLOBALS['url'][15]?>">
</map>
</body>
</html>