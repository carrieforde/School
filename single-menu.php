<?php
/**
 * Template for displaying all menu posts.
 *
 * @package alcatraz
 */
get_header(); ?>

	<div id="primary" class="content-area">

		<?php do_action( 'alcatraz_before_main' ); ?>

		<main id="main" class="site-main" role="main">

		<?php do_action( 'alcatraz_before_main_inside' ); ?>

		<?php while ( have_posts() ) : the_post(); ?>

			<?php $post_type = get_post_type();
			if ( 'post' == $post_type ) {
				$post_type = '';
			}
			get_template_part( 'template-parts/content-menu', $post_type ); ?>

			<?php
				// Maybe load comments.
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}
			?>

		<?php endwhile; ?>

		<?php do_action( 'alcatraz_after_main_inside' ); ?>

		</main>

		<?php do_action( 'alcatraz_after_main' ); ?>

	</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
