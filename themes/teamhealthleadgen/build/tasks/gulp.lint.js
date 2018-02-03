module.exports = (gulp, pkgs, cfg) => {
    return () => {
        gulp.src(`${cfg.dir.src}/js/**/*.js`)
            .pipe(pkgs.eslint({
                configFile: `${process.env.PWD}/build/.eslintrc`,
            }))
            .pipe(pkgs.eslint.format())
    };
};