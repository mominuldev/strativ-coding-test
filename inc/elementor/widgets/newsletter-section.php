<?php

class NewsletterSection extends \Elementor\Widget_Base {

	public function get_name() {
		return 'newsletter-section';
	}

	public function get_title() {
		return esc_html__( 'Newsletter Section', 'strativ' );
	}

	public function get_icon() {
		return 'eicon-code';
	}

	public function get_categories() {
		return [ 'basic' ];
	}

	public function get_keywords() {
		return [ 'newsletter', 'card' ];
	}

	protected function register_controls() {

		// Content Tab Start

		$this->start_controls_section(
			'section_newsletter',
			[
				'label' => esc_html__( 'Newsletter', 'strativ' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title',
			[
				'label'   => esc_html__( 'Title', 'strativ' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Sometimes it rains.. candy', 'strativ' ),
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
		// Style Tab Start

		$this->start_controls_section(
			'section_title_style',
			[
				'label' => esc_html__( 'Title', 'strativ' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color',
			[
				'label'     => esc_html__( 'Color', 'strativ' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .strativ-post-card__title' => 'color: {{VALUE}};',
				],
			]
		);

		// Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => __( 'Typography', 'strativ' ),
				'selector' => '{{WRAPPER}} .strativ-post-card__title',
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
					'{{WRAPPER}} .strativ-post-card__link' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .strativ-post-card__link:hover' => 'color: {{VALUE}};',
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
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_category_style',
			[
				'label' => esc_html__( 'Category', 'strativ' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		// Color
		$this->add_control(
			'category_color',
			[
				'label'     => esc_html__( 'Color', 'strativ' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .strativ-post-card__category' => 'color: {{VALUE}};',
				],
			]
		);

		// Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'category_typography',
				'label' => __( 'Typography', 'strativ' ),
				'selector' => '{{WRAPPER}} .strativ-post-card__category',
			]
		);

		// Text Shadow
		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'category_text_shadow',
				'label' => __( 'Text Shadow', 'strativ' ),
				'selector' => '{{WRAPPER}} .strativ-post-card__category',
			]
		);

		// Enable Text Stoke
		$this->add_control(
			'category_text_stroke',
			[
				'label' => __( 'Enable Text Stroke', 'strativ' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'strativ' ),
				'label_off' => __( 'Hide', 'strativ' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);

		// Text Stroke Color
		$this->add_control(
			'category_text_stroke_color',
			[
				'label' => __( 'Text Stroke Color', 'strativ' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .strativ-post-card__category' => '-webkit-text-stroke-color: {{VALUE}};',
				],
				'condition' => [
					'category_text_stroke' => 'yes',
				],
			]
		);

		// Text Stroke Width
		$this->add_control(
			'category_text_stroke_width',
			[
				'label' => __( 'Text Stroke Width', 'strativ' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'selectors' => [
					'{{WRAPPER}} .strativ-post-card__category' => '-webkit-text-stroke-width: {{SIZE}}px;',
				],
				'condition' => [
					'category_text_stroke' => 'yes',
				],
			]
		);


		$this->end_controls_section();

		// Date Style
		$this->start_controls_section(
			'section_date_style',
			[
				'label' => esc_html__( 'Date', 'strativ' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		// Color
		$this->add_control(
			'date_color',
			[
				'label'     => esc_html__( 'Color', 'strativ' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .strativ-post-card__date' => 'color: {{VALUE}};',
				],
			]
		);

		// Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'date_typography',
				'label' => __( 'Typography', 'strativ' ),
				'selector' => '{{WRAPPER}} .strativ-post-card__date',
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
				'label'     => esc_html__( 'Background Color', 'strativ' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .strativ-card' => 'background-color: {{VALUE}};',
				],
			]
		);

		// Background Color
		$this->add_control(
			'box_wrapper_header_background_color',
			[
				'label'     => esc_html__( 'Card Header Background Color', 'strativ' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .strativ-post-card__header' => 'background-color: {{VALUE}};',
				],
			]
		);

		// Border Radius
		$this->add_control(
			'box_wrapper_border_radius',
			[
				'label'     => esc_html__( 'Border Radius', 'strativ' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .strativ-card' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Box Shadow
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_wrapper_box_shadow',
				'label' => __( 'Box Shadow', 'strativ' ),
				'selector' => '{{WRAPPER}} .strativ-card',
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
					'{{WRAPPER}} .strativ-post-card__content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>

		<div class="newsletter-section">
			<?php if ( ! empty( $settings['title'] ) ) : ?>
                <h2 class="newsletter__title">
					<?php echo esc_html( $settings['title'] ); ?>
                </h2>
			<?php endif; ?>

			<?php if ( ! empty( $settings['link_text'] ) ) : ?>
               <button type="button" class="newsletter-box__link strativ-btn" data-bs-toggle="modal" data-bs-target="<?php echo esc_attr( $settings['link']['url'] ); ?>">
					<?php echo esc_html( $settings['link_text'] ); ?>
               </button>
			<?php endif; ?>
		</div>
		<?php
	}
}