<?php
/**
 * Partial template for content in home.php
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
    <!--about section-->
    <div class="about-content row black-row" id="about">       
       <div class="col-md-6">
           <div class="about-text">
                <h2>About</h2>
                <?php the_field('about');?>
</div>
        </div>
        <div class="col-md-6 black-block">
            <img src="<?php echo get_template_directory_uri();?>/imgs/ant-head.jpg">
        </div>
    </div>
    <!--end about-->
    <!--about section-->
    <div class="projects-content row" id="projects">
               <?php plask_home_projects();?>              
    </div>
    <!--end about-->

	<div class="entry-content">

		<?php
		the_content();
		understrap_link_pages();
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php understrap_edit_post_link(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
