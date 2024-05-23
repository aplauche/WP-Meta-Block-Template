<?php

/**
 * Plugin Name:       WP Meta Block Template
 * Description:       Example of creating structured CPTs with a meta block 
 * Requires at least: 6.1
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            The WordPress Contributors
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       fsd
 *
 * @package CreateBlock
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
function fsd_register_meta_block()
{
	register_block_type(__DIR__ . '/build');
}
add_action('init', 'fsd_register_meta_block');

/**
 * Loads the asset file for the given script or style.
 * Returns a default if the asset file is not found.
 */
function fsd_get_asset_file( $filepath ) {

  $PLUGIN_PATH = plugin_dir_path(__FILE__);

	// grab the asset file
	$asset_path = $PLUGIN_PATH . $filepath . '.asset.php';

	// if missing for some reason, can define defaults
	return file_exists( $asset_path )
		? include $asset_path
		: array(
			'dependencies' => array(),
			'version'      => microtime(),
		);
}

/**
 * Enqueue plugin specific editor scripts
 */
function fsd_enqueue_editor_scripts() {

  $PLUGIN_URL = plugin_dir_url(__FILE__);

	// get our asset file with dependencies / version
	$asset_file = fsd_get_asset_file( 'build/editor' );

	// enqueue the script
	wp_enqueue_script(
		'fsd-meta-custom-editor',
		$PLUGIN_URL . 'build/editor.js',
		[...$asset_file['dependencies'], 'wp-edit-post'], // I manually add wp-edit-post here as an extra safety to make sure our deregister happens AFTER any registration
		$asset_file['version']
	);

  // Add Post Types custom data as a variable for our JS to reference
  wp_localize_script( 'fsd-meta-custom-editor', 'postData',
      array( 
        'postType' => get_post_type( get_the_id() ),
      )
  );
}
add_action( 'enqueue_block_editor_assets', 'fsd_enqueue_editor_scripts' );


include_once(plugin_dir_path(__FILE__) . 'includes/register-post-type.php');
