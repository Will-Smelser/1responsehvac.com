<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>

<head>

<title>First Response Air Conditioning & Heating - Air Conditioningf and Heating Systems for Residential, COmmercial, and Industrial applications</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<link href="heatingairconditioning.css" rel="stylesheet" type="text/css" />
<link href="scripts/tpl/product_list.css" rel="stylesheet" type="text/css" />
    
<style type="text/css">

<!--

.style1 {font-size: 14}

.style2 {font-size: 14pt; font-weight: bold; }

.style3 {	font-size: 14pt;

	color: #B82125;

	font-weight: bold;

}

-->

</style>
	
</head>



<body bgcolor="#333333">

<table width="771" border="1" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">

  <tr>

    <td width="774"><table width="100%" border="0" cellspacing="0" cellpadding="0">

        <tr> 

          <td colspan="3">
<?php include "includes/header.html"?>
		  </td>

        </tr>

        <tr> 

          <td  colspan="3" valign="top">
          
<?php
error_reporting(0);

//this is the product group requested
$group = (isset($_GET['ptype'])) ? $_GET['ptype'] : '*';
$group = explode(',',$group);

//need to load the file with all the data
$lines = file('products/products.txt');

$data = array();

//now we need to parse the data
$title_line = array_shift($lines);
$title_line = rtrim($title_line);
$titles = explode("\t",$title_line);

//cycle each line for the data
foreach($lines as $line){
	$line = rtrim($line);
	
	//break each line into its parts
	$parts = explode("\t",$line);
	
	//create the info for the $data
	$temp = array(); //holds the item info
	if(in_array($parts[0],$group) || $group[0] == '*'){
		for($i=0; $i<count($titles); $i++){
			//becuase we have products sepecific titles, only load titles where there is information on the product
			//if($parts[$i] != null){
				//echo $titles[$i].' -- '.$parts[$i].'<br/>';
				$temp[$titles[$i]] = $parts[$i];	
			//}
		}
		array_push($data,$temp);
	}
}

$data = arrSort2dim($data,array('type'=>'asc','sort'=>'asc'));

//tpl array
$loopVals = array('loops'=>array(
								array(
									  'name'=>'product_types',
									  'items'=>array(),
									  	
									  )	 
							));

//skip these keys in the products table description
$skip_titles = array('type','sort','type_desc','image','title','sub_title');

//tracking vars
$currentType = '';
$i = $j = 0;

//assemble data into format for tpl
foreach($data as $p){

	//this is a new products type
	if($p['type'] != $currentType){
		$i++;
		$image_url = '/products/images/'.$p['type'].'/'.$p['image'];
		
		$loopVals['loops'][0]['items'][$i] = array(
			'type_desc'=>$p['type_desc'],
			'image_url'=>$image_url,
			'type_desc'=>$p['type_desc'],
			'title'=>$p['title'],
			'sub_title'=>$p['sub_title']
		);
		
		//setup product arrays
		$loopVals['loops'][0]['items'][$i]['loops'] = array();
		$loopVals['loops'][0]['items'][$i]['loops'][0]['name'] = 'product_info';
		$loopVals['loops'][0]['items'][$i]['loops'][0]['items'] = array();
		$j = 0;
		$fpass = true; //first pass for the summary
	}

	
	//make new row for titles
	if($fpass){
		$loopVals['loops'][0]['items'][$i]['loops'][0]['items'][$j]['summary'] .= '<tr class="title_row">';
	}
	
	//make the titles
	foreach($p as $key=>$val){
		if($val != null && !in_array($key,$skip_titles) && $fpass){
			$loopVals['loops'][0]['items'][$i]['loops'][0]['items'][$j]['summary'] .= '<td>'.$key;
		}
	}
	
	//make new row for data
	$loopVals['loops'][0]['items'][$i]['loops'][0]['items'][$j]['summary'] .= '<tr>';
	
	//make the data
	foreach($p as $key=>$val){
		//save the key and data vals
		$loopVals['loops'][0]['items'][$i]['loops'][0]['items'][$j][$key] = $val;
		
		//Model link
		if($key == 'Model'){
			//echo $_SERVER['DOCUMENT_ROOT'].'/products/details/'.$p['type'].'/'.$val.'.txt<br/>';
			if(file_exists($_SERVER['DOCUMENT_ROOT'].'/products/details/'.$p['type'].'/'.$val.'.txt')){
				$a = '<a href="product.php?model='.$val.'&ptype='.$p['type'].'">';
				$ac='</a>';
			}else{
				$a = '';
				$ac= '';
			}
			$loopVals['loops'][0]['items'][$i]['loops'][0]['items'][$j]['summary'] .= '<td>'.$a.$val.$ac;
		}elseif($val != null && !in_array($key,$skip_titles)){
			$loopVals['loops'][0]['items'][$i]['loops'][0]['items'][$j]['summary'] .= '<td>'.$val;
		}
		
	}
	$fpass = false;
	
	
	//if the image did not exist, try and replace the image url with next available...not sure this is working, did not test
	if(!file_exists($_SERVER['DOCUMENT_ROOT'].$image_url)){
		//replaceing an image
		$loopVals['loops'][0]['items'][$i]['image_url'] = '/products/images/'.$p['type'].'/'.$p['image'];
	}
	
	$j++;
	$currentType = $p['type'];
}

