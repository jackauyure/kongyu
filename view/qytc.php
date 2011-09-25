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
<table id="__01" width="1024" height="744" border="0" cellpadding="0" cellspacing="0" align="center">
	<tr>
		<td colspan="3">
			<img src="<?=$GLOBALS['style']?>images/qytc_01.gif" width="1024" height="134" alt="" usemap="#MapTop"></td>
	</tr>
	<tr>
		<td>
			<img src="<?=$GLOBALS['style']?>images/qytc_02.gif" width="194" height="816" alt="" usemap="#Left"></td>
		<td width="798" height="816" valign="top">
			<table width="600"  border="0" cellspacing="20" cellpadding="0" align="center">
              <tr>
                <td><table width="100%"  border="0" cellspacing="0" cellpadding="10">
                  <tr>
					<?
					$i=0;
					if (!empty($news_list)) foreach ($news_list as $v){
						$i++;
					?>
                    <td align="center" valign="top"><a href="<?=$GLOBALS['upimages'].$v["team_img"]?>" target="_blank"><img src="<?=$GLOBALS['upimages'].'s_'.$v["team_img"]?>" border=0 width="200" /><a></td>
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
			<img src="<?=$GLOBALS['style']?>images/qytc_04.gif" width="32" height="816" alt=""></td>
	</tr>
	<tr>
		<td colspan="3">
			<img src="<?=$GLOBALS['style']?>images/qytc_05.gif" width="1024" height="30" alt=""></td>
	</tr>
	<? include 'view/end.php'?>
</table>
<!-- End ImageReady Slices -->
<map name="MapTop">
  <area shape="rect" coords="281,52,349,77" 	href="<?=$GLOBALS['url'][0]?>">
  <area shape="rect" coords="55,92,94,112" 		href="<?=$GLOBALS['url'][1]?>">
  <area shape="rect" coords="101,92,140,112" 	href="<?=$GLOBALS['url'][2]?>">
  <area shape="rect" coords="379,50,456,78" 	href="<?=$GLOBALS['url'][3]?>">
  <area shape="rect" coords="475,49,570,79" 	href="<?=$GLOBALS['url'][4]?>">
  <area shape="rect" coords="593,49,675,80" 	href="<?=$GLOBALS['url'][5]?>">
  <area shape="rect" coords="702,49,753,80" 	href="<?=$GLOBALS['url'][6]?>">
  <area shape="rect" coords="779,49,865,77" 	href="<?=$GLOBALS['url'][7]?>">
  <area shape="rect" coords="892,49,965,78" 	href="<?=$GLOBALS['url'][8]?>">
</map>
<map name="Left" id="Left">
  <area shape="rect" coords="49,29,158,57" href="<?=$GLOBALS['url'][14]?>">
  <area shape="rect" coords="50,65,159,95" href="<?=$GLOBALS['url'][15]?>">
</map>
</body>
</html>