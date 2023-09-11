<?php

class PostCard extends \Elementor\Widget_Base {

	public function get_name() {
		return 'post-card';
	}

	public function get_title() {
		return esc_html__( 'Post Card', 'strativ' );
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
				'label' => esc_html__( 'Post Card', 'strativ' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		// Category
		$this->add_control(
			'category',
			[
				'label'       => esc_html__( 'Category', 'strativ' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'Cotton Candy', 'strativ' ),
				'label_block' => 'true',
				'description' => __( 'Enter the category name', 'strativ' )
			]
		);

		// Date
		$this->add_control(
			'date',
			[
				'label'       => esc_html__( 'Post Date', 'strativ' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'January 31, 2018', 'strativ' ),
				'description' => __( 'Enter the post date', 'strativ' )
			]
		);

		// Date

		$this->add_control(
			'title',
			[
				'label'   => esc_html__( 'Title', 'strativ' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur', 'strativ' ),
			]
		);

		// Description
		$this->add_control(
			'description',
			[
				'label'   => esc_html__( 'Description', 'strativ' ),
				'type'    => \Elementor\Controls_Manager::TEXTAREA,
				'rows'    => 6,
				'default' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore',
					'strativ' ),
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
			'link',
			[
				'label'       => esc_html__( 'Link', 'strativ' ),
				'type'        => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'strativ' ),
				'default'     => [
					'url' => '#',
				],
			]
		);

		$this->add_control(
			'link_text',
			[
				'label'   => esc_html__( 'Link Text', 'strativ' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Ankesh Mistry', 'strativ' ),
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
			'section_description_style',
			[
				'label' => esc_html__( 'Description', 'strativ' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

        // Color
        $this->add_control(
            'description_color',
            [
                'label'     => esc_html__( 'Color', 'strativ' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .strativ-post-card__description' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'label' => __( 'Typography', 'strativ' ),
                'selector' => '{{WRAPPER}} .strativ-post-card__description',
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
			'box_wrapper_header_background_color',
			[
				'label'     => esc_html__( 'Card Header BG Color', 'strativ' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .strativ-post-card__header' => 'background-color: {{VALUE}};',
				],
			]
		);

        // Header Padding
        $this->add_responsive_control(
            'box_wrapper_header_padding',
            [
                'label' => esc_html__( 'Header Padding', 'strativ' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .strativ-post-card__header' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Background Color
        $this->add_control(
            'box_wrapper_background_color',
            [
                'label'     => esc_html__( 'BG Color', 'strativ' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .strativ-card' => 'background-color: {{VALUE}};',
                ],
                'separator' => 'before',
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

        <div class="strativ-card">
            <div class="strativ-post-card__header">
				<?php if ( ! empty( $settings['category'] ) ) : ?>
                    <div class="strativ-post-card__category">
						<?php echo esc_html( $settings['category'] ); ?>
                    </div>
				<?php endif; ?>

				<?php if ( ! empty( $settings['date'] ) ): ?>
                    <div class="strativ-post-card__date">
						<?php echo esc_html( $settings['date'] ); ?>
                    </div>
				<?php endif; ?>
            </div>
			<?php if ( ! empty( $settings['image']['url'] ) ) : ?>
                <div class="strativ-post-card__image">
                    <a href="<?php echo esc_url( $settings['link']['url'] ); ?>" class="strativ-post-card__link">
                        <img src="<?php echo $settings['image']['url']; ?>" alt="<?php echo esc_attr( $settings['title'] ) ?>">
                    </a>
                </div>
			<?php endif; ?>

            <div class="strativ-post-card__content">
				<?php if ( ! empty( $settings['title'] ) ) : ?>
                    <h3 class="strativ-post-card__title">
                        <a href="<?php echo esc_url( $settings['link']['url'] ); ?>">
							<?php echo esc_html( $settings['title'] ); ?>
                        </a>
                    </h3>
				<?php endif; ?>

				<?php if ( ! empty( $settings['description'] ) ) : ?>
                    <p class="strativ-post-card__description">
						<?php echo esc_html( $settings['description'] ); ?>
                    </p>
				<?php endif; ?>
				<?php if ( ! empty( $settings['link']['url'] ) )  : ?>
                    <a href="<?php echo esc_url( $settings['link']['url'] ); ?>" class="strativ-post-card__link">
						<?php echo esc_html( $settings['link_text'] ); ?>
                    </a>
				<?php endif; ?>
            </div>
        </div>

		<?php
	}
}