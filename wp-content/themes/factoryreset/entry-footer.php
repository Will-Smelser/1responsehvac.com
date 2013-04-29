<?php global $post; if ( 'post' == $post->post_type ) : ?>
<div class="entry-footer">
<?php 
if ( is_category() && $catz = factoryreset_catz(', ') ) : // ?>
<span class="cat-links"><?php printf( __( 'Also posted in %s', 'factoryreset' ), $catz ); ?></span>
<span class="meta-sep"> | </span>
<?php else : ?>
<span class="cat-links"><span class="entry-footer-prep entry-footer-prep-cat-links">
<?php _e( 'Posted in ', 'factoryreset' ); ?></span><?php echo get_the_category_list(', '); ?></span>
<span class="meta-sep"> | </span>
<?php endif; ?>
<?php if ( is_tag() && $tag_it = factoryreset_tag_it(', ') ) : // ?>
<span class="tag-links"><?php printf( __( 'Also tagged %s', 'factoryreset' ), $tag_it ); ?></span>
<?php else : ?>
<?php the_tags( '<span class="tag-links"><span class="entry-footer-prep entry-footer-prep-tag-links">' . __('Tagged ', 'factoryreset' ) . '</span>', ", ", "</span>\n\t\t\t\t\t\t<span class=\"meta-sep\"> | </span>\n" ); ?>
<?php endif; ?>
<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'factoryreset' ), __( '1 Comment', 'factoryreset' ), __( '% Comments', 'factoryreset' ) ); ?></span>
<?php edit_post_link( __( 'Edit', 'factoryreset' ), "<span class=\"meta-sep\"> | </span>\n\t\t\t\t\t\t<span class=\"edit-link\">", "</span>\n\t\t\t\t\t\n" ); ?>
</div>
<?php endif; ?>