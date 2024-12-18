<?php
/**
 * Plugin Name:       GenPress global colour palette for Beaver Builder colour picker
 * Plugin URI:        https://github.com/weavedigitalstudio/Weave-Funeral-Site-Additions/ 
 * Description:       A custom plugin to add Beaver Builder color picker compatibility for the GeneratePress Global Color Palette.
 * Version:           0.1.1
 * Primary Branch:    main
 * GitHub Plugin URI: weavedigitalstudio/GeneratePress-BB-Color-Palettes
 * Author:            Weave Digital Studio
 * License:           MIT
 */

/**
 * Plugin Name: Weave Funeral Site Additions
 * Plugin URI: https://github.com/weavedigitalstudio/Weave-Funeral-Site-Additions/
 * Description: Adds custom post types and taxonomies for Staff, Caskets, and Urns for the funeral industry
 * Version: 1.0.0
 * Author: Weave Digital Studio
 * Author URI: https://weave.co.nz
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Primary Branch:    main
 * GitHub Plugin URI: weavedigitalstudio/Weave-Funeral-Site-Additions/
 * Text Domain: weave-funeral-cpt
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
	die;
}

/**
 * Register Staff Custom Post Type
 */
if (!function_exists('wv_fn_cpt_register_staff')) {
	function wv_fn_cpt_register_staff() {
		$labels = array(
			'name'                  => _x('Team', 'Post type general name', 'weave-funeral-cpt'),
			'singular_name'         => _x('Team Member', 'Post type singular name', 'weave-funeral-cpt'),
			'menu_name'             => _x('Funeral Team', 'Admin Menu text', 'weave-funeral-cpt'),
			'name_admin_bar'        => _x('Funeral Team', 'Add New on Toolbar', 'weave-funeral-cpt'),
			'add_new'              => __('Add Team Member', 'weave-funeral-cpt'),
			'add_new_item'         => __('Add New Team Member', 'weave-funeral-cpt'),
			'new_item'             => __('New Team Member', 'weave-funeral-cpt'),
			'edit_item'            => __('Edit Team Member', 'weave-funeral-cpt'),
			'view_item'            => __('View Team Member', 'weave-funeral-cpt'),
			'all_items'            => __('All Team', 'weave-funeral-cpt'),
			'search_items'         => __('Search Team', 'weave-funeral-cpt'),
			'not_found'            => __('No team members found.', 'weave-funeral-cpt'),
			'not_found_in_trash'   => __('No team members found in Trash.', 'weave-funeral-cpt'),
			'featured_image'        => __('Team Image', 'weave-funeral-cpt'),
			'set_featured_image'    => __('Set staff image', 'weave-funeral-cpt'),
			'remove_featured_image' => __('Remove staff image', 'weave-funeral-cpt'),
			'use_featured_image'    => __('Use as staff image', 'weave-funeral-cpt'),
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array('slug' => 'team'),
			'capability_type'    => 'page',
			'has_archive'        => false,
			'hierarchical'       => false,
			'menu_position'      => 5,
			'menu_icon'          => 'dashicons-businesswoman',
			'supports'           => array('title', 'editor', 'thumbnail'),
			'show_in_rest'       => true,
			'show_in_nav_menus'  => false,
			'exclude_from_search'=> true,
		);

		register_post_type('wv_fn_staff', $args);
	}
	add_action('init', 'wv_fn_cpt_register_staff', 0);
}

/**
 * Register Staff Location Taxonomy
 */
if (!function_exists('wv_fn_tax_register_locations')) {
	function wv_fn_tax_register_locations() {
		$labels = array(
			'name'              => _x('Locations', 'taxonomy general name', 'weave-funeral-cpt'),
			'singular_name'     => _x('Location', 'taxonomy singular name', 'weave-funeral-cpt'),
			'menu_name'         => __('Location', 'weave-funeral-cpt'),
			'all_items'         => __('All Locations', 'weave-funeral-cpt'),
			'edit_item'         => __('Edit Location', 'weave-funeral-cpt'),
			'update_item'       => __('Update Location', 'weave-funeral-cpt'),
			'add_new_item'      => __('Add New Location', 'weave-funeral-cpt'),
			'new_item_name'     => __('New Location Name', 'weave-funeral-cpt'),
		);

		$args = array(
			'labels'            => $labels,
			'hierarchical'      => true,
			'public'            => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_tagcloud'     => false,
			'show_in_rest'      => true,
		);

		register_taxonomy('wv_fn_location', array('wv_fn_staff'), $args);
	}
	add_action('init', 'wv_fn_tax_register_locations', 0);
}

