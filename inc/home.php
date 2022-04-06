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
        <div class='project projects-text'>   
            {$proj_desc}
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
            'posts_per_page' => 10,
            'orderby'        => 'rand',
              'tax_query' => array( // (array) - use taxonomy parameters (available with Version 3.1).
                array(
                'taxonomy' => 'member_status', // (string) - Taxonomy.
                'field' => 'slug', // (string) - Select taxonomy term by Possible values are 'term_id', 'name', 'slug' or 'term_taxonomy_id'. Default value is 'term_id'.
                'terms' => array( 'emeritus' ), // (int/string/array) - Taxonomy term(s).
                'operator' => 'NOT IN' // (string) - Operator to test. Possible values are 'IN', 'NOT IN', 'AND', 'EXISTS' and 'NOT EXISTS'. Default value is 'IN'.
                ),
              )
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
            if($count == 1 ){
            array_push($html, "
                <div class='col-md-4'>
                    <a href='{$url}' class='member-link'>
                        <div class='orange'>
                            <div class='tall-person home-person' style='background-image: url({$img})'>                        
                                {$title}
                            </div>
                        </div>
                    </a>
                </div>
                <div class='col-md-8'>
                    <div class='row'>
                    <div class='col-md-12'><a class='members-link home-header' href='members'>Lab<br>Members</a></div>
                ");
            }
            if($count == 2 || $count == 7){
                array_push($html, "
                <div class='col-md-5'>
                    <a href='{$url}' class='member-link'>
                        <div class='red'>
                            <div class='short-person home-person red' style='background-image: url({$img})'>
                                {$title}
                            </div>
                        </div>
                    </a>
                </div>
                ");
            }
            if($count == 3 || $count == 8){
                array_push($html, "
                <div class='col-md-7'>
                    <a href='{$url}' class='member-link'>
                        <div class='gray'>
                            <div class='short-person home-person gray' style='background-image: url({$img})'>                   
                                {$title}
                            </div>
                        </div>
                    </a>
                </div>
                ");
            }
            if($count == 4 || $count == 9){
                array_push($html, "
                <div class='col-md-7 last-img'>
                    <a href='{$url}' class='member-link'>
                        <div class='gray'>
                            <div class='short-person home-person gray' style='background-image: url({$img})'>                   
                                {$title}
                            </div>
                        </div>
                    </a>
                </div>
                ");
            }
            if($count == 5 || $count == 10 || $count == 6){
                array_push($html, "
                <div class='col-md-5 last-img'>
                    <a href='{$url}' class='member-link'>
                        <div class='yellow'>
                            <div class='med-person home-person' style='background-image: url({$img})'>
                            {$title}
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            </div>
                ");
            }
        endwhile;
       
    endif;
    echo implode(' ',$html). '<div class="col-md-12"></div>';
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