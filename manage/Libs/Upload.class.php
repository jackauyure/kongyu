<?php
/**
 * 
 * 文件上传
 * @chenm
 */
class Upload {
	private $path = '';
	private $file = '';
	public  $filename = '';
	public  $s_filename = '';
	private $ispic = false;
	
	/**
	 * 
	 * $path 文件存放路径
	 * $file 上传文件
	 */
	function __construct($path,$file){
		$this->path = $path;
		$this->file = $file;		
	}
	
	public function doup(){
		return $this->moveFile();
	}
	
	public function checkType(){
		$file = $this->file;
		$suf = explode(".", $file['name']);			
	    $suffix = $suf[count($suf)-1]; 	    
	    switch ($suffix){
		   		case 'jpg' :
		   		case 'gif' :
		   		case 'png' :
		   		case 'bmp' :	
		   			$this->ispic = true;
		            break;
		   		default :
		   			break;     	   				   			 		   		
		}
		return $suffix;
	}
	
	public function moveFile(){
		$suffix = $this->checkType();
		if($suffix){
	        $filename = date('Ymdhis',time()).rand(1000,9999).'.'.$suffix;		         	
	        $result = move_uploaded_file($this->file["tmp_name"],$this->path.$filename);   
	        $this->filename = $filename;
	        
	        $sresult = true;
	        if($this->ispic){
	        	$smallimg = $this->resize_image($this->path.$filename, 120, 70, $suffix);
	        	$this->s_filename = 's_'.$filename;        	
	        	switch($suffix){
		        	case "jpg" :
					    $sresult  = imagejpeg($smallimg,$this->path.$this->s_filename);		
					    break;
					case "png" :
						$sresult  = imagepng($smallimg,$this->path.$this->s_filename);
						break;
					case "gif"	:
						$sresult  = imagegif($smallimg,$this->path.$this->s_filename);	
					case "bmp"	:
						$sresult  = imagewbmp($smallimg,$this->path.$this->s_filename);					
				}	
	                	
	        }
	        return $result && $sresult;                 
		}else{
			return false;
		} 		
	}
    
	/**
	 * 取得缩略图	
	 * 宽120，高70
	 * $filename  图片文件名
	 * $ext       图片后缀
	 * 
	 */
    private function resize_image($filename, $xmax = 200, $ymax = 100 ,$ext){			           	
				switch ($ext){	
					case "jpg":		
					    $im = imagecreatefromjpeg($filename);			
		                break;
				    case "png":			
					    $im = imagecreatefrompng($filename);			
	                    break;
				    case "gif":			
				        $im = imagecreatefromgif($filename);
				    case "bmp":
				    	$im = imagecreatefromwbmp($filename); 				        
				}
							
				$x = imagesx($im);				
				$y = imagesy($im); 			
				if($x <= $xmax && $y <= $ymax)			
				   return $im; 		
				if($x >= $y) {				
					$newx = $xmax;				
					$newy = $newx * $y / $x;				
				}else {				
					$newy = $ymax;				
					$newx = $x / $y * $newy;			
				} 				 			
				$im2 = imagecreatetruecolor($newx, $newy);			
				imagecopyresized($im2, $im, 0, 0, 0, 0, floor($newx), floor($newy), $x, $y);						
				return $im2;
     }
}
?>