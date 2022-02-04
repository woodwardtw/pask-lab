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