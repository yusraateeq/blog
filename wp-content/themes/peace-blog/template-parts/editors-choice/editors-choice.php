<?php
$peace_blog_editors_choice_section_title  = get_theme_mod( 'editors_choice_section_title', 'Editors Choice' );
$peace_blog_editors_choice_id 			  = get_theme_mod( 'editors_choice_category', '' );

$query = new WP_Query( apply_filters( 'peace_blog_editors_choice_args', array(
	'post_type'           => 'post',
	'post_status'         => 'publish',
	'posts_per_page'      => 6,
	'cat'                 => $peace_blog_editors_choice_id,
	'offset'              => 0,
	'ignore_sticky_posts' => 1
)));

$peace_blog_posts_array = $query->get_posts();
$peace_blog_show_editors_choice = count( $peace_blog_posts_array ) > 0 && is_home();

if( get_theme_mod( 'editors_choice', true ) && $peace_blog_show_editors_choice ){
	?>
	<section class="section-editors-choice">
		<div class="section-header">
			<h2 class="section-title"><?php echo esc_html($peace_blog_editors_choice_section_title); ?></h2>
		</div><!-- .section-header -->

		<div class="columns-3 clear">
			<?php
			while ( $query->have_posts() ) : $query->the_post(); ?>

	            <article>
	            	<div class="editors-choice-item">
						<div class="featured-image" style="background-image: url('<?php the_post_thumbnail_url( 'full' ); ?>');">
							<a href="<?php the_permalink();?>" class="post-thumbnail-link"></a>
						</div><!-- .featured-image -->

			            <div class="entry-container">
			            	<div class="entry-meta">
				        		<?php if( 'post' == get_post_type() ): 
									$peace_blog_categories_list = get_the_category_list( ' ' );
									if( $peace_blog_categories_list ):
									printf( '<span class="cat-links">' . '%1$s' . '</span>', $peace_blog_categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
								endif; endif; ?>
				        	</div><!-- .entry-meta -->

							<header class="entry-header">
								<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							</header>

							<?php cube_blog_posted_on() ?>
				        </div><!-- .entry-container -->
				    </div><!-- .editors-choice-item -->
	            </article>
		        
			<?php
			endwhile; 
			wp_reset_postdata(); ?>
		</div><!-- .columns-4 -->
	</section>
<?php } ?>