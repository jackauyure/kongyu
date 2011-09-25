<?php include 'view/header.php';?>
<div class="w1000">
  <link rel="stylesheet" type="text/css" href="<?=$GLOBALS['style'] ?>picgallery/jquery.ad-gallery.css">
  <script type="text/javascript" src="<?=$GLOBALS['style'] ?>picgallery/jquery.ad-gallery.js"></script>
<script type="text/javascript">
  $(function() {
	/*  
    $('img.image1').data('ad-desc', 'Whoa! This description is set through elm.data("ad-desc") instead of using the longdesc attribute.<br>And it contains <strong>H</strong>ow <strong>T</strong>o <strong>M</strong>eet <strong>L</strong>adies... <em>What?</em> That aint what HTML stands for? Man...');
    $('img.image1').data('ad-title', 'Title through $.data');
    $('img.image4').data('ad-desc', 'This image is wider than the wrapper, so it has been scaled down');
    $('img.image5').data('ad-desc', 'This image is higher than the wrapper, so it has been scaled down');
	*/    
    var galleries = $('.ad-gallery').adGallery();
    $('#switch-effect').change(
      function() {
        galleries[0].settings.effect = $(this).val();
        return false;
      }
    );
    $('#toggle-slideshow').click(
      function() {
        galleries[0].slideshow.toggle();
        return false;
      }
    );
    $('#toggle-description').click(
      function() {
        if(!galleries[0].settings.description_wrapper) {
          galleries[0].settings.description_wrapper = $('#descriptions');
        } else {
          galleries[0].settings.description_wrapper = false;
        }
        return false;
      }
    );
  });
  </script>

  <style type="text/css">
  * {
    font-family: "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", Verdana, Arial, sans-serif;
    color: #333;
    line-height: 140%;
  }
  select, input, textarea {
    font-size: 1em;
  }
  h2 {
    margin-top: 1.2em;
    margin-bottom: 0;
    padding: 0;
    border-bottom: 1px dotted #dedede;
  }
  h3 {
    margin-top: 1.2em;
    margin-bottom: 0;
    padding: 0;
  }
  .example {
    border: 1px solid #CCC;
    background: #f2f2f2;
    padding: 10px;
  }
  ul {
    list-style-image:url(list-style.gif);
  }
  pre {
    font-family: "Lucida Console", "Courier New", Verdana;
    border: 1px solid #CCC;
    background: #f2f2f2;
    padding: 10px;
  }
  code {
    font-family: "Lucida Console", "Courier New", Verdana;
    margin: 0;
    padding: 0;
  }

  #gallery {
    padding: 30px;
    background: #e1eef5;
  }
  #descriptions {
    position: relative;
    height: 50px;
    background: #EEE;
    margin-top: 10px;
    width: 640px;
    padding: 10px;
    overflow: hidden;
  }
    #descriptions .ad-image-description {
      position: absolute;
    }
      #descriptions .ad-image-description .ad-description-title {
        display: block;
      }
  </style>
  
<div class="container">
	<div class="leftMain fl gray">
	<div class="titlebar" style="margin-bottom:10px;">页面打印<a href="#" class="print_btn"></a></div>
  
		<div id="container">
		    <div id="gallery" class="ad-gallery">
		      <div class="ad-image-wrapper">
		      </div>
		      <div class="ad-controls">
		      </div>
		      <div class="ad-nav">
		        <div class="ad-thumbs">
		          <ul class="ad-thumb-list" style="height:70px;">   
		           <?php 
		           $i=0;
		           foreach( $picsinfo as $p){ 
		           	$i++;
		           ?>      
		            <li>
		              <a href="<?=$GLOBALS['upimages'].$p['big_pic'] ?>">
		                <img height="65px" src="<?=$GLOBALS['upimages'].$p['big_pic'] ?>" title="<?=cstr($p['img_title']) ?>" class="image<?=$i ?>">
		              </a>
		            </li>
		            <?php }?>       
		          </ul>
		        </div>
		      </div>
		    </div> 
		</div>
	  
	  	
    </div>
    <!--leftMain结束-->
	
	<?php include 'view/right.php';?>
	<!--sidebar结束-->

    <div class="clearfix"></div>
</div>



</div>
<!--w1000结束--> 
<?php include 'view/foot.php';?>