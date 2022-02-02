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
    $proj_intro = "
    <div class='col-md-4'>
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
            $img = get_the_post_thumbnail_url(get_the_ID(),'large'); 

            if($count == 3){
                $offset = 'offset-md-4';
            }
            if($count == 5){
                $offset = 'offset-md-8';
            }
            $title = get_the_title();
            $url = get_the_permalink();
            // $url = get_field('link');
            array_push($html, "
            <div class='col-md-4 {$offset}'>
                <div class='project'>
                <img class='project-img' src='{$img}'>
                    <a href='{$url}' class='project-link'>{$title}</a>
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
            'posts_per_page' => 5,
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
            $url = get_the_permalink();
            if($count == 1){
            array_push($html, "
                <div class='col-md-4'>
                    <div class='orange'>
                        <div class='tall-person home-person' style='background-image: url({$img})'>                        
                            <a href='{$url}' class='member-link'>{$title}</a>
                        </div>
                    </div>
                </div>
                <div class='col-md-8'>
                    <div class='row'>
                    <div class='col-md-12'><a class='members-link home-header' href='members'>Lab<br>Members</a></div>
                ");
            }
            if($count == 2){
                array_push($html, "
                <div class='col-md-5'>
                    <div class='red'>
                        <div class='short-person home-person red' style='background-image: url({$img})'>
                            <a href='{$url}' class='member-link'>{$title}</a>
                        </div>
                    </div>
                </div>
                ");
            }
            if($count == 3){
                array_push($html, "
                <div class='col-md-7'>
                    <div class='gray'>
                        <div class='short-person home-person gray' style='background-image: url({$img})'>                   
                            <a href='{$url}' class='member-link'>{$title}</a>
                        </div>
                    </div>
                </div>
                ");
            }
            if($count == 4){
                array_push($html, "
                <div class='col-md-7 last-img'>
                    <div class='gray'>
                        <div class='short-person home-person gray' style='background-image: url({$img})'>                   
                            <a href='{$url}' class='member-link'>{$title}</a>
                        </div>
                    </div>
                </div>
                ");
            }
            if($count == 5){
                array_push($html, "
                <div class='col-md-5 last-img'>
                    <div class='yellow'>
                        <div class='med-person home-person' style='background-image: url({$img})'>
                            <a href='{$url}' class='member-link'>{$title}</a>
                        </div>
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

function plask_home_news(){
    $html = array();
    $args = array(
            'post_type'  => 'post',
            'posts_per_page' => 8,
    );
   
    $news_query = new WP_Query( $args ); 
    // The Loop
    if ( $news_query->have_posts() ) :
        while ( $news_query->have_posts() ) : $news_query->the_post(); 
          // Do Stuff            
          $url = get_the_permalink();
          $title = get_the_title();
          $date = get_the_date();
            array_push($html, "
            <div class='col-md-3'>
                <a href='{$url}' class='news-link'>
                    <div class='news'>              
                        {$title}
                        <div class='news-date'>{$date}</div>
                    </div>
                </a>
            </div>
            ");
        endwhile;
       
    endif;
    echo implode(' ',$html);
    // Reset Post Data
    wp_reset_postdata();
}