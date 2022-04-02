<?php
/**
 * project specific functionality
 *
 * @package Understrap
 */

 // Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

function pask_project_members(){
    $html = '';
    if(get_field('project_relationship')){
        $projects = get_field('project_relationship');
        foreach ($projects as $project) {
           $id = $project->ID;
           $title = $project->post_title;
           $img = get_the_post_thumbnail($id, 'medium');
           $url = get_permalink( $id);
           $grad = get_the_terms($id, 'member_status');
           if($grad){
               $status = 'emeritus';
           } else            
           $html .= "
           <div class='project-member'>
                <a href='{$url}'>
                    <div class='project-member'>
                        <h3>{$title}</h2>
                    </div>
                </a>
           </div>
           ";
        }
        return "
            <div class='associated-projects'>
                <h2>Project Members</h2>
                        $html
            </div>";
    }
}