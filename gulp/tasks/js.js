import webpack from "webpack-stream";
// import webpack, {ProvidePlugin} from "webpack-stream";
// import ProvidePlugin from "webpack";
// import mix from "laravel-mix";

export const js = () => {
    return app.gulp.src(app.path.src.js, { sourcemaps: false })
        // .pipe(app.plugins.plumber(
        //     app.plugins.notify.onError({
        //         title: "js",
        //         message: "Error: <%= error.message %>"
        //     }))
        // )
        // .pipe(webpack({
        //     mode: 'development',
        //     output: {
        //         filename: 'app.js'
        //     }
        // }))
        //.pipe(app.gulp.dest(app.path.build.js))
        .pipe(webpack({
            mode: 'production', //mode: app.isBuild ? 'production' : 'development',
            output: {
                filename: 'app.min.js'
            }
        }))
        .pipe(app.gulp.dest(app.path.build.js))

        .pipe(app.gulp.src(app.path.src.jsExt))

        .pipe(app.gulp.dest(app.path.build.js))

        .pipe(app.plugins.browsersync.stream())
}

// export const js = () => {
//     mix.js(app.path.src.jsApp, 'dist/js/').extract()
//         .options({
//             processCssUrls: false
//         });
// }
