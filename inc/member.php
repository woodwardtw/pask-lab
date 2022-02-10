<?php
/**
 * Member specific functionality
 *
 * @package Understrap
 */

 // Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

function pask_member_title(){
    if(get_field('title')){
        $title = get_field('title');
        return "
            <div class='col-md-11'>
                <div class='title-holder member-top-line member-bottom-line'>
                    <div class='title'>{$title}</div>
                </div>
            </div>
        ";
    }
}

function pask_member_major(){
    if(get_field('majors')){
        $major = get_field('majors');
        return "
            <div class='col-md-7'>
                <div class='major-holder member-bottom-line'>
                    <div class='major'>{$major}</div>
                </div>
            </div>
        ";
    }
}

function pask_member_grad_year(){
    if(get_field('graduation_year')){
        $year = get_field('graduation_year');
        return "
            <div class='col-md-4'>
                <div class='year-holder member-bottom-line'>
                    <div class='year-label'>graduation<br>year:</div>
                    <div class='year'>{$year}</div>
                </div>
            </div>
        ";
    }
}

function pask_member_bio(){
    if (get_field('bio')){
        $bio = get_field('bio');
        return "
            <div class='col-md-12'>
                <div class='member-bio'>
                    {$bio}
                </div>
            </div>
        ";
    }
}

function pask_member_projects(){
    $html = '';
    if(get_field('associated_projects')){
        $projects = get_field('associated_projects');
        foreach ($projects as $project) {
           $id = $project->ID;
           $title = $project->post_title;
           $img = get_the_post_thumbnail($id, 'medium');
           $url = get_permalink( $id);
           $html .= "
           <div class='member-project col-md-4'>
                <a href='{$url}'>
                    <div class=''>
                        <h3>{$title}</h2>
                    </div>
                </a>
           </div>
           ";
        }
        return "<div class='row d-flex justify-content-around'>
                    <div class='col-md-12'>
                        <h2>Associated Projects</h2>
                    </div>
                        $html
            </div>";
    }
}

add_image_size( 'member', '600', '600', true ); //add image size for members