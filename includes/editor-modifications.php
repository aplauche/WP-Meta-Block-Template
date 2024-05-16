<?php

/**
 * Enqueue plugin specific editor scripts
 */
function fsd_enqueue_editor_scripts() {

  global $PLUGIN_URL;

	$asset_file = fsd_get_asset_file( 'build/editor' );

	wp_enqueue_script(
		'fsd-meta-custom-editor',
		$PLUGIN_URL . 'build/editor.js',
		[...$asset_file['dependencies'], 'wp-edit-post'],
		$asset_file['version']
	);

  // Add custom data as a variable in JS
  wp_localize_script( 'fsd-meta-custom-editor', 'postData',
      array( 
        'postType' => get_post_type( get_the_id() ),
        'postId' => get_the_id(),
      )
  );
}
add_action( 'enqueue_block_editor_assets', 'fsd_enqueue_editor_scripts' );


/**
 * Loads the asset file for the given script or style.
 * Returns a default if the asset file is not found.
 */
function fsd_get_asset_file( $filepath ) {

  global $PLUGIN_PATH;

	$asset_path = $PLUGIN_PATH . $filepath . '.asset.php';

	return file_exists( $asset_path )
		? include $asset_path
		: array(
			'dependencies' => array(),
			'version'      => microtime(),
		);
}