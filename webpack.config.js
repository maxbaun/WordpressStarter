const webpack = require('webpack');
const path = require('path');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
const CopyWebpackPlugin = require('copy-webpack-plugin');
const WebpackAssetsManifest = require('webpack-assets-manifest');
const UglifyJSPlugin = require('uglifyjs-webpack-plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');

const isDev = process.env.NODE_ENV !== 'production';

const BuildConfig = {
	themeName: 'themeName',
	proxy: 'http://localhost:8000',
	host: 'localhost',
	port: 3000
};

if (isDev) {
	BuildConfig.publicPath = `http://${BuildConfig.host}:${BuildConfig.port}/wp-content/themes/${BuildConfig.themeName}/`;
} else {
	BuildConfig.publicPath = `/wp-content/themes/${BuildConfig.themeName}/`;
}

const config = {
	entry: {
		app: './src/app/index.js',
		vendor: ['babel-polyfill']
	},
	output: {
		filename: isDev ? 'js/[name].js' : 'js/[hash].[name].js',
		path: path.resolve(__dirname, 'dist'),
		publicPath: BuildConfig.publicPath,
		pathinfo: isDev
	},
	devtool: isDev ? '#cheap-module-source-map' : false,
	stats: !isDev,
	module: {
		rules: [
			{
				test: /\.(s*)css$/,
				use: [
					{
						loader: isDev ? 'style-loader' : MiniCssExtractPlugin.loader
					},
					{
						loader: 'css-loader'
					},
					{
						loader: 'postcss-loader'
					},
					{
						loader: 'sass-loader'
					}
				]
			},
			{
				test: /\.js$/,
				exclude: /(node_modules|bower_components)/,
				loader: 'babel-loader'
			},
			{
				test: /\.(png|jpg|gif|svg|ico)$/,
				use: [
					{
						loader: 'file-loader',
						options: {
							name: './img/[name].[ext]'
						}
					}
				],
				include: path.resolve('./src/app/img')
			},
			{
				test: /\.(ttf|eot|woff|woff2|svg)$/,
				use: {
					loader: 'file-loader',
					options: {
						name: 'fonts/[name].[ext]'
					}
				},
				include: [path.resolve('./src/app/css'), path.resolve('./src/app/fonts')],
				exclude: path.resolve('./src/app/img')
			}
		]
	},
	plugins: [
		new CopyWebpackPlugin(['**/*.php', './style.css', '**/*.png', '**/*.jpg', '**/*.twig', 'plugins/**/*.zip'], {
			context: './src'
		}),
		new MiniCssExtractPlugin({
			filename: isDev ? 'css/[name].css' : 'css/[name].[hash].css',
			allChunks: true,
			disable: isDev
		}),
		new WebpackAssetsManifest({
			output: 'assets.json',
			space: 2,
			writeToDisk: false,
			publicPath: BuildConfig.publicPath
		})
	]
};

if (isDev) {
	// Config.entry = addHot(config.entry);
	config.plugins = config.plugins.concat([
		new webpack.optimize.OccurrenceOrderPlugin(),
		new webpack.NoEmitOnErrorsPlugin(),
		new BrowserSyncPlugin(
			{
				host: BuildConfig.host,
				port: BuildConfig.port,
				open: false,
				proxy: BuildConfig.proxy,
				watch: ['./src/**/*.php', './src/**/*.twig'],
				delay: 500
			},
			{
				reload: true,
				injectCss: true
			}
		)
	]);
} else {
	config.plugins.push(new UglifyJSPlugin());
}

module.exports = config;

// Function addHot(entry) {
// 	const results = {};
//
// 	Object.keys(entry).forEach(name => {
// 		results[name] = Array.isArray(entry[name]) ?
// 			entry[name].slice(0) :
// 			[entry[name]];
// 		results[name].unshift(`${__dirname}/hmr.js`);
// 	});
// 	return results;
// }
