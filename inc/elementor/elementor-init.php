<?php

class Elementor_Init {
	public function __construct() {
		add_action( 'elementor/widgets/register', array( $this, 'widgets_registered' ) );
	}

	function widgets_registered( $widgets_manager ) {

		require_once( __DIR__ . '/widgets/post-card.php' );
		require_once( __DIR__ . '/widgets/video-card.php' );
		require_once( __DIR__ . '/widgets/newsletter.php' );
		require_once( __DIR__ . '/widgets/newsletter-section.php' );

		$widgets_manager->register( new \PostCard() );
		$widgets_manager->register( new \VideoCard() );
		$widgets_manager->register( new \Newsletter() );
		$widgets_manager->register( new \NewsletterSection() );

	}

}

$obj = new Elementor_Init();