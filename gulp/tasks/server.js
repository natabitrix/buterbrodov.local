// export const server = (done) => {
//     app.plugins.browsersync.init({
//       server: {
//         baseDir: `${app.path.build.html}`
//       },
//       notify: false,
//       port: 3000,
//     })
//   }



  export const server = (done) => {

    // Start the Browsersync server
    app.plugins.browsersync.init({
      server: `${app.path.build.html}`,
      port: 3000,
    });



  }



