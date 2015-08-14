<?php

/**
 * Template for displaying the Events Loop
 * You can copy this file to your-theme
 * and then edit the layout. 
 */

get_header();

$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

$args = array(
	'post_type'      => 'myfossil_document',
	'order'          => 'ASC',
	'paged'          => $paged,
	'posts_per_page' => 10,
);

$wp_query = new WP_Query( $args );
?>

<div id="buddypress" class="container page-styling site-main" role="main">
documents-loop.php template loaded from myfossil-documents plugin

	<h2 class="entry-title">All Documents</h2>

	<div>   
	    <h3>Search Documents</h3>
	    <form role="search" action="<?php echo site_url('/'); ?>" method="get" id="searchform">
	    <input type="text" name="s" placeholder="Search Documents"/>
	    <input type="hidden" name="post_type" value="myfossil_document" /> <!-- // hidden 'products' value -->
	    <input type="submit" alt="Search" value="Search" />
	  </form>
	</div>	
	
	<?php if ( $wp_query->have_posts() ) : ?>

		<div class="entry-content"><br/>
			<?php //echo mf_pagination( $wp_query ); // use existing function for pagination? ?>
		</div>

		<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); 	?>

			<div class="entry-content">

				<h4 class="entry-title">
					<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
					<?php the_title(); ?></a>
				</h4>

				<?php the_excerpt(); ?>


				<?php
				if ( has_post_thumbnail() ) {
					the_post_thumbnail( 'thumbnail' );
					echo '<br/>';
				}
				?>



				<br/>
				Category: <?php the_category(', ') ?>


			</div><!-- .entry-content -->

	<?php endwhile; ?>

	<div class="entry-content"><br/>
		<?php //echo mf_pagination( $wp_query ); ?>
	</div>

	<?php else : ?>

		<div class="entry-content"><br/>There are no Documents.</div>

	<?php endif; ?>


	<?php wp_reset_postdata(); ?>

</div><!-- #primary -->

<?php get_footer(); ?>