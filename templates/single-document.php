<?php

 /** 
 * Template for displaying a single Document
 * You can copy this file to your theme
 * and then edit the layout.
 */

get_header(); 
?>

<div id="buddypress" class="container page-styling site-main" role="main">
single-document.php template loaded from myfossil-documents plugin

	<h2 class="entry-title">Single Document</h2>

	<?php while ( have_posts() ) : the_post(); ?>

		<div class="entry-content">
			<br/>
			<h4 class="entry-title">
				<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
				<?php the_title(); ?></a>
			</h4>

			<br/>

			<?php
			if ( has_post_thumbnail() ) {
				echo '<br/>';
				the_post_thumbnail( 'large' );
				echo '<br/>';
			}
			?>

			<?php the_content(); ?>

			<br/>
			Category: <?php the_category(', ') ?>

		</div>

		<br/>
		<div class="entry-content">
			<nav class="nav-single">
				<span class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'bp-simple_events' ) . '</span> %title' ); ?></span>
				&nbsp; &nbsp;
				<span class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'bp-simple_events' ) . '</span>' ); ?></span>
			</nav><!-- .nav-single -->
		</div>
		<?php comments_template( '', true ); ?>

	<?php endwhile; ?>


</div><!-- #primary -->

<?php get_footer(); ?>