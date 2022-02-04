<?php
/**
 * Member specific functionality
 *
 * @package Understrap
 */

 // Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

function pask_grad_year(){
    if(get_field('graduation_year')){
        $year = get_field('graduation_year');
        return "
            <div class='col-md-6'>
                <div class='year-label'>graduation<br>year:</div>
                <div class='year'>{$year}</div>
            </div>
        ";
    }
  
}