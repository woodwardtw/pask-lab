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
    <div class="about-content row" id="about">
        <div class="col-md-2 red-home">
        </div>
       <div class="col-md-8 about-text">
           <h2>About</h2>
            <?php the_field('about');?>
        </div>
    </div>
    <!--end about-->
    <!--about section-->
    <div class="projects-content row" id="projects">
        <div class="col-md-7">
           <div class="row project-row">
                <div class="col-md-6">
                      <div class="project">
                     proja
                    </div>
                </div>
                <div class="col-md-6">
                      <div class="project">
                     proja
                    </div>
                </div>
                <div class="col-md-6">
                      <div class="project">
                     proja
                    </div>
                </div>
                <div class="col-md-6">
                      <div class="project">
                     proja
                    </div>
                </div>
            </div>
        </div>        
       <div class="col-md-5">
           <div class="projects-text">
                <h2>Projects</h2>
                <?php the_field('projects');?>
            </div>
        </div>
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
