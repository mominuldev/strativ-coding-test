<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Strativ
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'strativ' ); ?></a>

	<header id="masthead" class="site-header">
        <div class="container">
            <div class="header-wrapper">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-6 offset-lg-4">
                        <div class="site-branding text-center">
		                    <?php the_custom_logo(); ?>
                        </div><!-- .site-branding -->
                    </div>
                    <div class="col-lg-4 col-6">
                        <div class="nav-button-wrapper text-end">
		                    <?php
		                    $btn_url = get_theme_mod('nav_button_url', '#newsletterModal');
		                    $btn_text = get_theme_mod('nav_button_text', 'Join Newsletter');
		                    ?>

                            <button type="button" class="newsletter-box__link strativ-btn" data-bs-toggle="modal" data-bs-target="<?php echo esc_attr( $btn_url ); ?>">
		                        <?php echo esc_html( $btn_text ) ?>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container -->
	</header><!-- #masthead -->
