<?php
/**
 * Project partial template
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">


<div class="row">
	<div class="col-md-6 black">
			<?php echo get_the_post_thumbnail( $post->ID, 'member', array( 'class' => 'member-square' )); ?>
		<?php //echo pask_member_projects();?>
	</div>
	<div class="col-md-6 black">
		<header class="entry-header">
			<?php the_title( '<h1 class="project-title">', '</h1>' ); ?>
		</header><!-- .entry-header -->
		<div class="row">
		
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
