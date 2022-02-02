<?php
/**
 * Data - cpt and taxonomic specific functionality
 *
 * @package Understrap
 */

 // Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Register Custom Post Type member
// Post Type Key: member
function create_member_cpt() {
$labels = array(
    'name' => __( 'member', 'Post Type General Name', 'textdomain' ),
    'singular_name' => __( 'member', 'Post Type Singular Name', 'textdomain' ),
    'menu_name' => __( 'Members', 'textdomain' ),
    'name_admin_bar' => __( 'member', 'textdomain' ),
    'archives' => __( 'member Archives', 'textdomain' ),
    'attributes' => __( 'member Attributes', 'textdomain' ),
    'parent_item_colon' => __( 'member:', 'textdomain' ),
    'all_items' => __( 'All members', 'textdomain' ),
    'add_new_item' => __( 'Add New member', 'textdomain' ),
    'add_new' => __( 'Add New', 'textdomain' ),
    'new_item' => __( 'New member', 'textdomain' ),
    'edit_item' => __( 'Edit member', 'textdomain' ),
    'update_item' => __( 'Update member', 'textdomain' ),
    'view_item' => __( 'View member', 'textdomain' ),
    'view_items' => __( 'View members', 'textdomain' ),
    'search_items' => __( 'Search members', 'textdomain' ),
    'not_found' => __( 'Not found', 'textdomain' ),
    'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
    'featured_image' => __( 'Featured Image', 'textdomain' ),
    'set_featured_image' => __( 'Set featured image', 'textdomain' ),
    'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
    'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
    'insert_into_item' => __( 'Insert into member', 'textdomain' ),
    'uploaded_to_this_item' => __( 'Uploaded to this member', 'textdomain' ),
    'items_list' => __( 'People list', 'textdomain' ),
    'items_list_navigation' => __( 'member list navigation', 'textdomain' ),
    'filter_items_list' => __( 'Filter member list', 'textdomain' ),
  );
  $args = array(
    'label' => __( 'member', 'textdomain' ),
    'description' => __( '', 'textdomain' ),
    'labels' => $labels,
    'menu_icon' => '',
    'supports' => array('title', 'editor', 'revisions', 'author', 'trackbacks', 'custom-fields', 'thumbnail',),
    'taxonomies' => array('category', 'post_tag'),
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 5,
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'can_export' => true,
    'has_archive' => true,
    'hierarchical' => false,
    'exclude_from_search' => false,
    'show_in_rest' => true,
    'publicly_queryable' => true,
    'capability_type' => 'post',
    'menu_icon' => 'dashicons-admin-users',
  );
  register_post_type( 'member', $args );
  
  // flush rewrite rules because we changed the permalink structure
  global $wp_rewrite;
  $wp_rewrite->flush_rules();
}
add_action( 'init', 'create_member_cpt', 0 );

// Register Custom Post Type Project
// Post Type Key: projects
function create_projects_cpt() {
$labels = array(
    'name' => __( 'Projects', 'Post Type General Name', 'textdomain' ),
    'singular_name' => __( 'Project', 'Post Type Singular Name', 'textdomain' ),
    'menu_name' => __( 'Projects', 'textdomain' ),
    'name_admin_bar' => __( 'Projects', 'textdomain' ),
    'archives' => __( 'Projects Archives', 'textdomain' ),
    'attributes' => __( 'Projects Attributes', 'textdomain' ),
    'parent_item_colon' => __( 'projects:', 'textdomain' ),
    'all_items' => __( 'All projects', 'textdomain' ),
    'add_new_item' => __( 'Add New projects', 'textdomain' ),
    'add_new' => __( 'Add New', 'textdomain' ),
    'new_item' => __( 'New projects', 'textdomain' ),
    'edit_item' => __( 'Edit project', 'textdomain' ),
    'update_item' => __( 'Update project', 'textdomain' ),
    'view_item' => __( 'View Project', 'textdomain' ),
    'view_items' => __( 'View Projects', 'textdomain' ),
    'search_items' => __( 'Search Projects', 'textdomain' ),
    'not_found' => __( 'Not found', 'textdomain' ),
    'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
    'featured_image' => __( 'Featured Image', 'textdomain' ),
    'set_featured_image' => __( 'Set featured image', 'textdomain' ),
    'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
    'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
    'insert_into_item' => __( 'Insert into project', 'textdomain' ),
    'uploaded_to_this_item' => __( 'Uploaded to this project', 'textdomain' ),
    'items_list' => __( 'Project list', 'textdomain' ),
    'items_list_navigation' => __( 'projects list navigation', 'textdomain' ),
    'filter_items_list' => __( 'Filter projects list', 'textdomain' ),
  );
  $args = array(
    'label' => __( 'projects', 'textdomain' ),
    'description' => __( '', 'textdomain' ),
    'labels' => $labels,
    'menu_icon' => '',
    'supports' => array('title', 'editor', 'revisions', 'author', 'trackbacks', 'custom-fields', 'thumbnail',),
    'taxonomies' => array('category', 'post_tag'),
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 5,
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'can_export' => true,
    'has_archive' => true,
    'hierarchical' => false,
    'exclude_from_search' => false,
    'show_in_rest' => true,
    'publicly_queryable' => true,
    'capability_type' => 'post',
    'menu_icon' => 'dashicons-admin-users',
  );
  register_post_type( 'projects', $args );
  
  // flush rewrite rules because we changed the permalink structure
  global $wp_rewrite;
  $wp_rewrite->flush_rules();
}
add_action( 'init', 'create_projects_cpt', 0 );