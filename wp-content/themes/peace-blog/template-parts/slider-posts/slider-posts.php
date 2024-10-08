<?php
$peace_blog_slider_posts_id = get_theme_mod( 'slider_posts_category', '' );

$query = new WP_Query( apply_filters( 'peace_blog_slider_posts_args', array(
	'post_type'           => 'post',
	'post_status'         => 'publish',
	'posts_per_page'      => 6,
	'cat'                 => $peace_blog_slider_posts_id,
	'offset'              => 0,
	'ignore_sticky_posts' => 1
)));

$peace_blog_posts_array = $query->get_posts();
$peace_blog_show_slider_posts = count( $peace_blog_posts_array ) > 0 && is_home();

if( get_theme_mod( 'enable_slider_posts', true ) && $peace_blog_show_slider_posts ) {
	?>
	<section id="section-slider-posts" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "infinite": true, "speed": 800, "dots": true, "arrows": false, "autoplay": false, "draggable": true, "fade": false }'>
		<?php
		while ( $query->have_posts() ) : $query->the_post(); ?>

            <article style="background-image:url('<?php the_post_thumbnail_url( 'full' ); ?>');">
	            <div class="entry-container">
	            	<div class="entry-meta">
    					<?php cube_blog_entry_footer(); ?>
		        	</div><!-- .entry-meta -->

					<header class="entry-header">
						<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					</header>

					<?php $peace_blog_excerpt = get_the_excerpt();
					if ( !empty($peace_blog_excerpt) ) { ?>
						<div class="entry-content">
							<?php the_excerpt(); ?>
						</div><!-- .entry-content -->
					<?php } ?>

					<?php $peace_blog_read_more_label = get_theme_mod( 'read_more_label' , 'Read More' );
					if ( !empty($peace_blog_read_more_label) ) { ?>
						<div class="read-more">
							<a href="<?php the_permalink(); ?>"><?php echo esc_html($peace_blog_read_more_label);?></a>
						</div><!-- .read-more -->
					<?php } ?>
		        </div><!-- .entry-container -->
            </article>
	        
		<?php
		endwhile; 
		wp_reset_postdata(); ?>
	</section>
<?php } ?>