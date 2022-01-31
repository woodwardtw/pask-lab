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
        <div class="col-md-6">
           <div class="row project-row">
               <?php plask_home_projects();?>
                <!-- <div class="col-md-6">
                    <div class="project">
                        
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
                </div> -->
            </div>
        </div>        
       <div class="col-md-6">
           <div class="projects-text">
                <h2>Projects</h2>
                <?php the_field('projects');?>
                <a class="see-more" href="projects">See more projects <span class="arrow"></span></a>
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
