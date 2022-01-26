<?php
/**
 * ACF specific functionality
 *
 * @package Understrap
 */

 // Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

function plask_home_projects(){
    $list = '';
    $args = array(
            'post_type'  => 'projects',
            'posts_per_page' => 4,
            'orderby'        => 'rand',            
    );

    $resource_query = new WP_Query( $args ); 
    // The Loop
    if ( $resource_query->have_posts() ) :
        while ( $resource_query->have_posts() ) : $resource_query->the_post();
          // Do Stuff
            $title = get_the_title();
            // $url = get_field('link');
            echo "
            <div class='col-md-6'>
                <div class='project'>
                    <a href='#' class='project-link'>{$title}</a>
                </div>
            </div>
            ";
        endwhile;
       
    endif;

    // Reset Post Data
    wp_reset_postdata();
}