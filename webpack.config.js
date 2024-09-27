const defaultConfig = require( '@wordpress/scripts/config/webpack.config' );

module.exports = [
	{
		...defaultConfig,
		entry: {
			...defaultConfig.entry(),
			admin: './assets/js/src/navigator/index.jsx',
		},
		output: {
			...defaultConfig.output,
			filename: 'index-build.js',
			path: __dirname + '/assets/js/navigator',
		}
	},
	{
		...defaultConfig,
		entry: {
			...defaultConfig.entry(),
			admin: './assets/js/src/admin/settings/index.jsx',
		},
		output: {
			...defaultConfig.output,
			filename: 'settings-build.js',
			path: __dirname + '/assets/js/admin/settings',
		}
	}
];