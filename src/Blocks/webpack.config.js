const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const defaults = require('@wordpress/scripts/config/webpack.config');
const { ESBuildPlugin } = require('esbuild-loader')

module.exports = {
    ...defaults,
    entry:{
        'block-1-entry' : path.resolve(__dirname, 'block-1/index.js')
    },
    output: {
        'path':path.resolve(__dirname),
        'filename': '[name]/index.js'
    },
    watchOptions: {
        ignored: /node_modules/,
    },
    plugins: [
        new ESBuildPlugin(),
        new MiniCssExtractPlugin({
            filename: '[name]/style.css',
        }),
    ],
    module: {
        rules: [
            {
                test: /\.(js|jsx)$/,
                loader: 'esbuild-loader',
                options: {
                    loader: 'jsx',
                    target: 'es2015',
                },
            },
            {
                test: /\.css$/i,
                use: [MiniCssExtractPlugin.loader, 'css-loader'],
            },
            {
                test: /\.s[ac]ss$/i,
                use: [MiniCssExtractPlugin.loader, 'css-loader', 'sass-loader'],
            },
            {
                test: /\.svg/,
                use: {
                    loader: 'svg-url-loader',
                    options: {},
                },
            },
        ],
    },
    externals: {
        react: 'React',
        'react-dom': 'ReactDOM',
    }
}