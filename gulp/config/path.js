import * as nodePath from 'path';
const rootFolder = nodePath.basename(nodePath.resolve());

const buildFolder = `./www/local/templates/buterbrodov/assets`;
const phpFolder = `./www/local`;
const srcFolder = `./__src`;
const _localDomain = `buterbrodov.local`;

export const path = {
    build: {
        html: `${buildFolder}/`,
        js: `${buildFolder}/js/`,
        css: `${buildFolder}/css/`,
        images: `${buildFolder}/img/`,
        files: `${buildFolder}/files/`,
        fonts: `${buildFolder}/fonts/`
    },
    src: {
        php: `${phpFolder}/**/*.php`,
        html: `${srcFolder}/html/*.html`,
        js: `${srcFolder}/js/app.js`,
        jsExt: `${srcFolder}/js/ext/*.js`,
        scss: `${srcFolder}/scss/style.scss`,
        images: `${srcFolder}/img/**/*.{jpg,jpeg,png,gif,webp}`,
        svg: `${srcFolder}/img/**/*.svg`,
        files: `${srcFolder}/files/**/*.*`,
        fonts: `${srcFolder}/fonts/**/*.*`
    },
    watch: {
        php: `${phpFolder}/**/*.php`,
        html: `${srcFolder}/html/**/*.html`,
        js: `${srcFolder}/js/**/*.js`,
        scss: `${srcFolder}/**/*.scss`,
        images: `${srcFolder}/img/**/*.{jpg,jpeg,png,gif,webp,svg,ico}`,
        files: `${srcFolder}/files/**/*.*`
    },

    clean: buildFolder,
    buildFolder: buildFolder,
    srcFolder: srcFolder,
    rootFolder: rootFolder,
    _localDomain: _localDomain,
    ftp: ``,
  
  }
