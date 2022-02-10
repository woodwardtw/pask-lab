<?php
/**
 * Member specific functionality
 *
 * @package Understrap
 */

 // Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

function pask_major(){
    if(get_field('majors')){
        $major = get_field('majors');
        return "
            <div class='col-md-7'>
                <div class='major-holder member-top-line member-bottom-line'>
                    <!--<div class='major-label'>major:</div-->
                    <div class='major'>{$major}</div>
                </div>
            </div>
        ";
    }
}

function pask_grad_year(){
    if(get_field('graduation_year')){
        $year = get_field('graduation_year');
        return "
            <div class='col-md-4'>
                <div class='year-holder member-top-line member-bottom-line'>
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

add_image_size( 'member', '600', '600', true );