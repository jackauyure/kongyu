<?php
/*
==========================================================
==  File Name   : ImageRSI.class.php                    ==
==  Author      : Haiyuan Liu                           ==
==  Date        : 2006-01                               ==
==  Descript    : 类定义： 图形验证码                   ==
==========================================================
*/

/*
图形验证码类定义
*/
error_reporting(E_ALL &~E_NOTICE);
class ImageRSI {

    var $Width      = 50;           //图片宽
    var $Height     = 16;           //图片高
    var $Length     = 4;            //验证码位数
    var $BgColor    = "#EFEFFF";    //背景色
    var $Noise      = true;         //生成杂点
    var $NoiseNum   = 40;           //杂点数量
    var $Border     = false;        //边框
    var $BorderColor = "#000000";   //边框颜色

    var $TTF = false;               //使用TTF字体
    var $TFonts = array( "1.ttf", "2.ttf", "3.ttf", "4.ttf" );

    var $Chars   = array();         //验证码范围（字母数字）

    var $Code    = "";              //验证码
    var $Image   = "";              //图形对象

    function ImageRSI(){
        //构造验证码字符集合，数字+大写字母（不含字母O）
        $this->Chars[] = "0123456789";
        $s = "";
       // for ($c=ord('A');$c<=ord('Z');$c++){
       //     if (chr($c)!='O') $s.= chr($c);
       // }
         for ($c=0;$c<=9;$c++){
             $s.=$c;
        }
		
		$this->Chars[] = $s;
    }

    //指定验证码
    function SetRSI( $code ){
        $this->Code = $code;
        $this->Length = strlen( $code );    //根据指定验证码重新计算位数
    }

    //生成随机验证码
    function RandRSI( $len=0 ){
        $this->Code = "";
        if ($len>0 && $len!=$this->Length){
            $this->Length = $len;
        }
        for ($i=0; $i<$this->Length; $i++){
            $c = rand(0, count($this->Chars) - 1);
            $r = rand(0, strlen($this->Chars[$c]) - 1);
            $randchar = substr( $this->Chars[$c],$r,1 );
            $this->Code .= $randchar;
        }
        return $this->Code;
    }

    //创建验证码对应的图片
    function Create(){

        if ($this->Code==""){
            return 0;
        }

        $this->Image = imageCreate( $this->Width, $this->Height );
        $back = $this->_getColor( $this->BgColor);
        imageFilledRectangle($this->Image, 0, 0, $this->Width, $this->Height, $back);

        $size = $this->Width / $this->Length;
        if ($size>$this->Height){
            $size = $this->Height;
        }

        $left = ($this->Width - $this->Length * ( $size + $size / 10)) / $size;
        for ($i=0; $i<$this->Length; $i++){
            $rsichar = substr($this->Code,$i,1);
	        $textColor = imageColorAllocate($this->Image, rand(0, 100), rand(0, 100), rand(0, 100));
	        $x = $left+($i*$size+$size/10);
	        $y = rand( $size/10, $this->Height - $size - $size/10);
	        if ($this->TTF && count($this->TFonts)){
	            $randsize = rand( $size-$size/10, $size+$size/10);
	            $font = $this->TFonts[rand( 0, count($this->TFonts) - 1)];
	            imagettftext($this->Image, $randsize, 0, $x, $y, $textColor, $font, $rsichar);
            }else{
                imagestring($this->Image, 5 , $x, $y, $rsichar, $textColor);
            }
        }
        if ($this->Noise){
            $this->_setNoise();
        }
        if ($border==true){
            $bcolor = $this->_getColor($this->BorderColor);
            imageRectangle($this->Image, 0, 0, $this->Width-1, $this->Height-1, $bcolor);
        }
        return 1;
    }

    //输出验证码图片
    function Draw(){
        if (!$this->Image){
            $this->Create();
        }
        header("Content-type: image/gif");
        imageGIF( $this->Image );
        imagedestroy( $this->Image );
    }

    /*
    类内部方法
    ------------------------------------
    */
    //计算颜色值
    function _getColor( $color ){
        $color = eregi_replace ("^#","",$color);
        $r = $color[0].$color[1];
        $r = hexdec ($r);
        $b = $color[2].$color[3];
        $b = hexdec ($b);
        $g = $color[4].$color[5];
        $g = hexdec ($g);
        $color = imagecolorallocate ($this->Image, $r, $b, $g);
        return $color;
    }
    //在图片中生成杂点
    function _setNoise(){
	    for ($i=0; $i<$this->NoiseNum; $i++){
		    $randColor = imageColorAllocate($this->Image, rand(0, 255), rand(0, 255), rand(0, 255));
		    imageSetPixel($this->Image, rand(0, $this->Width), rand(0, $this->Height), $randColor);
	    }
    }

} //end of Class
?>
