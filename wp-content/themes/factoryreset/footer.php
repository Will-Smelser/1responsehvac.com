	<div class="clear"></div>
	</div>
	<footer>
	
	<div style="background-color:#FFF;padding-top:5px">
	<div style="margin:0px auto;width:1024px;">
		<img src="/images/member_assoc.png" width="1024" height="84" style="margin:0px;padding:0px;" />
	</div>
	</div>
	
	</footer>
	</div>
</div>
<?php wp_footer(); ?>

<div style="width:1024px;margin:0px auto;">
<div style="float:right;color:#ffc21c;font-weight:bolder;text-align:center">
	<span style="font-size:20px;display:inline-block;padding-bottom:5px;">Call Us!</span><br/>
	<span style="font-size:35px">714-225-1326</span>
</div>
<?php wp_nav_menu( array( 'theme_location' => 'main-menu','menu'=>'Footer', 'menu_class'=>'footer_nav' ) ); ?>
<div style="clear:both;padding-bottom:10px;" ></div>
</div>

<div id="copyright">
	<?php echo sprintf( __( '%1$s %2$s %3$s. All Rights Reserved.', 'factoryreset' ), '&copy;', date('Y'), esc_html(get_bloginfo('name')) ); ?>
	</div>
</body>
</html>