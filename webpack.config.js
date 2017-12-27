var webpack = require('webpack');
var path = require('path');
var ExtractTextPlugin = require('extract-text-webpack-plugin');
var CopyWebpackPlugin = require('copy-webpack-plugin');
var inProduction = (process.env.NODE_ENV === 'production');
var themeFolderName = 'custom-theme';

module.exports = {
    entry: {
        app: [
            './theme/style.scss',
            './theme/js/index.js'
        ]
    },
    output: {
        path: path.resolve(__dirname, './public/wp-content/themes/'+themeFolderName+'/'),
        filename: 'js/bundle.js'
    },
    module: {
        rules: [
            {
                test: /\.scss$/,
                use: ExtractTextPlugin.extract({
                    use: [
                        {
                            loader: 'css-loader',
                            options: {
                                url: false,
                                minimize: inProduction
                            }
                        },
                        {
                          loader: 'sass-loader'
                        }
                    ]
                })
            },
            {
                test: /\.js$/,
                loader: 'babel-loader',
                query: {
                    presets: ['es2015']
                }
            }
        ]
    },
    plugins: [
        new ExtractTextPlugin('style.css'),
        new CopyWebpackPlugin(
            [ {from: 'theme',} ],
            { ignore: ['*.scss', '*.css', '*.js'] }
        ),
    ],
    stats: {
        colors: true
    }
};

if(inProduction){
    module.exports.plugins.push(
        new webpack.optimize.UglifyJsPlugin()
    );
}