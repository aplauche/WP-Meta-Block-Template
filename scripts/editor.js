import { unregisterBlockType } from '@wordpress/blocks';
import domReady from '@wordpress/dom-ready';

// Unregister our block on all other post types that do not use the metadata
domReady( function () {
  if(postData.postType !== 'property'){
    unregisterBlockType( 'fsd/property-meta-details' );
  }
});

