<?php
/**
 * ACF specific functionality
 *
 * @package Understrap
 */

 // Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


//THIS BEAUTIFUL THING FROM https://www.advancedcustomfields.com/resources/bidirectional-relationships/
//MAKE SURE YOU have the acf name (label doesn't matter) be the same (project_relationship in this case)
function bidirectional_acf_update_value( $value, $post_id, $field  ) {
	
	// vars
	$field_name = $field['name'];
	$field_key = $field['key'];
	$global_name = 'is_updating_' . $field_name;
	
	
	// bail early if this filter was triggered from the update_field() function called within the loop below
	// - this prevents an inifinte loop
	if( !empty($GLOBALS[ $global_name ]) ) return $value;
	
	
	// set global variable to avoid inifite loop
	// - could also remove_filter() then add_filter() again, but this is simpler
	$GLOBALS[ $global_name ] = 1;
	
	
	// loop over selected posts and add this $post_id
	if( is_array($value) ) {
	
		foreach( $value as $post_id2 ) {
			
			// load existing related posts
			$value2 = get_field($field_name, $post_id2, false);
			
			
			// allow for selected posts to not contain a value
			if( empty($value2) ) {
				
				$value2 = array();
				
			}
			
			
			// bail early if the current $post_id is already found in selected post's $value2
			if( in_array($post_id, $value2) ) continue;
			
			
			// append the current $post_id to the selected post's 'related_posts' value
			$value2[] = $post_id;
			
			
			// update the selected post's value (use field's key for performance)
			update_field($field_key, $value2, $post_id2);
			
		}
	
	}
	
	
	// find posts which have been removed
	$old_value = get_field($field_name, $post_id, false);
	
	if( is_array($old_value) ) {
		
		foreach( $old_value as $post_id2 ) {
			
			// bail early if this value has not been removed
			if( is_array($value) && in_array($post_id2, $value) ) continue;
			
			
			// load existing related posts
			$value2 = get_field($field_name, $post_id2, false);
			
			
			// bail early if no value
			if( empty($value2) ) continue;
			
			
			// find the position of $post_id within $value2 so we can remove it
			$pos = array_search($post_id, $value2);
			
			
			// remove
			unset( $value2[ $pos] );
			
			
			// update the un-selected post's value (use field's key for performance)
			update_field($field_key, $value2, $post_id2);
			
		}
		
	}
	
	
	// reset global varibale to allow this filter to function as per normal
	$GLOBALS[ $global_name ] = 0;
	
	
	// return
    return $value;
    
}

add_filter('acf/update_value/name=project_relationship', 'bidirectional_acf_update_value', 10, 3);//note field name here

//save acf json
add_filter('acf/settings/save_json', 'pask_json_save_point');
       
function pask_json_save_point( $path ) {
    
    // update path
    $path = get_stylesheet_directory() . '/acf-json'; //replace w get_stylesheet_directory() for theme
    
    
    // return
    return $path;
    
}


// load acf json
add_filter('acf/settings/load_json', 'pask_json_load_point');

function pask_json_load_point( $paths ) {
    
    // remove original path (optional)
    unset($paths[0]);
    
    
    // append path
    $paths[] = get_stylesheet_directory()  . '/acf-json';//replace w get_stylesheet_directory() for theme
    
    
    // return
    return $paths;
    
}


//lab members display

function plask_lab_member_img(){
	$title = get_the_title();
	if(get_the_post_thumbnail_url(get_the_ID(),'bio-pic')){
		$img = get_the_post_thumbnail_url(get_the_ID(),'bio-pic');
		return 	"<img class='member-fit' src='{$img}' alt='Profile picture for {$title}.'>";	

	} else {
		$img = get_template_directory_uri()."/imgs/ant-head.jpg";
		return 	"<img class='member-fit' src='{$img}' alt='Profile picture for {$title}.'>";	
	}

}

function plask_lab_active_people(){
    $args = array(
            'post_type'  => 'member',
            'posts_per_page' => -1,
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
    $html = '';
    if ( $people_query->have_posts() ) :
        while ( $people_query->have_posts() ) : $people_query->the_post();
          // Do Stuff
            $title = get_the_title();
            $img = plask_lab_member_img();
            $url = get_the_permalink();
          	$html .= "<div class='col-md-4'>
	          			<div class='ratio ratio-1x1 lab-member-page'>
		          			<a href='{$url}'>
		          				{$img}	
								{$title}
							</a>
						</div>
					</div>";
        endwhile;
       
    endif;
    echo $html;
    // Reset Post Data
    wp_reset_postdata();
}   


function plask_lab_emeritus_people(){
    $args = array(
            'post_type'  => 'member',
            'posts_per_page' => -1,
            'orderby'        => 'rand',
              'tax_query' => array( // (array) - use taxonomy parameters (available with Version 3.1).
                array(
                'taxonomy' => 'member_status', // (string) - Taxonomy.
                'field' => 'slug', // (string) - Select taxonomy term by Possible values are 'term_id', 'name', 'slug' or 'term_taxonomy_id'. Default value is 'term_id'.
                'terms' => array( 'emeritus' ), // (int/string/array) - Taxonomy term(s).
                'operator' => 'IN' // (string) - Operator to test. Possible values are 'IN', 'NOT IN', 'AND', 'EXISTS' and 'NOT EXISTS'. Default value is 'IN'.
                ),
              )
    );
   
    $people_query = new WP_Query( $args ); 
    // The Loop
    $html = '';
    if ( $people_query->have_posts() ) :
        while ( $people_query->have_posts() ) : $people_query->the_post();
          // Do Stuff
            $title = get_the_title();
            $img = plask_lab_member_img(); 
            $url = get_the_permalink();
          	$html .= "<div class='col-md-4'>
	          			<div class='ratio ratio-1x1 lab-member-page'>
	          				<a href='{$url}'>
	          					{$img}
								{$title}
							</a>
						</div>
					</div>";
        endwhile;
       
    endif;
    echo $html;
    // Reset Post Data
    wp_reset_postdata();
}  