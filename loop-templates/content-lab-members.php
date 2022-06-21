<?php
/**
 * Partial template for content in page.php
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

	</header><!-- .entry-header -->

	<div class="entry-content">

		<?php
		the_content();
		?>

	</div><!-- .entry-content -->
	<h2>Active Members</h2>
	<div class="row">
			<?php plask_lab_active_people();?>
	</div>
	<h2>Emeritus Members</h2>
	<div class="row">
			<?php plask_lab_emeritus_people();?>
	</div>

	<footer class="entry-footer">

		<?php understrap_edit_post_link(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
