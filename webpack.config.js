const defaultConfig = require( '@wordpress/scripts/config/webpack.config' );



module.exports = {
    ...defaultConfig,
    entry: {
      ...defaultConfig.entry(),
      editor: './scripts/editor.js'
    },
};