<?php 
/*
 * @creattime			2014-04-04
 * @function			upload file
 * @copyright			(C) 2013-2014 ChangZhao
 * @site				http://zhaochang.org/
 * @lastmodify			2014-6-19
 *
*/
	//header("Content-Type:text/html;charset=utf-8");
/**
 * 文件上传类
 * @category   ORG
 * @package  ORG
 * @subpackage  Util
 * @author    ChangZhao
 */
	class StringSub{
		private $string;	//The string will be going to sub;
		private $encoding;	//set encoding;
		private $start;	//The starting of subtract string;
		private $k;	//The number of the front of start ;
		private $sub_string;	//The string having subtracted;
		public function  subtractString($start,$encoding,$string,$length){	//except the front of starting of string;
			//return $this->string=$string;;
			if ($encoding=="utf-8"){
				$i=0;
				$this->string=$string;
				while ($i<$start){
					$num=ord(substr($this->string,$i,1));
					if($num>=0 && $num<=127){
						$i++;
					}else if($num>=192 && $num<=223){
						$i+=2;
					}else if($num>=224 && $num<=239){
						$i+=3;
					}else if($num>=240 && $num<=255){
						$i+=4;
					}
				}
				$len=$i+$length;
				for($k=$i;$k<$len;$k++){
					$num_two=ord(substr($this->string,$k,1));
					if($num_two>=0 && $num_two<=127){
						$temstring.=substr($this->string,$k,1);
					}else if($num_two>=192 && $num_two<=223){
						$temstring.=substr($this->string,$k,2);
						$k+=1;
					}else if($num_two>=224 && $num_two<=239){
						$temstring.=substr($this->string,$k,3);
						$k+=2;
					}else if($num_two>=240 && $num_two<=255){
						$temstring.=substr($this->string,$k,4);
						$k+=3;
					}
				}
				return $this->sub_string=$temstring;
			}else if($encoding=="gb2312"){
				$i=0;
				$this->string=$string;
				while ($i<$start){
					$num=ord(substr($this->string,$i,1));
					if($num>=0xa0){
						$i+=2;
					}else {
						$i++;
					}
				}
				$len=$i+$length;
				for($k=$i;$k<$len;$k++){
					$num_two=ord(substr($this->string,$k,1));
					if($num_two>=0xa0){
						$temstring.=substr($this->string,$k,2);
						$k+=1;
					}else {
						$temstring.=substr($this->string,$k,1);
					}
				}
				return $this->sub_string=$temstring;
				
			}
		}
	}
?>	