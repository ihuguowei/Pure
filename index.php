<?php get_header();?>
<div class="post-list">
	<?php if ( have_posts() ) {
		while ( have_posts() ) : the_post();
			?>
            <article <?php post_class( 'post h-entry' ); ?>>
                <div class="post-wrap content-width">
                    <h2 class="post-title serif entry-title">
                        <a class="post-title-url"
                           href="<?php the_permalink(); ?>"
                           title="<?php the_title(); ?>"
                        >
							<?php the_title(); ?>
                        </a>
                    </h2>
                    <div class="posy-meta-wrap">
                        <ul class="post-meta post-meta-top">

                            <li class="post-meta-item author-avatar-wrap">
								<?php echo get_avatar( get_the_author_meta( 'user_email' ) ); ?>
                            </li>
                            <li class="post-meta-item author vcard">
                                <a class="author-name fn"
                                   rel="vcard author post-author"
                                   href="<?php echo get_the_author_meta( 'url' ) ?>"
                                   title="<?php echo get_the_author_meta( 'display_name' ); ?>">
									<?php echo get_the_author_meta( 'display_name' ); ?>
                                </a>
                                <time class="publish-time post-date updated"
                                      datetime="<?php echo get_post_time( 'Y/m/d' ); ?>">
									<?php echo get_post_time( 'Y/m/d' ); ?>
                                </time>
                            </li>
							<?php if ( get_the_category_list() ) { ?>
                                <li class="post-meta-item category-list">
									<?php the_category( ' / ' ); ?>
                                </li>
							<?php } ?>
                        </ul>
                    </div>
                    <div class="post-entry typo">
						<?php
						echo apply_filters( 'the_content', get_the_content( "Read More »", false ) );
						?>

                        <nav class="article-pages">
							<?php wp_link_pages(array(
                                'before'           => '<div>' . __( 'Pages:' ),
                                'after'            => '</div>',
                                'link_before'      => '<span class="page">',
                                'link_after'       => '</span>',
                                'next_or_number'   => 'number',
                                'separator'        => ' ',
                                'nextpagelink'     => __( 'Next page' ),
                                'previouspagelink' => __( 'Previous page' ),
                                'pagelink'         => '%',
                                'echo'             => 1
                            )); ?>
                        </nav>
                    </div>

                    <div class="post-meta post-tags-wrap">
						<?php the_tags( '', '、', '' ); ?>
                    </div>
					<?php ?>

	                <?php
	                if (is_single()) {
		                if (get_option('pure_theme_single_ads_script') != '') {
			                echo trim( stripslashes( get_option( 'pure_theme_single_ads_script' ) ) );
		                }
	                }
	                ?>
                </div>
            </article>
        <?php

        if ( is_single() ) { ?>
            <nav id="relativePostNav" class="relative-post-nav content-width">
                <ul class="nav-list">
                <?php if ( get_previous_post_link() ) { ?>
                    <li class="nav-item prev-nav-item"><?php previous_post_link(); ?></li>
                <?php }

                if ( get_next_post_link() ) {; ?>
                    <li class="nav-item next-nav-item"><?php next_post_link(); ?></li>
                <?php } ?>
                </ul>
            </nav>
        <?php } ?>
		<?php
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile;
	} else {
		_e( 'Sorry, no posts matched your criteria.', '' );
	}
	?>

    <nav class="pages-nav" id="pagesNav">
		<?php echo paginate_links( array(
			'type'               => 'list',
			'show_all'           => false,
			'prev_next'          => true,
			'prev_text'          => __( '« Previous','' ),
			'next_text'          => __( 'Next »', '' ),
			'add_args'           => false,
			'add_fragment'       => '',
			'before_page_number' => '',
			'after_page_number'  => ''
		) ); ?>
    </nav>
</div>

<?php get_footer();?>