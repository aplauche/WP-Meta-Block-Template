/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */
import { __ } from '@wordpress/i18n';

/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import { useBlockProps } from '@wordpress/block-editor';

import { TextControl } from '@wordpress/components';
import { useSelect } from '@wordpress/data';
import { useEntityProp } from '@wordpress/core-data';
import { RangeControl, __experimentalInputControl as InputControl } from '@wordpress/components';

/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * Those files can contain any CSS code that gets applied to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */
import './editor.scss';

/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#edit
 *
 * @return {Element} Element to render.
 */
export default function Edit() {
	const blockProps = useBlockProps()

	const currentPostType =  useSelect((select) => {
		return select('core/editor').getCurrentPostType()
	}, [])

	const [meta, setMeta] = useEntityProp('postType', currentPostType, 'meta');

	const bedrooms = meta.bedrooms;
	const bathrooms = meta.bathrooms;
	const price = meta.price;
	const squareFootage = meta.squareFootage;


	const updateMeta = ( key, value ) => {
		setMeta( { ...meta, [key]: value } );
	};

	return (
		<div { ...blockProps }>
			<h4>Property Details:</h4>
			<hr />
			<div className="fsd-property-meta-details__grid">
				<RangeControl
            label="Bedrooms"
            value={ bedrooms }
            onChange={ ( value ) => updateMeta("bedrooms", value) }
            min={ 0 }
            max={ 10 }
						step={0.5}
        />
				<RangeControl
            label="Bathrooms"
            value={ bathrooms }
            onChange={ ( value ) => updateMeta("bathrooms", value) }
            min={ 0 }
            max={ 10 }
						step={0.5}
        />
				<InputControl
					prefix="$"
					type="number"
					label="Price"
					value={ price }
					onChange={ ( nextValue ) =>  updateMeta("price", nextValue) }
        />
				<InputControl
					type="number"
					label="Square Footage"
					value={ squareFootage }
					onChange={ ( nextValue ) =>  updateMeta("squareFootage", nextValue) }
        />
			</div>

		</div>
	);
}
