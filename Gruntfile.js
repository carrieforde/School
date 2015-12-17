module.exports = function( grunt ) {

	grunt.initConfig({
		pkg: grunt.file.readJSON( 'package.json' ),
		sass: {
			options: {
				outputStyle: 'expanded',
				// sourceComments: true,
				sourceMap: true,
				includePaths: [
					'lib/bourbon/app/assets/stylesheets',
					'lib/neat/app/assets/stylesheets'
				]
			},
			dist: {
				files: {
					'style.css': 'scss/style.scss'
				},
			},
		},
		postcss: {
			options: {
				map: true,
				processors: [
					require( 'autoprefixer' )({ browsers: 'last 2 versions' }), // Add vendor prefixes.
					require( 'css-mqpacker' )({ sort: true }),
				]
			},
			dist: {
				src: '*.css'
			},
		},
		cssnano: {
			options: {
				autoprefixer: false,
				safe: true,
			},
			dist: {
				files: {
					'style.min.css' : 'style.css'
				},
			},
		},
		watch: {
			css: {
				files: ['sass/**/*.scss'],
				tasks: ['styles'],
				options: {
					livereload: true
				},
			},
		},
		wp_readme_to_markdown: {
			your_target: {
				files: {
					'readme.md' : 'readme.txt'
				},
			},
		},
		makepot: {
			theme: {
				options: {
					cwd: '',
					domainPath: 'languages/',
					potFilename: 'school.pot',
					type: 'wp-theme'
				},
			},
		},
	});

	// Load plugins.
	grunt.loadNpmTasks( 'grunt-sass' );
	grunt.loadNpmTasks( 'grunt-postcss' );
	grunt.loadNpmTasks( 'grunt-cssnano' );
	grunt.loadNpmTasks( 'grunt-contrib-watch' );
	grunt.loadNpmTasks( 'grunt-wp-readme-to-markdown' );
	grunt.loadNpmTasks( 'grunt-wp-i18n' );

	// Configure tasks.
	grunt.registerTask( 'styles', ['sass', 'postcss', 'cssnano'] );
	grunt.registerTask( 'build', ['sass', 'postcss', 'wp_readme_to_markdown', 'makepot' ] );

};
