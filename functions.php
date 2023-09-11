<?php
/**
 * Strativ functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Strativ
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function strativ_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Strativ, use a find and replace
		* to change 'strativ' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'strativ', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'strativ' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'strativ_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'strativ_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function strativ_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'strativ_content_width', 640 );
}
add_action( 'after_setup_theme', 'strativ_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function strativ_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'strativ' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'strativ' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'strativ_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function strativ_scripts() {
	wp_enqueue_style( 'strativ-theme', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), _S_VERSION, false );
	wp_enqueue_style( 'magnific-popup', get_template_directory_uri() . '/assets/css/magnific-popup.css', array(), _S_VERSION, false );
	wp_enqueue_style( 'strativ-style', get_stylesheet_uri(), array(), _S_VERSION );

	// Google Fonts
	wp_enqueue_style( 'strativ-google-fonts', 'https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&family=Merriweather:wght@400;700&display=swap', array(), _S_VERSION );

	wp_style_add_data( 'strativ-style', 'rtl', 'replace' );

	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), _S_VERSION, false );
	wp_enqueue_script( 'strativ-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), _S_VERSION, false );
	wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js', array('jquery'), _S_VERSION, false );
	wp_enqueue_script( 'app', get_template_directory_uri() . '/assets/js/app.js', array('jquery'), _S_VERSION, false );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'strativ_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

// Elementor Widgets
require get_template_directory() . '/inc/elementor/elementor-init.php';



add_action( 'wp_footer', 'strativ_newsletter_modal' );

function strativ_newsletter_modal() {
	?>
    <div class="modal fade" id="newsletterModal" tabindex="-1" aria-labelledby="newsletterModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M16 0C18.2083 0 20.2864 0.416663 22.2344 1.25C24.1823 2.08334 25.8802 3.22395 27.3281 4.67188C28.776 6.1198 29.9167 7.8177 30.75 9.76562C31.5833 11.7136 32 13.7917 32 16C32 18.2083 31.5833 20.2864 30.75 22.2344C29.9167 24.1823 28.776 25.8802 27.3281 27.3281C25.8802 28.776 24.1823 29.9167 22.2344 30.75C20.2864 31.5833 18.2083 32 16 32C13.7917 32 11.7136 31.5833 9.76562 30.75C7.8177 29.9167 6.1198 28.776 4.67188 27.3281C3.22395 25.8802 2.08334 24.1823 1.25 22.2344C0.416663 20.2864 0 18.2083 0 16C0 13.7917 0.416663 11.7136 1.25 9.76562C2.08334 7.8177 3.22395 6.1198 4.67188 4.67188C6.1198 3.22395 7.8177 2.08334 9.76562 1.25C11.7136 0.416663 13.7917 0 16 0ZM16 30.0312C17.9375 30.0312 19.7552 29.6615 21.4531 28.9219C23.1511 28.1823 24.6302 27.1771 25.8906 25.9062C27.151 24.6354 28.151 23.1511 28.8906 21.4531C29.6302 19.7552 30 17.9375 30 16C30 14.0625 29.6302 12.2448 28.8906 10.5469C28.151 8.84895 27.151 7.3698 25.8906 6.10938C24.6302 4.84895 23.1511 3.84896 21.4531 3.10938C19.7552 2.36979 17.9375 2 16 2C14.0625 2 12.2448 2.36979 10.5469 3.10938C8.84895 3.84896 7.3698 4.84895 6.10938 6.10938C4.84895 7.3698 3.84896 8.84895 3.10938 10.5469C2.36979 12.2448 2 14.0625 2 16C2 17.9375 2.36979 19.7552 3.10938 21.4531C3.84896 23.1511 4.84895 24.6354 6.10938 25.9062C7.3698 27.1771 8.84895 28.1823 10.5469 28.9219C12.2448 29.6615 14.0625 30.0312 16 30.0312ZM21.6562 10.3438C21.8438 10.5313 21.9375 10.7656 21.9375 11.0469C21.9375 11.3281 21.8438 11.5625 21.6562 11.75L17.4062 16L21.6562 20.25C21.8438 20.4375 21.9375 20.6719 21.9375 20.9531C21.9375 21.2344 21.8438 21.4688 21.6562 21.6562C21.4688 21.8438 21.2344 21.9375 20.9531 21.9375C20.6719 21.9375 20.4375 21.8438 20.25 21.6562L16 17.4062L11.75 21.6562C11.5625 21.8438 11.3281 21.9375 11.0469 21.9375C10.7656 21.9375 10.5313 21.8438 10.3438 21.6562C10.1562 21.4688 10.0625 21.2344 10.0625 20.9531C10.0625 20.6719 10.1562 20.4375 10.3438 20.25L14.5938 16L10.3438 11.75C10.1562 11.5625 10.0625 11.3281 10.0625 11.0469C10.0625 10.7656 10.1562 10.5313 10.3438 10.3438C10.5313 10.1562 10.7656 10.0625 11.0469 10.0625C11.3281 10.0625 11.5625 10.1562 11.75 10.3438L16 14.5938L20.25 10.3438C20.4375 10.1562 20.6719 10.0625 20.9531 10.0625C21.2344 10.0625 21.4688 10.1562 21.6562 10.3438Z" fill="#D2D2D2"/>
                    </svg>
                </button>
                <div class="modal-body">
                    <div class="newsletter-form-header">
                        <h3 class="form-title"><?php echo esc_html__('Sugar sugar!', 'strativ') ?></h3>
                        <p class="form-description"><?php echo esc_html__('Fill in your details here', 'strativ') ?></p>
                    </div>
					<?php echo do_shortcode('[contact-form-7 id="d849245" title="Contact form 1"]'); ?>
                </div>

                <div class="message-send-success-message text-center">
                    <div class="success-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M20 0C22.7604 0 25.3581 0.520828 27.793 1.5625C30.2279 2.60417 32.3503 4.02994 34.1602 5.83984C35.9701 7.64975 37.3958 9.77212 38.4375 12.207C39.4792 14.6419 40 17.2396 40 20C40 22.7604 39.4792 25.3581 38.4375 27.793C37.3958 30.2279 35.9701 32.3503 34.1602 34.1602C32.3503 35.9701 30.2279 37.3958 27.793 38.4375C25.3581 39.4792 22.7604 40 20 40C17.2396 40 14.6419 39.4792 12.207 38.4375C9.77212 37.3958 7.64975 35.9701 5.83984 34.1602C4.02994 32.3503 2.60417 30.2279 1.5625 27.793C0.520828 25.3581 0 22.7604 0 20C0 17.2396 0.520828 14.6419 1.5625 12.207C2.60417 9.77212 4.02994 7.64975 5.83984 5.83984C7.64975 4.02994 9.77212 2.60417 12.207 1.5625C14.6419 0.520828 17.2396 0 20 0ZM20 37.5391C22.4219 37.5391 24.694 37.0768 26.8164 36.1523C28.9388 35.2279 30.7878 33.9714 32.3633 32.3828C33.9388 30.7943 35.1888 28.9388 36.1133 26.8164C37.0378 24.694 37.5 22.4219 37.5 20C37.5 17.5781 37.0378 15.306 36.1133 13.1836C35.1888 11.0612 33.9388 9.21225 32.3633 7.63672C30.7878 6.06119 28.9388 4.8112 26.8164 3.88672C24.694 2.96223 22.4219 2.5 20 2.5C17.5781 2.5 15.306 2.96223 13.1836 3.88672C11.0612 4.8112 9.21225 6.06119 7.63672 7.63672C6.06119 9.21225 4.8112 11.0612 3.88672 13.1836C2.96223 15.306 2.5 17.5781 2.5 20C2.5 22.4219 2.96223 24.694 3.88672 26.8164C4.8112 28.9388 6.06119 30.7943 7.63672 32.3828C9.21225 33.9714 11.0612 35.2279 13.1836 36.1523C15.306 37.0768 17.5781 37.5391 20 37.5391ZM27.9688 12.6953C28.2292 12.4349 28.5286 12.3047 28.8672 12.3047C29.2057 12.3047 29.5052 12.4349 29.7656 12.6953C30 12.9297 30.1172 13.2227 30.1172 13.5742C30.1172 13.9258 30 14.2187 29.7656 14.4531L17.3047 26.9922C17.2786 27.0182 17.2526 27.0443 17.2266 27.0703C17.2005 27.0964 17.1745 27.1224 17.1484 27.1484C16.9141 27.4089 16.6211 27.5391 16.2695 27.5391C15.918 27.5391 15.625 27.4089 15.3906 27.1484L9.17969 20.9766C8.94531 20.7422 8.82812 20.4492 8.82812 20.0977C8.82812 19.7461 8.94531 19.4531 9.17969 19.2188C9.44011 18.9583 9.73958 18.8281 10.0781 18.8281C10.4167 18.8281 10.7161 18.9583 10.9766 19.2188L16.25 24.4922L27.9688 12.6953Z" fill="white"/>
                        </svg>
                    </div>

                    <h3 class="message-send-success-message__title"><?php echo esc_html__('Let it rain!', 'strativ') ?></h3>
                    <p class="message-send-success-message__description"><?php echo esc_html__('We received your request and will be in touch shortly.', 'strativ') ?></p>
                </div>

            </div>
        </div>
    </div>
	<?php
}