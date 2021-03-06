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
			<?php echo get_the_post_thumbnail( $post->ID, 'bio-pic', array( 'class' => 'member-square' )); ?>
		</div>
		<?php echo pask_member_projects();?>
	</div>
	<div class="col-md-6 black">
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header><!-- .entry-header -->
		<div class="row">
			<?php echo pask_member_title();?>
			<?php echo pask_member_major();?>			
			<?php echo pask_member_grad_year();?>
			<?php echo pask_member_minor();?>
			<?php echo pask_member_bio();?>
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
