<?php
/**
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */
?>

<?php /*

We could render some block output here, or leave blank and handle metadata in the template file - depends on the use case

*/ 

global $post;

?>

<div <?php echo get_block_wrapper_attributes(); ?>>

	<div>
		<svg width="24px" height="24px" viewBox="0 0 24 24" stroke-width="1.5" fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000"><path d="M21 4V20C21 21.1046 20.1046 22 19 22H5C3.89543 22 3 21.1046 3 20V4C3 2.89543 3.89543 2 5 2H19C20.1046 2 21 2.89543 21 4Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M3 8L11 8L11 6" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M21 8L13 8L13 6" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
		<p><?php esc_html_e( get_post_meta( $post->ID, 'bedrooms', true ) ); ?> Bedrooms</p>
	</div>

	<div>
		<svg width="24px" height="24px" viewBox="0 0 24 24" stroke-width="1.5" fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000"><path d="M21 13V16C21 18.2091 19.2091 20 17 20H7C4.79086 20 3 18.2091 3 16V13.6C3 13.2686 3.26863 13 3.6 13H21Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M16 20L17 22" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M8 20L7 22" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M21 13V7C21 4.79086 19.2091 3 17 3H12" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M15.4 8H8.60003C8.26865 8 8.00393 7.7317 8.04019 7.4023C8.18624 6.07539 8.86312 3 12 3C15.1369 3 15.8138 6.07539 15.9598 7.4023C15.9961 7.73169 15.7314 8 15.4 8Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
		<p><?php esc_html_e( get_post_meta( $post->ID, 'bathrooms', true ) ); ?> Bathrooms</p>
	</div>

	<div>
		<svg width="24px" height="24px" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000"><path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M15 8.5C14.315 7.81501 13.1087 7.33855 12 7.30872M9 15C9.64448 15.8593 10.8428 16.3494 12 16.391M12 7.30872C10.6809 7.27322 9.5 7.86998 9.5 9.50001C9.5 12.5 15 11 15 14C15 15.711 13.5362 16.4462 12 16.391M12 7.30872V5.5M12 16.391V18.5" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
		<p>$<?php esc_html_e( get_post_meta( $post->ID, 'price', true ) ); ?></p>
	</div>

	<div>
		<svg width="24px" height="24px" viewBox="0 0 24 24" stroke-width="1.5" fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000"><path d="M3 21L3 3L9 3V15L21 15V21H3Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M13 19V21" stroke="#000000" stroke-width="1.5" stroke-linecap="round"></path><path d="M9 19V21" stroke="#000000" stroke-width="1.5" stroke-linecap="round"></path><path d="M3 7H5" stroke="#000000" stroke-width="1.5" stroke-linecap="round"></path><path d="M3 11H5" stroke="#000000" stroke-width="1.5" stroke-linecap="round"></path><path d="M3 15H5" stroke="#000000" stroke-width="1.5" stroke-linecap="round"></path><path d="M17 19V21" stroke="#000000" stroke-width="1.5" stroke-linecap="round"></path></svg>
		<p><?php esc_html_e( get_post_meta( $post->ID, 'squareFootage', true ) ); ?> SQ FT</p>
	</div>

</div>
