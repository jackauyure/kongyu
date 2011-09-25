<?php
/**
 * 分页类
 * @author sasumi
 * @version 1.1
 * 
 * $GLOBALS['pager_charset'] = 'utf-8';		//分页配置文件编码
 * $GLOBALS['pager_language'] = 'zh-cn';	//分页配置语言
 */
class RAF_Pager {
	var $per_num;		//每页显示记录数目
	var $page_num;		//页数
	var $item_sum;		//记录总数
	var $page_index;	//页码
	var $pre_code;		//页码前缀
	
	var $url;			//请求URL
	var $config;		//配置
	
	function __construct($per_num=20, $item_sum=35, $pre_code='page', $config=array()){
		$this->page_init($per_num, $item_sum, $pre_code, $config);
	}
	
	/**
	 * 设定分页配置
	 * @param array $config
	 * @result bool
	 */
	function setConfig($config){
		if(empty($config)){
			
			//默認語言版本
			$this->config['first']	= !empty($config['first']) ? $config['first']:'第一页';
			$this->config['next'] 	= !empty($config['next']) ? $config['next']:'下一页';
			$this->config['prev'] 	= !empty($config['prev']) ? $config['prev']:'上一页';
			$this->config['last'] 	= !empty($config['last']) ? $config['last']:'最后一页';
			$this->config['jump'] 	= !empty($config['jump']) ? $config['jump']:'跳转到第%i%页';
			$this->config['page'] 	= !empty($config['page']) ? $config['page']:'第%i%页';
			$this->config['prev10'] = !empty($config['prev10']) ? $config['prev10']:'前10页';
			$this->config['next10'] = !empty($config['next10']) ? $config['next10']:'后10页';
		} else {
			$this->config = $config;
		}
	}
	
	/**
	 * 分页初始化
	 * @param int $per_num	每页记录数量
	 * @param int $item_sum 总记录数量
	 * @param string $pre_code	分页标识字符
	 * @return bool
	 */
	function page_init($per_num, $item_sum, $pre_code, $config=array()){
		$this->per_num = $per_num;
		$this->item_sum = $item_sum;
		$this->pre_code = $pre_code;
		$this->page_num = intval(ceil($item_sum/$per_num));
		
		$page = 1;
		if(!empty($_GET[$pre_code]))
			$page = intval($_GET[$pre_code]);
			
		$this->page_index = intval($page)<=0 ? 1 : $page;
		$this->setConfig($config);
		return true;
	}
	
	/**
	 * 获取分页信息
	 * @return array 分页信息数组
	 */
	function getInfo(){
		return array(
			'per_num' => $this->per_num,
			'page_num' => $this->page_num,
			'item_sum' => $this->item_sum,
			'pre_code' => $this->pre_code,
			'page_index' => $this->page_index
		);
	}
	
