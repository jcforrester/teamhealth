module.exports = (pkg, cfg) => {


    this.config = {
        module: {
            rules: [
                {
                    test: /\.js$/,
                    exclude: /(node_modules|bower_components)/,
                    use: {
                        loader: 'babel-loader',
                        options: {
                            presets: require('./babel')
                        },
                    }
                },
            ],
        },
        externals: {
            jquery: 'jQuery',
        }

    };

    if (cfg.fns.envCheck('prod', false)) {
        this.config.devtool = 'source-map';
    }
    else {
        this.config.output = {
            filename: '[name].min.js',
        };
    }
    return this.config;

};
