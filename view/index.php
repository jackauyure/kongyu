<?php include 'view/header.php';?>
<div class="w1000">
  <div class="b1">
    <div class="Block_l">
    
      <div class="focus">
        <?php
        $i	=	0; 
        if (!empty($pic_news)) foreach ($pic_news as $news){
        	fromStr($news);
        	$i++;
        	if ($i == 1){
        		$display	=	' style="display:none;"';
        	}
        ?>
        <div class="focusPic" <?=$display?>><a href="?action=news&method=news&id=<?=$news['news_id']?>" target="_blank"><img src="<?=$GLOBALS['upimages'].$news['team_img']?>" width="350" height="236" /></a></div>
        <?php
        }
        $i	=	0; 
        if (!empty($pic_news)) foreach ($pic_news as $news){
        	fromStr($news);
        	$i++;
        	if ($i == 1){
        		$display	=	' style="display:none;"';
        	}
        ?>
        <span class="focus_title" <?=$display?>><a href="?action=news&method=news&id=<?=$news['news_id']?>" target="_blank"><?=$news['title']?></a></span> 
        <?php 
        }
        ?>
        <span class="focus_num"><a href="#">1</a><a href="#">2</a><a href="#">3</a><a href="#">4</a></span> 
      </div>
      <script>
		//视点
		var n = 0;
		change_img();
		function change_img(){
			setFocus(n);
			setTimeout('change_img()',3000);
		}
		function setFocus(i){
		if(i>3){n=0;i=0;}
		$('.focus .focusPic').hide();
		$('.focus .focusPic').eq(i).show();
		$('.focus .focus_num a').removeClass('cur');
		$('.focus .focus_num a').eq(i).addClass('cur');
		$('.focus .focus_title').hide();
		$('.focus .focus_title').eq(i).show();
		n++;
		}
		$(".focus .focus_num a").hover(function(){
			$('.focus .focus_num a').removeClass('cur');
			$(this).addClass('cur');
			setFocus($(this).index())
		});
	  </script>
	  
      <div id="player" class="video m-t15" style="width:350px;height:224px;"> </div>
      <script language="JavaScript">
        flowplayer("player", "<?=$GLOBALS['style']?>swf/flowplayer-3.2.4.swf",  {
            playlist: [
                {
                    url: '<?=isset($index_video[0]) ? $GLOBALS['upvideo'].$index_video[0]['screen_img'] : 'http://2010.chncup.com/cup/5/b322b86879294957b93df53496912f56.jpg'; ?>', 
                    scaling: 'fit'
                },
                {
                    url: '<?=isset($index_video[0]) ? $GLOBALS['upvideo'].$index_video[0]['flv_name']  :  'http://2010.chncup.com/cup/3/a7bfae0dc0f241a7bc2e7e5352b249d0.flv'; ?>', 
                    autoPlay: false, 
                    autoBuffering: true 
                }
            ]
        });
     </script>
        
      <div class="event m-t15">
        <div><a href="http://2010.chncup.com/blue/index.aspx" target="_blank"><img src="style/images/event1.jpg" height="56" border="0" /></a></div>
        <div class="m-t5"><a href="http://2010.chncup.com/golf/index.aspx" target="_blank"><img src="style/images/event2.jpg" height="56" border="0" /></a></div>
        <div class="m-t5"><a href="http://2010.chncup.com/music/index.aspx" target="_blank"><img src="style/images/event3.jpg" height="56" border="0" /></a></div>
        <div style="margin-top:6px;"><a href="http://2010.chncup.com/forum/index.aspx" target="_blank"><img src="style/images/event4.jpg" height="56" border="0" /></a></div>
      </div>

    </div>
    <!--Block_l结束-->
    
    <div class="Block_m">
      <div class="mBox1">
        <div class="titlebar">
          	<?php 
          	if (!empty($index_category)){
          	?>
          <h2><?=$index_category['category_name']?></h2>
          <a href="?action=news&method=newslist&id=<?=$index_category['category_id']?>" target="_blank" class="more" title="更多"><?=$index_category['category_name']?></a></div>
          	<?php
          	}
          	?>
        <div class="headline">

          <div class="inner">
          	<?php 
          	if (!empty($index_news)){
          	?>
          	<h3><a href="?action=news&method=news&id=<?=$index_news['news_id']?>" target="_blank" class="blue"><?=$index_news['title']?></a></h3>
            <p><?=$index_news['short_title']?>...</p>
          	<?php
          	}
          	?>
         </div>
        </div>
        <div class="inner" style="padding:6px 15px;;">
          <ul style="border-bottom:#1c509e dashed 2px;width:100%;padding-bottom:5px;margin-bottom:7px;">
            <li class="blue"><em class="fr"><a href="article.shtml" target="_blank">点击下载</a></em><span>08.30</span><a href="article.shtml" target="_blank">中国杯驾驶培训学员成沃</a></li>
			 <?php
			 $i	=	0; 
			 if (!empty($index_news_list)) foreach ($index_news_list as $val){
			 	fromStr($val);
			 	$i++;
			 ?>
			 <li><span><?=date('m.d',strtotime($val['news_date']))?></span><span>[<?=$val['tiny_title']?>]</span><a href="?action=news&method=news&id=<?=$val['news_id']?>" target="_blank"><?=$val['title']?></a></li>
	         <?php 
	         	if ($i == 5){
	         		echo '</ul><ul>';
	         	}
			 }
			 ?>
		  </ul>
        </div>
      </div>
      <div class="weibo m-t15">
        <div class="titlebar">
          <h2>中国杯官方微博</h2>
          <a href="list.shtml" target="_blank" class="more" title="更多">微博</a></div>
      </div>
    </div>

    <!--Block_m结束-->
    
    <div class="Block_r">
      <div class="countdown" style=" background:url(style/images/time.png)"><span style="font-family:Tahoma; font-size:35px; color:#f1f3f7; position:relative;top:27px;left:175px;">72</span></div>
      <div class="team m-t15">
        <div class="titlebar">
          <h2>参赛船队</h2>
          <a href="MatchTeamList.shtml" target="_blank" class="more" title="更多">参赛船队</a></div>

        <table cellpadding="0" cellspacing="2" width="100%" border="0" bgcolor="#1c509e">
          <tr>
            <th scope="col" class="t_flag">国旗</th>
            <th scope="col" class="t_name">船队</th>
            <th scope="col" class="t_flag">国旗</th>
            <th scope="col" class="t_name">船队</th>
          </tr>

          <tr>
            <td><img src="demo/a.gif" border="0" /></td>
            <td>美国曼哈顿队</td>
            <td><img src="demo/a.gif" border="0" /></td>
            <td>美国曼哈顿队</td>
          </tr>
          <tr>
            <td><img src="demo/a.gif" border="0" /></td>

            <td>美国曼哈顿队</td>
            <td><img src="demo/a.gif" border="0" /></td>
            <td>美国曼哈顿队</td>
          </tr>
          <tr>
            <td><img src="demo/a.gif" border="0" /></td>
            <td>美国曼哈顿队</td>

            <td><img src="demo/a.gif" border="0" /></td>
            <td>美国曼哈顿队</td>
          </tr>
          <tr>
            <td><img src="demo/a.gif" border="0" /></td>
            <td>美国曼哈顿队</td>
            <td><img src="demo/a.gif" border="0" /></td>
            <td>美国曼哈顿队</td>

          </tr>
          <tr>
            <td><img src="demo/a.gif" border="0" /></td>
            <td>美国曼哈顿队</td>
            <td><img src="demo/a.gif" border="0" /></td>
            <td>美国曼哈顿队</td>
          </tr>
          <tr>

            <td><img src="demo/a.gif" border="0" /></td>
            <td>美国曼哈顿队</td>
            <td><img src="demo/a.gif" border="0" /></td>
            <td>美国曼哈顿队</td>
          </tr>
        </table>
      </div>
      <div class="schedule m-t15">

        <div class="titlebar">
          <h2>中国杯赛事日程表</h2>
          <a href="MatchSchedule.shtml" target="_blank" class="more" title="更多">日程表</a></div>
        <table cellpadding="0" cellspacing="2" width="100%" border="0" bgcolor="#1c509e" height="292">
          <tr>
            <td valign="middle" width="60">9月9日<br />
              星期五</td>

            <td valign="middle" class="s_item"><table cellpadding="0" cellspacing="0" width="100%" border="0">
                <tr>
                  <td>10:00 开始</td>
                  <td>辛普森深港拉力赛</td>
                </tr>
                <tr>
                  <td>10:00-20:30</td>

                  <td>辛普森深港拉力赛</td>
                </tr>
                <tr>
                  <td>10:00-20:30</td>
                  <td>辛普森深港拉力赛</td>
                </tr>
              </table></td>

          </tr>
          <tr>
            <td valign="middle" width="60">9月9日<br />
              星期五</td>
            <td valign="middle" class="s_item"><table cellpadding="0" cellspacing="0" width="100%" border="0">
                <tr>
                  <td>10:00 开始</td>

                  <td>辛普森深港拉力赛</td>
                </tr>
                <tr>
                  <td>10:00-20:30</td>
                  <td>辛普森深港拉力赛</td>
                </tr>
                <tr>

                  <td>10:00-20:30</td>
                  <td>辛普森深港拉力赛</td>
                </tr>
              </table></td>
          </tr>
          <tr>
            <td valign="middle" width="60">9月9日<br />

              星期五</td>
            <td valign="middle" class="s_item"><table cellpadding="0" cellspacing="0" width="100%" border="0">
                <tr>
                  <td>10:00 开始</td>
                  <td>辛普森深港拉力赛</td>
                </tr>
                <tr>

                  <td>10:00-20:30</td>
                  <td>辛普森深港拉力赛</td>
                </tr>
                <tr>
                  <td>10:00-20:30</td>
                  <td>辛普森深港拉力赛</td>
                </tr>

              </table></td>
          </tr>
          <tr>
            <td valign="middle" width="60">9月9日<br />
              星期五</td>
            <td valign="middle" class="s_item"><table cellpadding="0" cellspacing="0" width="100%" border="0">
                <tr>
                  <td>10:00 开始</td>

                  <td>辛普森深港拉力赛</td>
                </tr>
                <tr>
                  <td>10:00-20:30</td>
                  <td>辛普森深港拉力赛</td>
                </tr>
                <tr>

                  <td>10:00-20:30</td>
                  <td>辛普森深港拉力赛</td>
                </tr>
              </table></td>
          </tr>
        </table>
      </div>
    </div>

    <!--Block_r结束-->
    <div class="clearfix"></div>
  </div>
  <div class="b2 m-t15">
    <div class="titlebar">
      <h2>精彩图片</h2>
      <a href="index.php?action=pics" target="_blank" class="more" title="更多">精彩图片</a></div>
    <table cellpadding="2" cellspacing="0" width="100%" border="0" bgcolor="#ffffff">
      <tr>
      <?php foreach ($index_bottom_pics as $bp) {?>
        <td><a href="index.php?action=pics&id=<?=$bp['category_id']?>" target="_blank"><img src="<?=$GLOBALS['upimages'].$bp['small_pic'] ?>" width="188px" height="114px" border="0" /></a></td>
      <?php }?>  
      </tr>
    </table>

    <div class="history">
      <div style="padding-left:0;"><a href="http://2007.chncup.com/" target="_blank"><img src="style/images/index/2007.jpg" border="0" width="247" height="50" /></a></div>
      <div><a href="http://2008.chncup.com/" target="_blank"><img src="style/images/index/2008.jpg" border="0" width="247" height="50" /></a></div>
      <div><a href="http://2009.chncup.com/" target="_blank"><img src="style/images/index/2009.jpg" border="0" width="247" height="50" /></a></div>
      <div><a href="http://2010.chncup.com/" target="_blank"><img src="style/images/index/2010.jpg" border="0" width="247" height="50" /></a></div>
    </div>
  </div>
  <div class="partner m-t15">
    <div class="titlebar">

      <h2>合作伙伴</h2>
      <a href="sponsorlist.shtml" target="_blank" class="more" title="更多">合作伙伴</a></div>
    <table cellpadding="0" cellspacing="0" width="100%" border="0" bgcolor="#ffffff">
      <tr valign="middle" align="center" class="first_Line">
        <th width="100">官方合作伙伴</th>
        <td width="115"><a target="_blank" href="http://www.audi.cn/"><img border="0" width="115" alt="一汽-大众奥迪" src="http://2010.chncup.com/cup/8/129320365454389998.jpg"></a></td>
        <td width="72"><a target="_blank" href="http://www.beneteau.cn"><img border="0" width="72" alt="博纳多" src="http://2010.chncup.com/cup/8/129348674273650000.jpg"></a></td>

        <td width="122"><a target="_blank" href="http://www.qq.com/"><img border="0" width="122" alt="腾讯" src="http://2010.chncup.com/cup/8/129320360005639998.jpg"></a></td>
        <td width="90"><a target="_blank" href="http://www.simpsonmarine.com/"><img border="0" width="90" alt="SIMPSON" src="http://2010.chncup.com/cup/8/129320360971889998.jpg"></a></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr valign="middle" align="center">
        <th>官 方 供 应 商</th>

        <td colspan="8" align="left" valign="bottom"><div class="footerLink"><a target="_blank" href="http://www.sol.com.mx"><img border="0" alt="苏尔" src="http://2010.chncup.com/cup/8/129322146992902500.jpg"></a></div>
          <div class="footerLink"><a target="_blank" href="http://www.wines-info.com/Helanmountian/"><img border="0" alt="贺兰山" src="http://2010.chncup.com/cup/8/129322069697590000.jpg"></a></div>
          <div class="footerLink"><a target="_blank" href="http://www.chivas.com.cn/"><img border="0" alt="芝华士" src="http://2010.chncup.com/cup/8/129322069276496250.jpg"></a></div>
          <div class="footerLink"><a target="_blank" href="http://www.c-estbon.com/"><img border="0" alt="怡宝" src="http://2010.chncup.com/cup/8/129322071022590000.jpg"></a></div>
          <div class="footerLink"><a target="_blank" href="http://opa.c-estbon.com"><img border="0" alt="零帕" src="http://2010.chncup.com/cup/8/129322071117902500.jpg"></a></div>
          <div class="footerLink"><a target="_blank" href="http://www.septwolves.com/"><img border="0" alt="七匹狼" src="http://2010.chncup.com/cup/8/129308927642178750.jpg"></a></div>
          <div class="footerLink"><a target="_blank" href="http://www.actochina.com/"><img border="0" alt="雅图" src="http://2010.chncup.com/cup/8/129125834033906250.jpg"></a></div>
          <div class="footerLink"><a target="_blank" href="http://www.szyfy.net/"><img border="0" alt="永丰源" src="http://2010.chncup.com/cup/8/129150984366250000.gif"></a></div>
          <div class="footerLink"><a target="_blank" href="http://www.sinotrans.com/"><img border="0" alt="中外运" src="http://2010.chncup.com/cup/8/129150984994843750.jpg"></a></div>

          <div class="footerLink"><a target="_blank" href="http://www.centuryseaviewgolf.com/"><img border="0" alt="世纪海景" src="http://2010.chncup.com/cup/8/129125833022187500.jpg"></a></div>
          <div class="footerLink"><a target="_blank" href="http://www.500wan.com/"><img border="0" alt="500WAN" src="http://2010.chncup.com/cup/8/129322070660402500.jpg"></a></div
    ></td>
      </tr>
      <tr valign="middle" align="center">
        <th>战略合作媒体</th>
        <td colspan="8" style="padding-top:15px;"><div class="footerLink"><a target="_blank" href="http://www.sztv.com.cn/"><img border="0" alt="深圳卫视" src="http://2010.chncup.com/cup/8/129181954765625000.jpg"></a></div>
          <div class="footerLink"><a target="_blank" href="http://www.china-boating.com/"><img border="0" alt="中华宝艇" src="http://2010.chncup.com/cup/8/129181955467031250.jpg"></a></div>
          <div class="footerLink"><a target="_blank" href="http://www.asia-pacificboating.com/"><img border="0" alt="亚太宝艇" src="http://2010.chncup.com/cup/8/129181955257343750.jpg"></a></div>

          <div class="footerLink"><a target="_blank" href="http://www.neweekly.com.cn/"><img border="0" alt="新周刊" src="http://2010.chncup.com/cup/8/129181954112500000.jpg"></a></div>
          <div class="footerLink"><a target="_blank" href="http://www.nddaily.com/"><img border="0" alt="南方都市报" src="http://2010.chncup.com/cup/8/129181954932500000.jpg"></a></div>
          <div class="footerLink"><a target="_blank" href="http://www.sichina.com/"><img border="0" alt="体育画报" src="http://2010.chncup.com/cup/8/129181955720156250.jpg"></a></div>
          <div class="footerLink"><a target="_blank" href="http://www.bundpic.com/"><img border="0" alt="外滩画报" src="http://2010.chncup.com/cup/8/129181955981093750.jpg"></a></div>
          <div class="footerLink"><a target="_blank" href="http://a10016880970.oinsite1.cn/"><img border="0" alt="汽车优悦广播" src="http://2010.chncup.com/cup/8/129309120280402732.jpg"></a></div>
          <div class="footerLink"><a target="_blank" href="http://www.robbreport.cn/"><img border="0" alt="罗博报告" src="http://2010.chncup.com/cup/8/129181953545468750.jpg"></a></div>
          <div class="footerLink"><a target="_blank" href="http://www.bjnews.com.cn/"><img border="0" alt="新京报" src="http://2010.chncup.com/cup/8/129181953721718750.jpg"></a></div>
          <div class="footerLink"><a target="_blank" href="http://www.titan24.com/"><img border="0" alt="体坛传媒" src="http://2010.chncup.com/cup/8/129322095096027500.jpg"></a></div>
          <div class="footerLink"><a target="_blank" href="http://www.nbweekly.com/"><img border="0" alt="南都周刊" src="http://2010.chncup.com/cup/8/129302149636251250.bmp"></a></div>

          <div class="footerLink"><a target="_blank" href="http://www.youku.com/"><img border="0" alt="优酷网" src="http://2010.chncup.com/cup/8/129302146601251250.bmp"></a></div>
          <div class="footerLink"><a target="_blank" href="http://www.airmedia.net.cn/"><img border="0" alt="航美传媒" src="http://2010.chncup.com/cup/8/129302148007501250.bmp"></a></div>
          <div class="footerLink"><a target="_blank" href="http://newspaper.jfdaily.com/xwcb/"><img border="0" alt="新闻晨报" src="http://2010.chncup.com/cup/8/129181953922187500.jpg"></a></div>
          <div class="footerLink"><a target="_blank" href="http://www.life-element.com.cn/"><img border="0" alt="生活元素" src="http://2010.chncup.com/cup/8/129302150248126250.bmp"></a></div>
          <div class="footerLink"><a target="_blank" href="http://www.51bwhd.com/show.php?contentid=1376"><img border="0" alt="富甲天下" src="http://2010.chncup.com/cup/8/129302221726876250.bmp"></a></div>
          <div class="footerLink"><a target="_blank" href="http://www.sixthmedia.net/"><img border="0" alt="第六媒体" src="http://2010.chncup.com/cup/8/129181956214218750.jpg"></a></div></td>
      </tr>
    </table>
  </div>
</div>
<!--w1000结束--> 
<?php include 'view/foot.php';?>