	/**
	 * 获取分页HTML 字符串
	 * TODO://完成 $config配置变量，还有就是input输入页码方式直接跳转到指定页面
	 * 
	 * @param string $mode_str 模式字符串，默认为：数字，下一页，选择框
	 * @param mix $config 配置
	 * @return string 分页ＨＴＭＬ代码
	 */
	public function getHtml($mode_str='', $config=array()){
		$mode_str = !empty($mode_str) ? $mode_str : 'first,prev,next,last,select';
		$modes = explode(',',$mode_str);
		$url = $this->getUrl();
		$page_html	=	"";			//初始化分页变量 by:benero 2008-06-10 22:45

		
		if(!empty($config)){
			$this->setConfig($config);
		} else {
			$config = $this->config;
		}
		
		foreach($modes as $mode){
			$mode = trim($mode,' ');
			//輸出第一頁
			if($mode == 'first'){
				if($this->page_index==1 || $this->page_num==1)
					$page_html .= '<span class="pager_first">'.$config['first'].'</span>';
				else
					$page_html .= '<a class="pager_first" href="'.$url.'1">'.$config['first'].'</a>';
				$page_html	.=	"&nbsp;&nbsp;";
			}
			
			//輸出上一頁
			if($mode == 'prev'){
				if($this->page_index == 1 || $this->page_num ==1)
					$page_html .= '<span class="pager_prev">'.$config['prev'].'</span>';
				else
					$page_html .= '<a class="pager_prev" href="'.$url.($this->page_index-1).'">'.$config['prev'].'</a>';
				$page_html	.=	"&nbsp;&nbsp;";
			}
			
			//輸出前10頁
			if($mode == 'prev10'){
				if($this->page_index == 10 || $this->page_num ==10 ||	$this->page_index < 10)
					$page_html .= '<span class="pager_prev10">'.$config['prev10'].'</span>';
				else
					$page_html .= '<a class="pager_prev10" href="'.$url.($this->page_index-10).'">'.$config['prev10'].'</a>';
				$page_html	.=	"&nbsp;&nbsp;";
			}

			//輸出後10頁
			if($mode == 'next10'){
				if($this->page_index >= $this->page_num || $this->page_num == 10 || $this->page_index >10)
					$page_html .= '<span class="pager_next10">'.$config['next10'].'</span>';
				else
					$page_html .= '<a class="pager_next10" href="'.$url.($this->page_index+10).'">'.$config['next10'].'</a>';
				$page_html	.=	"&nbsp;&nbsp;";
			}
			
			//輸出下一頁
			if($mode == 'next'){
				if($this->page_index >= $this->page_num || $this->page_num == 1)
					$page_html .= '<span class="pager_next">'.$config['next'].'</span>';
				else
					$page_html .= '<a class="pager_next" href="'.$url.($this->page_index+1).'">'.$config['next'].'</a>';
				$page_html	.=	"&nbsp;&nbsp;";
			}
			
			//輸出最后一頁
			if($mode == 'last'){
				if($this->page_index >= $this->page_num || $this->page_num == 1)
					$page_html .= '<span class="pager_last">'.$config['last'].'</span>';
				else
					$page_html .= '<a class="pager_last" href="'.$url.$this->page_num.'">'.$config['last'].'</a>';
				$page_html	.=	"&nbsp;&nbsp;";
			}
			
			//輸出數字頁
			if($mode == 'nums'){
				$offset_len = 4;
				$page_html .= '<b class="pager_nums">';

				if($this->page_index - $offset_len > 0) $page_html .= '<em>...</em>';
				
				for($i=$this->page_index-$offset_len; $i<=$this->page_index+$offset_len; $i++){
					if($i>0 && $i<=$this->page_num)
						if($this->page_index != $i) $page_html .= '&nbsp;<a href="'.$url.$i.'">'.$i.'</a>';
						else $page_html .= '&nbsp;<em style="color:red;">'.$i.'</em>';
						$page_html	.=	"&nbsp;";
				}
				
				if($this->page_index + $offset_len < $this->page_num){
					$page_html .= '<em>...</em>';
				}
				
				$page_html .= '</b>';
				$page_html	.=	"&nbsp;&nbsp;";
			}
			
			//輸出選擇框
			if($mode == 'select'){
				$page_html .= '<select size="1" onchange="location.href=this.value">';
				for($i=1; $i<=$this->page_num; $i++)
					if($this->page_index != $i){
						$tmp_str = str_replace('%i%', $i, $config['page']);
						$page_html .= '<option value="'.$url.$i.'">'.$tmp_str.'</option>';
					}
					else{
						$tmp_str = str_replace('%i%', $i, $config['page']);
						$page_html .= '<option selected value="'.$url.$i.'">'.$tmp_str.'</option>';
					}
				$page_html .= '</select>';
			}
			
			//輸出輸入框
			if($mode == 'input'){
				$tmp_str = str_replace('%i%','<input type="text" size="2" onkeydown="if(event.keyCode == 13) window.location = \''.$url.'\'+this.value"/>', $config['jump']);
				$page_html .= '<span class="pager_input">'.$tmp_str.'</span>';
			}
		} 
		return $page_html;
	}
	
	/**
	 * 数组分页
	 * @param array $arr
	 * @return null
	 */
	function handleArray(&$arr){
		$start = ($this->page_index-1) * $this->per_num;
		$len = $this->per_num;
		
		$arr = array_slice($arr,$start, $len);
		return $arr;
	}
	
	function handleSql(&$sql, $type='mysql'){
		//ＳＱＬ形式的分頁
		if($type == 'mysql'){
			if(strstr(strtolower($sql), ' limit ')){
				return $sql;
			}
			else {
				$start = ($this->page_index-1)* $this->per_num;
				$len = $this->per_num;
				return "$sql LIMIT $start, $len";
			}
		}
		
		//暫時不支持其他的ＤＢ庫類型
		return $sql;
	}
	
	/**
	 * 获取ＵＲＬ变量
	 * @param string URL
	 */
	function getUrl(){
		$gets = $_GET;
		$tmp_gets = $gets;
		$this->url = $_SERVER['PHP_SELF'];

		//set first get value
		if(!empty($gets))
		foreach($gets as $key=>$get){
			if($key != $this->pre_code){
				$this->url .= "?$key=" . urlencode($get);;
				unset($gets[$key]);
				break;
			}
		}
		
		//set other get
		if(!empty($gets))
		foreach($gets as $key=>$get){
			if($key != $this->pre_code)
				$this->url .= "&$key=" . urlencode($get);
		}
		
		//set page
		if((count($tmp_gets) == 1 && isset($gets[$this->pre_code]))|| empty($tmp_gets))
			$this->url .= "?$this->pre_code=";
		else
			$this->url .= "&$this->pre_code=";			
		return $this->url;
	}
	
	/**
	 * 获取ＤＢ分页所需的OFFSET
	 * @return string offset
	 */
	function getOffset(){
		$start = ($this->page_index-1) * $this->per_num;
		$start = $start <= 0 ? 0 : $start;
		$len = $this->per_num;
		return "$start,$len";
	}
}
?>