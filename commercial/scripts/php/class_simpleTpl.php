<?php
class simpleTpl{
	
	protected $loops;
	public $loopVals;
	protected $replace;
	protected $source;
	
	
	public $defaults = array(
		'date' => 'F d, Y',
		'relative_location'=>'',
		//'root_location' => $_SERVER['DOCUMENT_ROOT'],
		'domain_name'=>'qcshvac.local'
	);	
	/**
	 * Initialize the class
	 * @param $file The file and total path
	 * @param $replace 
	 * @return unknown_type
	 */
	public function simpleTpl($file, $replace, $loops = array(), $loopVals = null){
		$this->loops = $loops;
		$this->loopVals = ($loopVals == null) ? array('loops'=>array()) : $loopVals;
		$this->replace = $replace;
		$this->source = file_get_contents($file);
		$this->source = str_replace("\n",'',$this->source);
		return ($this->source !== false);
	}
	
	/**
	 * Performs the replace
	 * @return unknown_type
	 */
	public function replace(){
		foreach($this->replace as $remove=>$value){
			$this->source = str_replace('{'.$remove.'}',$value,$this->source);
		}
	}
	public function addLoop($name,$parentName=null){
		//build the loop structure
		$newLoop = array(
			'name'=>$name,
			'items'=>array(
				array('loops'=>array())
			)
		);
		
		//now add the loop if no parent loop
		if($parentName == null){
			array_push($this->loopVals['loops'],$newLoop);
			return true;
		}
		
		//if the loop has a parent
		return $this->addLoopRecur($this->loopVals['loops'],$newLoop,$parentName);
	}
	private function addLoopRecur(&$scanLoop,&$appendLoop,&$parent){
		foreach($scanLoop as &$inner){
			//check if this is the parent
			if($inner['name'] == $parent){
				foreach($inner['items'] as &$row){
					array_push($row['loops'],$appendLoop);
				}
			}else{
				foreach($inner['items'] as &$row){
					//if there is a lower level loop with data, check it out
					if(count($row['loops']) > 0){
						$res = $this->addLoopRecur($row['loops'],$appendLoop,$parent);
					}
				}
			}
		}
		return;
	}
	/**
	 * Process the loops
	 * @return unknown_type
	 */
	public function processLoops(){
		$this->source = $this->recurLoops($this->loopVals['loops'],$this->source);
	}
	/**
	 * Recursively cycles over loops...be careful with array structure for loops, otherwise this
	 * will not work properly
	 * SAME ARRAY:
	 * $loopVals = array(
			'loops'=>array(
				array(
					'name'=>'account',
					'items'=>array(
						array('cc_name_first'=>'Will','cc_name_last'=>'Smelser','cc_num_nice'=>'########1234','subtotal'=>'100.00',
						'loops'=>array(
								array(  //VERY IMPORTANT TO HAVE THIS ARRAY WITHIN ARRAY HERE
									'name'=>'product',
									'items'=>array(
										array('model'=>'model 1','description'=>'Some description 1','amt'=>'$100.00','loops'=>array()),
										array('model'=>'model 2','description'=>'Some description 2','amt'=>'$200.00','loops'=>array())
									)
								)
							)
						),
						array('cc_name'=>'Will Smelser 2','cc_num_nice'=>'########12345',
						'loops'=>array(
								array(
									'name'=>'product',
									'items'=>array(
										array('model'=>'model 3','description'=>'Some description 1','amt'=>'$300.00','loops'=>array()),
										array('model'=>'model 4','description'=>'Some description 2','amt'=>'$400.00','loops'=>array())
									)
								)
							)
						)
					)
				)
			)
		);
	 * @param $arr array An array in proper format
	 * @param $content Send $this->source to run on entire TPL
	 * @return string Returns a string wiht all loops in $arr resolved
	 */
	public function recurLoops($arr,$content){
		
		foreach($arr as $loop){
			//find the loop
			$regex = '/\{loop:start:'.$loop['name'].'\}((.*)|([\s\n\r\:\<\>]*))\{loop:end:'.$loop['name'].'\}/i';
			if(!preg_match($regex,$content,$matches)) return $content;
			$orig = $matches[0];

			//removethe loop tags
			$theMatch = str_replace('{loop:start:'.$loop['name'].'}','',$orig);
			$theMatch = str_replace('{loop:end:'.$loop['name'].'}','',$theMatch);
			$orig2 = $theMatch;
			
			//cycle the items
			$temp = null;
			foreach($loop['items'] as $item){
				//do inner loops first
				if(@count($item['loops']) > 0 && is_array($item['loops'])){
					//echo '<hr>'.$orig2.'<hr>';
					$theMatch = $this->recurLoops($item['loops'],$orig2);
				}
				
				//reset the row
				$row = $theMatch;
				foreach($item as $replace=>$val){
					if($replace != 'loops' && is_string($val) && is_string($replace))
						$row = str_replace('{'.$replace.'}',$val,$row);
				}
				$temp .= $row;
			}
			//perform the replace on the source
			if($temp != null){
				$content = str_replace($orig, $temp, $content);
			}
		}
		return $content;
	}
	public function parseTpl(){
		$this->processLoops();
		$this->replace();
		$this->replaceDefaults();
		$this->removeAllBrackets();
		return $this->source;
	}
	/**
	 * Removes all {someword} instances with simple regex
	 * @return unknown_type
	 */
	public function removeAllBrackets(){
		$this->source = preg_replace('/\{[\w\d\_\-\:]+\}/i','',$this->source);
	}
	/**
	 * Cycles the $this->defaults array and does replace...some special cases such as date
	 * @return unknown_type
	 */
	public function replaceDefaults(){
		foreach($this->defaults as $replace=>$val){
			switch($replace){
				case 'date':
					$this->source = str_replace('{date}',date($val),$this->source);
					break;
				default:
					$this->source = str_replace('{'.$replace.'}',$val,$this->source);
					break;
			}
		}
	}
	/**
	 * deprecated
	 * @param $str
	 * @return unknown_type
	 */
	public function look4subloops($str){
		return preg_match('/\{loop:start:[\w\d]+\}/i',$str);
	}
}
?>