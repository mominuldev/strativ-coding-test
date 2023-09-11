<?php

class Newsletter extends \Elementor\Widget_Base {

	public function get_name() {
		return 'newsletter';
	}

	public function get_title() {
		return esc_html__( 'Newsletter', 'strativ' );
	}

	public function get_icon() {
		return 'eicon-code';
	}

	public function get_categories() {
		return [ 'basic' ];
	}

	public function get_keywords() {
		return [ 'post', 'card' ];
	}

	protected function register_controls() {

		// Content Tab Start

		$this->start_controls_section(
			'section_post_card',
			[
				'label' => esc_html__( 'Newsletter', 'strativ' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		// Category
		$this->add_control(
			'top_title',
			[
				'label'       => esc_html__( 'Top Title', 'strativ' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'We like candy and sweet things.', 'strativ' ),
				'label_block' => 'true',
				'description' => __( 'Enter the category name', 'strativ' )
			]
		);

		// Date

		$this->add_control(
			'bottom_title',
			[
				'label'   => esc_html__( 'Bottom Title', 'strativ' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Do you want to join us in our endeavors?', 'strativ' ),
			]
		);


		// Image
		$this->add_control(
			'image',
			[
				'label'   => esc_html__( 'Image', 'strativ' ),
				'type'    => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'link_text',
			[
				'label'   => esc_html__( 'Button Text', 'strativ' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Join Newsletter', 'strativ' ),
			]
		);

		$this->add_control(
			'link',
			[
				'label'       => esc_html__( 'Button Link', 'strativ' ),
				'type'        => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'strativ' ),
				'default'     => [
					'url' => '#',
				],
			]
		);




		$this->end_controls_section();

		// Content Tab End


		// Style Tab Start

		$this->start_controls_section(
			'section_title_style',
			[
				'label' => esc_html__( 'Title Top', 'strativ' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color',
			[
				'label'     => esc_html__( 'Color', 'strativ' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .newsletter-box__top-title' => 'color: {{VALUE}};',
				],
			]
		);

		// Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => __( 'Typography', 'strativ' ),
				'selector' => '{{WRAPPER}} .newsletter-box__top-title',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_bottom_title_style',
			[
				'label' => esc_html__( 'Title Bottom', 'strativ' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color',
			[
				'label'     => esc_html__( 'Color', 'strativ' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .newsletter-box__bottom-title' => 'color: {{VALUE}};',
				],
			]
		);

		// Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => __( 'Typography', 'strativ' ),
				'selector' => '{{WRAPPER}} .newsletter-box__bottom-title',
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'section_button_style',
			[
				'label' => esc_html__( 'Button', 'strativ' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		// Color
		$this->add_control(
			'button_color',
			[
				'label'     => esc_html__( 'Color', 'strativ' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .strativ-btn' => 'color: {{VALUE}};',
				],
			]
		);

		// Hover Button Color
		$this->add_control(
			'button_hover_color',
			[
				'label'     => esc_html__( 'Hover Color', 'strativ' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .strativ-btn:hover' => 'color: {{VALUE}};',
				],
			]
		);

        // Button Background Color
		$this->add_control(
			'button_background_color',
			[
				'label'     => esc_html__( 'Background Color', 'strativ' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .strativ-btn' => 'background-color: {{VALUE}};',
				],
                'separator' => 'before',
			]
		);

		$this->add_control(
			'button_background_color',
			[
				'label'     => esc_html__( 'Hover Background Color', 'strativ' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .strativ-btn:hover' => 'background-color: {{VALUE}};',
				],
			]
		);

		// Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'button_typography',
				'label' => __( 'Typography', 'strativ' ),
				'selector' => '{{WRAPPER}} .strativ-post-card__link',
                'separator' => 'before',
			]
		);

		$this->end_controls_section();


		// Box Wrapper Style
		$this->start_controls_section(
			'section_box_wrapper_style',
			[
				'label' => esc_html__( 'Box Wrapper', 'strativ' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		// Background Color
		$this->add_control(
			'box_wrapper_background_color',
			[
				'label'     => esc_html__( 'Overlay BG Color', 'strativ' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .newsletter-box:before' => 'background-color: {{VALUE}};',
				],
			]
		);

		// Padding
		$this->add_responsive_control(
			'box_wrapper_padding',
			[
				'label' => esc_html__( 'Padding', 'strativ' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .newsletter-box__content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>

		<div class="newsletter-box">
			<img src="<?php echo esc_url($settings['image']['url']) ?>" alt="<?php echo esc_attr( $settings['bottom_title'] ); ?>" />

            <div class="newsletter-box__content">
                <!-- /.newsletter-box -->
	            <?php if ( ! empty( $settings['top_title'] ) ) : ?>
                    <h3 class="newsletter-box__top-title">
			            <?php echo esc_html( $settings['top_title'] ); ?>
                    </h3>
	            <?php endif; ?>

                <div class="newsletter-box__bottom-content-wrapper">
		            <?php if ( ! empty( $settings['bottom_title'] ) ) : ?>
                        <h2 class="newsletter-box__bottom-title">
				            <?php echo esc_html( $settings['bottom_title'] ); ?>
                        </h2>
		            <?php endif; ?>

                    <button type="button" class="newsletter-box__link strativ-btn" data-bs-toggle="modal" data-bs-target="#newsletterModal">
	                    <?php echo esc_html( $settings['link_text'] ); ?>
                    </button>
                </div>
            </div>
		</div>

		<?php
	}
}