//var_dump($loopVals);

//display the template
include 'scripts/php/class_simpleTpl.php';
$tpl = new simpleTpl('scripts/tpl/product_list.tpl',null,array('product_types','product_info'),$loopVals);
echo $tpl->parseTpl();



//SOME SORTING FUNCTIONS
	/**
	* Sort a 2 dim. array by column key/index
	* This function should get credit for whomever wrote it, but I cannot remember.  I truly apologize
	*
	* @param Array $array 2 dim. array to be sorted
	* @param String/Int The column to use for sorting
	* @param String Order to sort. asc or desc
	* @param Boolean $natsort  Not sure...uses php natsort()
	* @param Boolean $case_sensitive Not quite sure, but requires $natsort = TRUE
	**/
	function sort2d($array, $index, $order='asc', $natsort=FALSE, $case_sensitive=FALSE){
		$order = strtolower($order);
        if(is_array($array) && count($array)>0) 
        {
           foreach(array_keys($array) as $key) 
               $temp[$key]=$array[$key][$index];
               if(!$natsort) 
                   ($order=='asc')? asort($temp) : arsort($temp);
              else 
              {
                 ($case_sensitive)? natsort($temp) : natcasesort($temp);
                 if($order!='asc') 
                     $temp=array_reverse($temp,TRUE);
           }
           foreach(array_keys($temp) as $key) 
               (is_numeric($key))? $sorted[]=$array[$key] : $sorted[$key]=$array[$key];
           return $sorted;
      }
      return $array;
    }
	/**
	* Recursive 2 dim array sort
	*
	* @param array $arr 2 dim. array
	* @param array $sortArr = array('index'=>'ASC','index2'=>'DESC')
	* @return array 
	* @see sort2d This method uses sort2d for sorting
	**/
	function arrSort2dim($arr,$sortArr){
		$j=0;
		foreach($sortArr as $index=>$order){
			//initial sort
			$arr = sort2d($arr,$index, $order);
			$prev = NULL;
			$i = 0;  //for subarrays
			$temp = array();
			//is there more sorting to do?
			if(count($sortArr) > $j){
				//break into sub arrays for further sorting
				foreach($arr as $value){
					//if the previous value doesnt match current value then cycle, 
					//otherwise this is a subarray that will (potentially) need further sorting
					if($prev != $value[$index]){
						$i++;
						$prev = $value[$index];
						if(!isset($temp[$i])){$temp[$i] = array();}
					}
					//add row to temporary table...count($temp[$i]) > 1 means there may be more sorting needed
					array_push($temp[$i],$value);
				}
				//var_dump($temp);
				//sort the sub arrays
				$finalArr = array();
				foreach($temp as $value){
					$subsort = array();
					if(count($value) > 1 && count(array_slice($sortArr,($j+1))) > 0){
						//recursive call to sort the subarray by next sort values
						$subsort = arrSort2dim($value,array_slice($sortArr,($j+1)));
						//print_r($value);
						//echo "\n<br>arraySort2dim(aboveArray,array_slice(".var_dump(array_slice($sortArr,($j+1))).");\n";
						//echo '<hr>'."\n";
					}else{
						$subsort = $value;
					}
					//reassemble the array row by row
					foreach($subsort as $subval){
						array_push($finalArr,$subval);
					}
				}
				return $finalArr;
			}else{
				return $arr;
			}
			$j++; //since the $sortArr does not have numberic keys, we need to track where we are for the slice
		}
	}
?>
</td>

        </tr>

        <tr>

          <td height="139" colspan="3" valign="top"><p align="center">&nbsp;</p>
<?php include "includes/footer.html"?>
                      </td>

        </tr>

    </table></td>

  </tr>

</table>
</body>
</html>