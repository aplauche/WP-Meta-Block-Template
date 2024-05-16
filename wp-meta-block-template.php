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
 * Text Domain:       fsdwmbt
 *
 * @package CreateBlock
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

$PLUGIN_URL = plugin_dir_url(__FILE__);
$PLUGIN_PATH = plugin_dir_path(__FILE__);

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


include_once(plugin_dir_path(__FILE__) . 'includes/register-post-type.php');
include_once(plugin_dir_path(__FILE__) . 'includes/editor-modifications.php');
