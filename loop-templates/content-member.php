<?php
/**
 * Member post partial template
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">


<div class="row">
	<div class="col-md-6 black">
		<div class="member-img-holder">
			<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>
		</div>
	</div>
	<div class="col-md-6 black">
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header><!-- .entry-header -->
		<div class="row member-top-line">
			<?php echo pask_grad_year();?>
		</div>
	</div>
	<div class="entry-content">

		<?php
		the_content();
		understrap_link_pages();
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php understrap_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
