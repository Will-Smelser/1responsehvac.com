<div class="entry-summary">
<?php the_excerpt( sprintf(__( 'continue reading %s', 'factoryreset' ), '<span class="meta-nav">&rarr;</span>' )  ); ?>
<?php if(is_search()) {
wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'factoryreset' ) . '&after=</div>');
}
?>
</div> 