/**
 * Register Staff Role Taxonomy
 */
if (!function_exists('wv_fn_tax_register_roles')) {
	function wv_fn_tax_register_roles() {
		$labels = array(
			'name'              => _x('Job Roles', 'taxonomy general name', 'weave-funeral-cpt'),
			'singular_name'     => _x('Job Role', 'taxonomy singular name', 'weave-funeral-cpt'),
			'menu_name'         => __('Job Roles', 'weave-funeral-cpt'),
			'all_items'         => __('All Job Roles', 'weave-funeral-cpt'),
			'edit_item'         => __('Edit Job Role', 'weave-funeral-cpt'),
			'update_item'       => __('Update Job Role', 'weave-funeral-cpt'),
			'add_new_item'      => __('Add New Job Role', 'weave-funeral-cpt'),
			'new_item_name'     => __('New Job Role Name', 'weave-funeral-cpt'),
		);

		$args = array(
			'labels'            => $labels,
			'hierarchical'      => true,
			'public'            => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_tagcloud'     => false,
			'show_in_rest'      => true,
		);

		register_taxonomy('wv_fn_role', array('wv_fn_staff'), $args);
	}
	add_action('init', 'wv_fn_tax_register_roles', 0);
}

/**
 * Register Caskets Custom Post Type
 */
if (!function_exists('wv_fn_cpt_register_caskets')) {
	function wv_fn_cpt_register_caskets() {
		$labels = array(
			'name'                  => _x('Caskets', 'Post type general name', 'weave-funeral-cpt'),
			'singular_name'         => _x('Casket', 'Post type singular name', 'weave-funeral-cpt'),
			'menu_name'             => _x('Caskets', 'Admin Menu text', 'weave-funeral-cpt'),
			'add_new'              => __('Add New', 'weave-funeral-cpt'),
			'add_new_item'         => __('Add New Casket', 'weave-funeral-cpt'),
			'edit_item'            => __('Edit Casket', 'weave-funeral-cpt'),
			'new_item'             => __('New Casket', 'weave-funeral-cpt'),
			'view_item'            => __('View Casket', 'weave-funeral-cpt'),
			'view_items'           => __('View Caskets', 'weave-funeral-cpt'),
			'search_items'         => __('Search Caskets', 'weave-funeral-cpt'),
			'not_found'            => __('No caskets found.', 'weave-funeral-cpt'),
			'not_found_in_trash'   => __('No caskets found in Trash.', 'weave-funeral-cpt'),
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array('slug' => 'caskets'),
			'capability_type'    => 'page',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 20,
			'menu_icon'          => 'dashicons-archive',
			'supports'           => array('title', 'editor', 'thumbnail', 'page-attributes', 'revisions'),
			'show_in_rest'       => true,
			'exclude_from_search'=> true,
		);

		register_post_type('wv_fn_casket', $args);
	}
	add_action('init', 'wv_fn_cpt_register_caskets', 0);
}

/**
 * Register Caskets Category Taxonomy
 */
if (!function_exists('wv_fn_tax_register_casket_categories')) {
	function wv_fn_tax_register_casket_categories() {
		$labels = array(
			'name'              => _x('Casket Categories', 'taxonomy general name', 'weave-funeral-cpt'),
			'singular_name'     => _x('Casket Category', 'taxonomy singular name', 'weave-funeral-cpt'),
			'menu_name'         => __('Categories', 'weave-funeral-cpt'),
			'all_items'         => __('All Categories', 'weave-funeral-cpt'),
			'edit_item'         => __('Edit Category', 'weave-funeral-cpt'),
			'update_item'       => __('Update Category', 'weave-funeral-cpt'),
			'add_new_item'      => __('Add New Category', 'weave-funeral-cpt'),
			'new_item_name'     => __('New Category Name', 'weave-funeral-cpt'),
		);

		$args = array(
			'labels'            => $labels,
			'hierarchical'      => true,
			'public'            => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_tagcloud'     => true,
			'show_in_rest'      => true,
		);

		register_taxonomy('wv_fn_casket_category', array('wv_fn_casket'), $args);
	}
	add_action('init', 'wv_fn_tax_register_casket_categories', 0);
}

/**
 * Register Urns Custom Post Type
 */
