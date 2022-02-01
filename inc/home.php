<?php
/**
 * ACF specific functionality
 *
 * @package Understrap
 */

 // Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

function plask_home_projects(){
    $html = array();
    $args = array(
            'post_type'  => 'projects',
            'posts_per_page' => 5,
            'orderby'        => 'rand',            
    );
    $proj_desc = get_field('projects');
    $proj_intro = "<div class='col-md-4'>
    <div class='projects-text'>   
    {$proj_desc}
    <a class='see-more' href='projects'>See more projects</a>
    </div>
    </div>";
    $resource_query = new WP_Query( $args ); 
    // The Loop
    $count = 0;
    if ( $resource_query->have_posts() ) :
        while ( $resource_query->have_posts() ) : $resource_query->the_post();  $count++;
          // Do Stuff
            $offset = '';
            if($count == 3){
                $offset = 'offset-md-4';
            }
            if($count == 5){
                $offset = 'offset-md-8';
            }
            $title = get_the_title();
            // $url = get_field('link');
            array_push($html, "
            <div class='col-md-4 {$offset}'>
                <div class='project'>
                    <a href='#' class='project-link'>{$title}</a>
                </div>
            </div>
            ");
        endwhile;
       
    endif;
    array_splice( $html, 2, 0, $proj_intro );
    echo implode(' ',$html);
    // Reset Post Data
    wp_reset_postdata();
}

function plask_home_people(){
    $html = array();
    $args = array(
            'post_type'  => 'member',
            'posts_per_page' => 4,
            //'orderby'        => 'rand',            
    );
   
    $people_query = new WP_Query( $args ); 
    // The Loop
    $count = 0;
    if ( $people_query->have_posts() ) :
        while ( $people_query->have_posts() ) : $people_query->the_post();  $count++;
          // Do Stuff
            $title = get_the_title();
            $img = get_the_post_thumbnail_url(get_the_ID(),'large'); 
            if($count == 1){
            array_push($html, "
                <div class='col-md-4'>
                    <div class='tall-person home-person orange'>
                        <img src='{$img}'>
                        <a href='#' class='project-link'>{$title}</a>
                    </div>
                </div>
                <div class='col-md-8'>
                    <div class='row'>
                    <div class='col-md-12'><a class='members-link' href='members'>Lab<br>Members</a></div>
                ");
            }
            if($count == 2){
                array_push($html, "
                <div class='col-md-5'>
                    <div class='short-person home-person red'>
                        <img src='{$img}'>
                        {$title}
                    </div>
                </div>
                ");
            }
            if($count == 3){
                array_push($html, "
                <div class='col-md-7'>
                    <div class='short-person home-person gray'>
                    <img src='{$img}'>
                        {$title}
                    </div>
                </div>
                ");
            }
            if($count == 4){
                array_push($html, "
                <div class='col-md-12'>
                    <div class='med-person home-person yellow'>
                    <img src='{$img}'>
                        {$title}
                    </div>
                </div>
            </div>
            </div>
                ");
            }
        endwhile;
       
    endif;
    echo implode(' ',$html);
    // Reset Post Data
    wp_reset_postdata();
}