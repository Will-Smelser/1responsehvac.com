<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>

<head>

<title>First Response Air Conditioning & Heating - Air Conditioningf and Heating Systems for Residential, COmmercial, and Industrial applications</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<link href="heatingairconditioning.css" rel="stylesheet" type="text/css" />
<link href="scripts/tpl/product.css" rel="stylesheet" type="text/css" />
    
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
$model = $_GET['model'];
$type  = $_GET['ptype'];


//READ THE DATA FILE
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
	for($i=0; $i<count($titles); $i++){
		$temp[$titles[$i]] = $parts[$i];	
	}
	if($temp['Model'] == $model){
		array_push($data,$temp);
		break;
	}
}

$file = $_SERVER['DOCUMENT_ROOT'].'/products/details/'.$type.'/'.$model.'.txt';
if(file_exists($file)){
	$info =  file_get_contents($file);	

	$replace = array(
			'title'=>$data[0]['title'],
			'sub_title'=>$data[0]['sub_title'],
			'desc'=>$data[0]['Description'],
			'model'=>$data[0]['Model'],
			'image_url'=>"products/images/".$data[0]['type']."/".$data[0]['image'],
			'info'=>$info
		);
	
	//TPL STUFF
	//display the template
	include 'scripts/php/class_simpleTpl.php';
	$tpl = new simpleTpl('scripts/tpl/product.tpl',$replace,null,null);
	echo $tpl->parseTpl();
}else{
	echo '<div id="leftTextInside"><h2>No product info located.</h2></div>';	
}


?>
</td>

        </tr>

        <tr>

          <td height="139" colspan="3" valign="top"><p align="center">&nbsp;</p>

            <?php include "includes/footer.html"?>          </td>

        </tr>

    </table></td>

  </tr>

</table>
</body>
</html>