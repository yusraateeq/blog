<?php
$peace_blog_highlighted_posts_id = get_theme_mod( 'highlighted_posts_category', '' );

$query = new WP_Query( apply_filters( 'peace_blog_highlighted_posts_args', array(
	'post_type'           => 'post',
	'post_status'         => 'publish',
	'posts_per_page'      => 3,
	'cat'                 => $peace_blog_highlighted_posts_id,
	'offset'              => 0,
	'ignore_sticky_posts' => 1
)));

$peace_blog_posts_array = $query->get_posts();
$peace_blog_show_highlighted_posts = count( $peace_blog_posts_array ) > 0 && is_home();

if( get_theme_mod( 'highlighted_posts', true ) && $peace_blog_show_highlighted_posts ){
	?>
	<section class="section-highlighted-posts">
		<div class="columns-3 clear">
			<?php
			while ( $query->have_posts() ) : $query->the_post(); ?>

	            <article>
		        	<?php if ( has_post_thumbnail() ) : ?>
						<div class="featured-image" style="background-image: url('<?php the_post_thumbnail_url( 'full' ); ?>');">
							<a href="<?php the_permalink();?>" class="post-thumbnail-link"></a>
						</div><!-- .featured-image -->
			        <?php endif; ?>

		            <div class="entry-container">
						<header class="entry-header">
							<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						</header>

						<?php cube_blog_posted_on() ?>
			        </div><!-- .entry-container -->
	            </article>
		        
			<?php
			endwhile; 
			wp_reset_postdata(); ?>
		</div><!-- .columns-3 -->
	</section>
<?php } ?>