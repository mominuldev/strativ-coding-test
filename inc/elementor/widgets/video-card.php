<?php

class VideoCard extends \Elementor\Widget_Base {

	public function get_name() {
		return 'video-card';
	}

	public function get_title() {
		return esc_html__( 'Video Card', 'strativ' );
	}

	public function get_icon() {
		return 'eicon-code';
	}

	public function get_categories() {
		return [ 'basic' ];
	}

	public function get_keywords() {
		return [ 'video', 'card' ];
	}

	protected function register_controls() {

		// Content Tab Start

		$this->start_controls_section(
			'section_post_card',
			[
				'label' => esc_html__( 'Video Card', 'strativ' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
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
			'title',
			[
				'label'   => esc_html__( 'Title', 'strativ' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Bask in a sweet wonderland of candy containers', 'strativ' ),
			]
		);

        $this->add_control(
			'category',
			[
				'label'   => esc_html__( 'Category', 'strativ' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Dark Chocolate', 'strativ' ),
			]
		);

        // Category


		$this->add_control(
			'link_text',
			[
				'label'   => esc_html__( 'Button Text', 'strativ' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Watch Video', 'strativ' ),
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
					'{{WRAPPER}} .strativ-video-card__title' => 'color: {{VALUE}};',
				],
			]
		);

		// Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => __( 'Typography', 'strativ' ),
				'selector' => '{{WRAPPER}} .strativ-video-card__title',
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
					'{{WRAPPER}} .strativ-video-card__link' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .strativ-video-card__link:hover' => 'color: {{VALUE}};',
				],
			]
		);

		// Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'button_typography',
				'label' => __( 'Typography', 'strativ' ),
				'selector' => '{{WRAPPER}} .strativ-video-card__link',
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
					'{{WRAPPER}} .strativ-video-card__content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>

        <div class="strativ-card">
            <div class="strativ-video-card__header">
		        <?php if ( ! empty( $settings['category'] ) ) : ?>
                    <div class="strativ-video-card__category">
				        <?php echo esc_html( $settings['category'] ); ?>
                    </div>
		        <?php endif; ?>
            </div>

			<?php if ( ! empty( $settings['image']['url'] ) ) : ?>
                <div class="strativ-video-card__image">
                    <img src="<?php echo $settings['image']['url']; ?>" alt="<?php echo esc_attr( $settings['title'] ) ?>">
                    <a href="#" class="popup-video d-flex align-items-center gap-2">
                        Watch Video
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M20 36.0577C22.8846 36.0577 25.5769 35.3205 28.0769 33.8462C30.5128 32.4359 32.4359 30.5128 33.8462 28.0769C35.3205 25.5769 36.0577 22.8846 36.0577 20C36.0577 17.1154 35.3205 14.4231 33.8462 11.9231C32.4359 9.48717 30.5128 7.56411 28.0769 6.15385C25.5769 4.67948 22.8846 3.94231 20 3.94231C17.1154 3.94231 14.4231 4.67948 11.9231 6.15385C9.48717 7.56411 7.56411 9.48717 6.15385 11.9231C4.67948 14.4231 3.94231 17.1154 3.94231 20C3.94231 22.8846 4.67948 25.5769 6.15385 28.0769C7.56411 30.5128 9.48717 32.4359 11.9231 33.8462C14.4231 35.3205 17.1154 36.0577 20 36.0577ZM20 0C23.6539 0 27.0352 0.913452 30.1442 2.74038C33.1571 4.47116 35.5288 6.84293 37.2596 9.85577C39.0865 12.9648 40 16.3461 40 20C40 23.6539 39.0865 27.0352 37.2596 30.1442C35.5288 33.1571 33.1571 35.5288 30.1442 37.2596C27.0352 39.0865 23.6539 40 20 40C16.3461 40 12.9648 39.0865 9.85577 37.2596C6.84293 35.4968 4.47116 33.109 2.74038 30.0962C0.913452 26.9872 0 23.6218 0 20C0 16.3782 0.913452 13.0128 2.74038 9.90385C4.50321 6.89101 6.89101 4.50321 9.90385 2.74038C13.0128 0.913452 16.3782 0 20 0ZM15.9619 28.9908V10.9619L27.9811 20.0004L15.9619 28.9908Z" fill="white"/>
                        </svg>
                    </a>
                </div>
			<?php endif; ?>

            <div class="strativ-video-card__content">
				<?php if ( ! empty( $settings['title'] ) ) : ?>
                    <h3 class="strativ-video-card__title">
						<?php echo esc_html( $settings['title'] ); ?>
                    </h3>
				<?php endif; ?>

				<?php if ( ! empty( $settings['link']['url'] ) )  : ?>
                    <a href="<?php echo esc_url( $settings['link']['url'] ); ?>" class="strativ-video-card__link popup-video">
						<?php echo esc_html( $settings['link_text'] ); ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9998 21.6345C13.7306 21.6345 15.346 21.1922 16.846 20.3075C18.3075 19.4614 19.4614 18.3075 20.3075 16.846C21.1922 15.346 21.6345 13.7306 21.6345 11.9998C21.6345 10.2691 21.1922 8.6537 20.3075 7.1537C19.4614 5.69215 18.3075 4.53832 16.846 3.69216C15.346 2.80754 13.7306 2.36523 11.9998 2.36523C10.2691 2.36523 8.6537 2.80754 7.1537 3.69216C5.69215 4.53832 4.53832 5.69215 3.69216 7.1537C2.80754 8.6537 2.36523 10.2691 2.36523 11.9998C2.36523 13.7306 2.80754 15.346 3.69216 16.846C4.53832 18.3075 5.69215 19.4614 7.1537 20.3075C8.6537 21.1922 10.2691 21.6345 11.9998 21.6345ZM12 0C14.1923 0 16.2211 0.548071 18.0865 1.64423C19.8942 2.6827 21.3173 4.10576 22.3558 5.91346C23.4519 7.77886 24 9.80768 24 12C24 14.1923 23.4519 16.2211 22.3558 18.0865C21.3173 19.8942 19.8942 21.3173 18.0865 22.3558C16.2211 23.4519 14.1923 24 12 24C9.80768 24 7.77886 23.4519 5.91346 22.3558C4.10576 21.2981 2.6827 19.8654 1.64423 18.0577C0.548071 16.1923 0 14.1731 0 12C0 9.82691 0.548071 7.8077 1.64423 5.94231C2.70193 4.13461 4.13461 2.70193 5.94231 1.64423C7.8077 0.548071 9.82691 0 12 0ZM9.57715 17.3945V6.57715L16.7887 12.0002L9.57715 17.3945Z" fill="#564FC0"/>
                        </svg>
                    </a>
				<?php endif; ?>
            </div>
        </div>

		<?php
	}
}