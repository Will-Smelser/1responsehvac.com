<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>

<head>

<title>First Response Air Conditioning & Heating - Air Conditioning and Heating Systems for Residential, Commercial, and Industrial applications</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<link href="heatingairconditioning.css" rel="stylesheet" type="text/css">


	<link href="/scripts/galleria-1.0b/trunk/galleria.css" rel="stylesheet" type="text/css" media="screen">
	<script type="text/javascript" src="/scripts/galleria-1.0b/demo/jquery.min.js"></script>

	<script type="text/javascript" src="/scripts/galleria-1.0b/trunk/jquery.galleria.js"></script>
	<script type="text/javascript">
	
	$(document).ready(function(){
		
		$('.gallery_demo_unstyled').addClass('gallery_demo'); // adds new class name to maintain degradability
		$('.nav').css('display','none'); // hides the nav initially
		
		$('ul.gallery_demo').galleria({
			history   : false, // deactivates the history object for bookmarking, back-button etc.
			clickNext : false, // helper for making the image clickable. Let's not have that in this example.
			insert    : undefined, // the containing selector for our main image. 
								   // If not found or undefined (like here), galleria will create a container 
								   // before the ul with the class .galleria_container (see CSS)
			onImage   : function() { $('.nav').css('display','block'); } // shows the nav when the image is showing
		});
	});
	
	</script>
	<style media="screen,projection" type="text/css">
	
	/* BEGIN DEMO STYLE */
	*{margin:0;padding:0}
	body{background:white;background:white;color:#555;font:80%/140% 'helvetica neue',sans-serif;width:900px;margin: 0 auto;}
	.caption{color:#888;width:200px;}
	.demo{position:relative;margin-top:2em;}
	.gallery_demo{width:200px;float:left;}
	.gallery_demo li{width:55px;height:70px;border:3px double #eee;margin: 0 2px 2px 0;background:#eee;}
	.gallery_demo li.hover{border-color:#bbb;}
	.gallery_demo li.active{border-style:solid;border-color:#222;}
	.gallery_demo li div{left:200px}
	.gallery_demo li div .caption{font:italic 0.7em/1.4 georgia,serif;}
	
	.galleria_container{height:300px;width:500px;float:right;margin-right:20px;}
	
	.nav{padding-top:15px;clear:both;}
	
	.info{text-align:left;margin:30px 0;border-top:1px dotted #221;padding-top:30px;clear:both;}
	.info p{margin-top:1.6em;}
	
	.nav{position:absolute;top:410px;left:0;}
	
    </style>


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
<img src="images/logo.jpg" title="1RespHVAC" />
<ul class="navTop">
<li><a href="index.html"> > Home</a></li>
<li><a href="air-con-heat.html"> > Commercial</a></li>
<li><a href="air-con-heat-res.html"> > Residential</a></li>
<li><a href="vent-cleaning.html"> > Vent Cleaning</a></li>
<li><a href="maintenance.html"> > Maintenance</a></li>
<li><a href="about-us.html"> > About Us</a></li>
</ul>
		  </td>

        </tr>

        <tr> 

          <td  colspan="3" valign="top" style="height:500px">
<h2> Residential Photo Gallery</h2>
<div class="demo" style="padding-left:10px">
<p style="float:left;padding-bottom:10px"><a href="#" onclick="$.galleria.prev(); return false;">&laquo; previous</a> | <a href="#" onclick="$.galleria.next(); return false;">next &raquo;</a></p>
<ul class="gallery_demo_unstyled" >
	<?php 
		$i = 0;
		foreach(scandir($_SERVER['DOCUMENT_ROOT'].'/images/residential/gallery') as $file){
			if(preg_match('/\.((jpg)|(jpeg)|(gif)|(png))$/i',$file)){
				$i++;
				echo ($i == 1) ? "<li class='active'>" : '<li>';
				echo "<img src='/images/residential/gallery/$file' title='residential' alt='residential' /></li>\n";
			}
		}
	?>
</ul>
</div>
		  
          </td>

        </tr>

        <tr>

          <td height="139" colspan="3" valign="top"><p align="center">&nbsp;</p>

            <p align="center" class="style1"><span class="style3">First Response Air Conditioning & Heating</span></p>
            

            <p align="center" class="style2">3419 E Chapman Avenue Suite 270 Orange CA 92869 <br>

              Phone (714) 225 - 1326<br>

              </p>            

            <p align="center">&nbsp;</p>          </td>

        </tr>

    </table></td>

  </tr>

</table>
</body>

</html>

