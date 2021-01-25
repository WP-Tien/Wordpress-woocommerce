const gulp = require("gulp"),
  sass = require("gulp-sass"),
  postcss = require("gulp-postcss"),
  autoprefixer = require("autoprefixer"),
  cleanCSS = require("gulp-clean-css"),
  rename = require("gulp-rename"),
  concat = require("gulp-concat"),
  uglify = require("gulp-uglify-es").default,
  browserSync = require("browser-sync").create(),
  sourcemaps = require("gulp-sourcemaps"),
  del = require("del");

const cfg = require("./gulpconfig.json");
const paths = cfg.paths;

gulp.task("sass", function () {
  return gulp
    .src(paths.sass + "/*.scss")
    .pipe(sourcemaps.init({ loadMaps: true }))
    .pipe(
      sass({
        errorLogToConsole: true,
        outputStyle: "expanded",
      }).on("error", sass.logError)
    )
    .pipe(postcss([
      autoprefixer({
          grid: "autoplace" // true indicates no-autoplace. Change to autoplace
      })
    ])
    )
    .pipe(sourcemaps.write(undefined, { sourceRoot: null }))
    .pipe(gulp.dest(paths.css));
});

gulp.task("minifycss", function () {
  return gulp
    .src(`${paths.css}/style.css`)
    .pipe(sourcemaps.init({ loadMaps: true }))
    .pipe(cleanCSS())
    .pipe(rename({ suffix: ".min" }))
    .pipe(sourcemaps.write("./"))
    .pipe(gulp.dest(paths.css));
});

gulp.task("styles", function (callback) {
  gulp.series("sass", "minifycss")(callback);
});

gulp.task("scripts", function () {
  var scripts = [
    // Sources
    `${paths.src}/fontawesome/js/all.js`,
    `${paths.src}/owl-carousel/js/owl.carousel.js`,
    `${paths.src}/owl-carousel/js/owl.animate.js`,
    `${paths.src}/owl-carousel/js/owl.autoheight.js`,
    `${paths.src}/owl-carousel/js/owl.autoplay.js`,
    `${paths.src}/owl-carousel/js/owl.autorefresh.js`,
    `${paths.src}/owl-carousel/js/owl.hash.js`,
    `${paths.src}/owl-carousel/js/owl.lazyload.js`,
    `${paths.src}/owl-carousel/js/owl.navigation.js`,
    `${paths.src}/owl-carousel/js/owl.support.js`,
    // `${paths.src}/owl-carousel/js/owl.support.modernizr.js`,
    `${paths.src}/owl-carousel/js/owl.video.js`,

    // Main scripts
    `${paths.js}/functions.js`,
  ];

  return gulp
    .src(scripts, { allowEmpty: true })
    .pipe(concat("scripts.js"))
    .pipe(gulp.dest(paths.js))
    .pipe(rename("scripts.min.js"))
    .pipe(uglify())
    .pipe(gulp.dest(paths.js));
});

gulp.task("watch", function () {
  // css
  gulp.watch(`${paths.sass}/**/*.scss`, gulp.series("styles"));
  // js
  gulp.watch(
    [`${paths.js}/*.js`, `!${paths.js}/scripts.js`, `!${paths.js}/.js`],
    gulp.series("scripts")
  );
});

gulp.task("browser-sync", function () {
  browserSync.init(cfg.browserSyncWatchFiles, cfg.browserSyncOptions);
});

gulp.task("watch-bs", gulp.parallel("browser-sync", "watch"));

gulp.task("copy-assets", function (done) {
  // Copy all Font Awesome Fonts && Copy all Font Awesome SCSS files
  gulp
    .src(
      `${paths.node}/@fortawesome/fontawesome-free/webfonts/**/*.{ttf,woff,woff2,eot,svg}`
    )
    .pipe(gulp.dest("./assets/fonts"));
  gulp
    .src(`${paths.node}/@fortawesome/fontawesome-free/scss/*.scss`)
    .pipe(gulp.dest(`${paths.src}/fontawesome/scss`));
  gulp
    .src(`${paths.node}/@fortawesome/fontawesome-free/metadata/icons.yml`)
    .pipe(gulp.dest(`${paths.src}/fontawesome/metadata`));
  gulp
    .src(`${paths.node}/@fortawesome/fontawesome-free/js/*.js`)
    .pipe(gulp.dest(`${paths.src}/fontawesome/js`));

  // Copy Web Fonts
  gulp
    .src(
      `${paths.node}/roboto-npm-webfont/full/fonts/**/*.{eot,ttf,woff,woff2}`
    )
    .pipe(gulp.dest("./assets/css/fonts"));
  gulp
    .src(`${paths.node}/roboto-npm-webfont/full/**/*.scss`)
    .pipe(gulp.dest(`${paths.src}/fonts/roboto`));

  // Owl Carousel
  gulp
  .src(
    `${paths.node}/owl.carousel/src/**/*`
  )
  .pipe(gulp.dest(`${paths.src}/owl-carousel`));

  done();
});

gulp.task("clean-up", function () {
  // del all resources
  // del fonts awesome
  // del fonts roboto
  return del(['assets/src/**/*', 'assets/fonts/**/*', 'assets/css/fonts/**/*']);
});
