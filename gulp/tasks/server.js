export const server = (done) => {
    app.plugins.browsersync.init({
      server: {
        baseDir: `${app.path.build.html}`
      },
      notify: false,
      port: 3000,
    })
  }



// export const server = (done) => {

//   // Start the Browsersync server
//   app.plugins.browsersync.init({
//     //server: `${app.path.build.html}`,
//     proxy: `${app.path._localDomain}`,
//     //port: 3000,
//     notify: false,
//   });

// }

//просто следит за изменениями и релоадит браузер
export const php = (done) => {

    return app.gulp.src(app.path.src.php)
      .pipe(app.plugins.browsersync.stream())


}