if (!function_exists('wv_fn_cpt_register_urns')) {
	function wv_fn_cpt_register_urns() {
		$labels = array(
			'name'                  => _x('Urns', 'Post type general name', 'weave-funeral-cpt'),
			'singular_name'         => _x('Urn', 'Post type singular name', 'weave-funeral-cpt'),
			'menu_name'             => _x('Urns', 'Admin Menu text', 'weave-funeral-cpt'),
			'add_new'              => __('Add New', 'weave-funeral-cpt'),
			'add_new_item'         => __('Add New Urn', 'weave-funeral-cpt'),
			'edit_item'            => __('Edit Urn', 'weave-funeral-cpt'),
			'new_item'             => __('New Urn', 'weave-funeral-cpt'),
			'view_item'            => __('View Urn', 'weave-funeral-cpt'),
			'view_items'           => __('View Urns', 'weave-funeral-cpt'),
			'search_items'         => __('Search Urns', 'weave-funeral-cpt'),
			'not_found'            => __('No urns found.', 'weave-funeral-cpt'),
			'not_found_in_trash'   => __('No urns found in Trash.', 'weave-funeral-cpt'),
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array('slug' => 'urns'),
			'capability_type'    => 'page',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 21,
			'menu_icon'          => 'dashicons-art',
			'supports'           => array('title', 'editor', 'thumbnail', 'page-attributes', 'revisions'),
			'show_in_rest'       => true,
			'exclude_from_search'=> true,
		);

		register_post_type('wv_fn_urn', $args);
	}
	add_action('init', 'wv_fn_cpt_register_urns', 0);
}

/**
 * Register Urns Category Taxonomy
 */
if (!function_exists('wv_fn_tax_register_urn_categories')) {
	function wv_fn_tax_register_urn_categories() {
		$labels = array(
			'name'              => _x('Urn Categories', 'taxonomy general name', 'weave-funeral-cpt'),
			'singular_name'     => _x('Urn Category', 'taxonomy singular name', 'weave-funeral-cpt'),
			'menu_name'         => __('Categories', 'weave-funeral-cpt'),
			'all_items'         => __('All Categories', 'weave-funeral-cpt'),
			'edit_item'         => __('Edit Category', 'weave-funeral-cpt'),
			'update_item'       => __('Update Category', 'weave-funeral-cpt'),
			'add_new_item'      => __('Add New Category', 'weave-funeral-cpt'),
			'new_item_name'     => __('New Category Name', 'weave-funeral-cpt'),
		);

		$args = array(
			'labels'            => $labels,
			'hierarchical'      => true,
			'public'            => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_tagcloud'     => true,
			'show_in_rest'      => true,
		);

		register_taxonomy('wv_fn_urn_category', array('wv_fn_urn'), $args);
	}
	add_action('init', 'wv_fn_tax_register_urn_categories', 0);
}
			
/**
 * Customise the title placeholder for Staff post type
 * 
 * This function changes the default "Enter title here" text in the title field
 * to provide more specific guidance when creating a new staff member entry.
 */
if (!function_exists('wv_fn_staff_change_title_text')) {
	function wv_fn_staff_change_title_text($title) {
		$screen = get_current_screen();
		
		if ('wv_fn_staff' == $screen->post_type) {
			$title = 'Enter team member full name here';
		}
		
		return $title;
	}
	add_filter('enter_title_here', 'wv_fn_staff_change_title_text');
}

/**
 * Flush rewrite rules on plugin activation
 * 
 * This ensures that all our custom post types and taxonomies are properly registered
 * and their permalinks will work correctly after activation.
 */
function wv_fn_cpt_activate() {
	// Register all post types
	wv_fn_cpt_register_staff();
	wv_fn_cpt_register_caskets();
	wv_fn_cpt_register_urns();
	
	// Register all taxonomies
	wv_fn_tax_register_locations();
	wv_fn_tax_register_roles();
	wv_fn_tax_register_casket_categories();
	wv_fn_tax_register_urn_categories();
	
	// Flush rewrite rules
	flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'wv_fn_cpt_activate');

/**
 * Flush rewrite rules on plugin deactivation
 * 
 * This ensures clean removal of our custom post type and taxonomy rules
 * from the site's permalink structure.
 */
function wv_fn_cpt_deactivate() {
	flush_rewrite_rules();
}
register_deactivation_hook(__FILE__, 'wv_fn_cpt_deactivate');
