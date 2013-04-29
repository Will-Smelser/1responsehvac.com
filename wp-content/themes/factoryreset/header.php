<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
<meta http-equiv="content-type"
	content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php wp_title(' | ', true, 'right'); ?></title>
<link rel="stylesheet" type="text/css"
	href="<?php echo get_stylesheet_uri(); ?>" />
<?php wp_head(); ?>

<style>
<?php 
	$skip = array(4,7);
	if(!isset($_GET['page_id']) || in_array($_GET['page_id'],$skip)){
?>
article#content{
	width:100%;
}
aside#sidebar{
	display:none;
}
article #comments{
	display:none;
}
<?php 		
	}
?>
</style>
</head>
<body <?php body_class(); ?>>
	<div id="wrapper" class="hfeed">
		<header>
		    <div id="hwrapper">
			<div id="branding" style="position:relative;">
				<!-- <div id="search"><?php get_search_form(); ?></div> -->
				
				<div style="position:absolute;right:45px;top:-20px;">
					<div style="position:absolute;top:10px;font-size:35px;color:#333;text-align:center;width:350px;font-weight:bolder">714 - 225 - 1326</div>
					<img src="/images/dialog-bubble-yellow.png" width="350px" />
				</div>
				
				<div id="site-title">
					<img align="left" src="/images/hot-cold-logo-small.png" style="padding-right:20px" />
					
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"
						title="<?php bloginfo( 'name' ) ?>" rel="home"><?php //bloginfo( 'name' ) ?>
					First Response<br/> Air Conditioning & Heating
					</a>
					
				</div>	
				<!-- <p id="site-description"><?php bloginfo( 'description' ) ?></p> -->
			</div>
			<nav>
				<?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
			</nav>
			</div>
		</header>
		<div id="container">
			<div id="inner-container">