module.exports = (pkgs, cfg) => {
    return () => {
        pkgs.bs.init(['*'], {
            proxy: cfg.browserSync.proxy,
            port: cfg.browserSync.port,
            root: process.env.PWD,
            online: true,
            open: {
                file: 'index.php'
            }
        });
    };
};