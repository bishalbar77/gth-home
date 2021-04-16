<?php
/**
 * @codingStandardsIgnoreFile
 */

namespace JupiterX_Core\Raven\Modules\Posts\Carousel\Actions;

defined( 'ABSPATH' ) || die();

use JupiterX_Core\Raven\Modules\Posts\Classes\Post_Base;

class Post_Cover extends Post_Base {

	protected function register_action_hooks() {
		add_action( 'elementor/element/raven-posts-carousel/section_sort_filter/after_section_end', [ $this, 'register_action_controls' ] );
	}

	public function register_action_controls( \Elementor\Widget_Base $widget ) {
		$this->skin = $widget->get_skin( 'cover' );

		$this->register_controls();
		$this->inject_controls();
		$this->update_controls();
	}

	protected function register_controls() {
		$this->register_container_controls();
		$this->register_image_controls();
		$this->register_icons_controls();
		$this->register_title_controls();
		$this->register_meta_controls();
		$this->register_excerpt_controls();
		$this->register_button_controls();
	}

	protected function register_container_controls() {
		$this->skin->start_controls_section(
			'section_container',
			[
				'label' => __( 'Container', 'jupiterx-core' ),
				'tab' => 'style',
			]
		);

		$this->skin->add_responsive_control(
			'post_padding',
			[
				'label' => __( 'Padding', 'jupiterx-core' ),
				'type' => 'dimensions',
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .raven-post' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->skin->add_control(
			'post_align',
			[
				'label' => __( 'Alignment', 'jupiterx-core' ),
				'type' => 'choose',
				'label_block' => false,
				'default' => '',
				'options' => [
					'left' => [
						'title' => __( 'Left', 'jupiterx-core' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'jupiterx-core' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'jupiterx-core' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .raven-post-content' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->skin->start_controls_tabs( 'tabs_container' );

		$this->skin->start_controls_tab(
			'tab_container_normal',
			[
				'label' => __( 'Normal', 'jupiterx-core' ),
			]
		);

		$this->skin->add_group_control(
			'raven-background',
			[
				'name' => 'post_background',
				'exclude' => [ 'image' ],
				'fields_options' => [
					'background' => [
						'label' => __( 'Background Color Type', 'jupiterx-core' ),
					],
					'color' => [
						'label' => __( 'Background Color', 'jupiterx-core' ),
					],
				],
				'selector' => '{{WRAPPER}} .raven-post',
			]
		);

		$this->skin->add_control(
			'post_border_heading',
			[
				'label' => __( 'Border', 'jupiterx-core' ),
				'type' => 'heading',
				'separator' => 'before',
			]
		);

		$this->skin->add_control(
			'post_border_color',
			[
				'label' => __( 'Color', 'jupiterx-core' ),
				'type' => 'color',
				'condition' => [
					$this->skin->get_control_id( 'post_border_border!' ) => '',
				],
				'selectors' => [
					'{{WRAPPER}} .raven-post' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->skin->add_group_control(
			'border',
			[
				'name' => 'post_border',
				'placeholder' => '1px',
				'exclude' => [ 'color' ],
				'fields_options' => [
					'width' => [
						'label' => __( 'Border Width', 'jupiterx-core' ),
					],
				],
				'selector' => '{{WRAPPER}} .raven-post',
			]
		);

		$this->skin->add_control(
			'post_border_radius',
			[
				'label' => __( 'Border Radius', 'jupiterx-core' ),
				'type' => 'dimensions',
				'size_units' => [ 'px', '%' ],
				'default' => [
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .raven-post' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->skin->add_group_control(
			'box-shadow',
			[
				'name' => 'post_box_shadow',
				'selector' => '{{WRAPPER}} .raven-post',
			]
		);

		$this->skin->end_controls_tab();

		$this->skin->start_controls_tab(
			'tab_container_hover',
			[
				'label' => __( 'Hover', 'jupiterx-core' ),
			]
		);

		$this->skin->add_group_control(
			'raven-background',
			[
				'name' => 'hover_post_background',
				'exclude' => [ 'image' ],
				'fields_options' => [
					'background' => [
						'label' => __( 'Background Color Type', 'jupiterx-core' ),
					],
					'color' => [
						'label' => __( 'Background Color', 'jupiterx-core' ),
					],
				],
				'selector' => '{{WRAPPER}} .raven-post:hover',
			]
		);

		$this->skin->add_control(
			'hover_post_border_heading',
			[
				'label' => __( 'Border', 'jupiterx-core' ),
				'type' => 'heading',
				'separator' => 'before',
			]
		);

		$this->skin->add_control(
			'hover_post_border_color',
			[
				'label' => __( 'Color', 'jupiterx-core' ),
				'type' => 'color',
				'condition' => [
					$this->skin->get_control_id( 'hover_post_border_border!' ) => '',
				],
				'selectors' => [
					'{{WRAPPER}} .raven-post:hover' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->skin->add_group_control(
			'border',
			[
				'name' => 'hover_post_border',
				'placeholder' => '1px',
				'exclude' => [ 'color' ],
				'fields_options' => [
					'width' => [
						'label' => __( 'Border Width', 'jupiterx-core' ),
					],
				],
				'selector' => '{{WRAPPER}} .raven-post:hover',
			]
		);

		$this->skin->add_control(
			'hover_post_border_radius',
			[
				'label' => __( 'Border Radius', 'jupiterx-core' ),
				'type' => 'dimensions',
				'size_units' => [ 'px', '%' ],
				'default' => [
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .raven-post:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->skin->add_group_control(
			'box-shadow',
			[
				'name' => 'hover_post_box_shadow',
				'selector' => '{{WRAPPER}} .raven-post:hover',
			]
		);

		$this->skin->end_controls_tab();

		$this->skin->end_controls_tabs();

		$this->skin->end_controls_section();
	}

	protected function register_image_controls() {
		$this->skin->start_controls_section(
			'section_image',
			[
				'label' => __( 'Featured Image', 'jupiterx-core' ),
				'tab' => 'style',
				'condition' => [
					$this->skin->get_control_id( 'show_image' ) => 'yes',
				],
			]
		);

		$this->skin->add_control(
			'post_image_background_position',
			[
				'label' => __( 'Background Position', 'jupiterx-core' ),
				'type' => 'select',
				'default' => 'center center',
				'options' => [
					'center center' => __( 'Center Center', 'jupiterx-core' ),
					'center left' => __( 'Center Left', 'jupiterx-core' ),
					'center right' => __( 'Center Right', 'jupiterx-core' ),
					'top center' => __( 'Top Center', 'jupiterx-core' ),
					'top left' => __( 'Top Left', 'jupiterx-core' ),
					'top right' => __( 'Top Right', 'jupiterx-core' ),
					'bottom center' => __( 'Bottom Center', 'jupiterx-core' ),
					'bottom left' => __( 'Bottom Left', 'jupiterx-core' ),
					'bottom right' => __( 'Bottom Right', 'jupiterx-core' ),
				],
				'selectors' => [
					'{{WRAPPER}} .raven-image-fit img' => '-o-object-position: {{VALUE}}; object-position: {{VALUE}};',
				],
			]
		);

		$this->skin->add_control(
			'post_image_background_size',
			[
				'label' => __( 'Background Size', 'jupiterx-core' ),
				'type' => 'select',
				'default' => 'cover',
				'options' => [
					'auto' => __( 'Auto', 'jupiterx-core' ),
					'cover' => __( 'Cover', 'jupiterx-core' ),
					'contain' => __( 'Contain', 'jupiterx-core' ),
				],
				'selectors' => [
					'{{WRAPPER}} .raven-image-fit img' => '-o-object-fit: {{VALUE}}; object-fit: {{VALUE}};',
				],
			]
		);

		$this->skin->add_control(
			'post_image_hover_effect',
			[
				'label' => __( 'Hover Effect', 'jupiterx-core' ),
				'type' => 'select',
				'default' => '',
				'options' => [
					'' => __( 'None', 'jupiterx-core' ),
					'slide-right' => __( 'Slide Right', 'jupiterx-core' ),
					'slide-down' => __( 'Slide Down', 'jupiterx-core' ),
					'scale-down' => __( 'Scale Down', 'jupiterx-core' ),
					'scale-up' => __( 'Scale Up', 'jupiterx-core' ),
					'blur' => __( 'Blur', 'jupiterx-core' ),
					'grayscale-reverse' => __( 'Grayscale to Color', 'jupiterx-core' ),
					'grayscale' => __( 'Color to Grayscale', 'jupiterx-core' ),
				],
				'prefix_class' => 'raven-hover-',
			]
		);

		$this->skin->start_controls_tabs( 'tabs_post_image' );

		$this->skin->start_controls_tab(
			'tab_post_image_normal',
			[
				'label' => __( 'Normal', 'jupiterx-core' ),
			]
		);

		$this->skin->add_responsive_control(
			'post_image_opacity',
			[
				'label' => __( 'Opacity', 'jupiterx-core' ),
				'type' => 'slider',
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1,
						'step' => 0.01,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .raven-post-image img' => 'opacity: {{SIZE}};',
				],
			]
		);

		$this->skin->end_controls_tab();

		$this->skin->start_controls_tab(
			'tab_post_image_hover',
			[
				'label' => __( 'Hover', 'jupiterx-core' ),
			]
		);

		$this->skin->add_responsive_control(
			'hover_post_image_opacity',
			[
				'label' => __( 'Opacity', 'jupiterx-core' ),
				'type' => 'slider',
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1,
						'step' => 0.01,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .raven-post-image:hover img' => 'opacity: {{SIZE}};',
					'{{WRAPPER}} .raven-post-inside:hover .raven-post-image img' => 'opacity: {{SIZE}};',
				],
			]
		);

		$this->skin->end_controls_tab();

		$this->skin->end_controls_tabs();

		$this->skin->end_controls_section();
	}

	protected function inject_controls() {
		$this->skin->start_injection( [
			'at' => 'after',
			'of' => $this->skin->get_control_id( 'slides_scroll' ),
		] );

		$this->register_image_size_control();

		$this->register_settings_controls();

        $this->skin->end_injection();

		$this->skin->start_injection( [
			'at' => 'before',
			'of' => $this->skin->get_control_id( 'post_padding' ),
		] );

		$this->skin->add_responsive_control(
			'columns_height',
			[
				'label' => __( 'Height', 'jupiterx-core' ),
				'type' => 'slider',
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .raven-post' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->skin->add_responsive_control(
			'columns_space_between',
			[
				'label' => __( 'Space Between', 'jupiterx-core' ),
				'type' => 'slider',
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .slick-list' => 'margin-left: calc( -{{SIZE}}{{UNIT}} / 2 ); margin-right: calc( -{{SIZE}}{{UNIT}} / 2 );',
					'{{WRAPPER}} .slick-items:not(.slick-slider)' => 'margin-left: calc( -{{SIZE}}{{UNIT}} / 2 ); margin-right: calc( -{{SIZE}}{{UNIT}} / 2 );',
					'{{WRAPPER}} .slick-item' => 'padding-left: calc( {{SIZE}}{{UNIT}} / 2 ); padding-right: calc( ( {{SIZE}}{{UNIT}} / 2 ) + 2px );',
				],
			]
		);

		$this->skin->end_injection();

		$this->skin->start_injection( [
			'at' => 'after',
			'of' => $this->skin->get_control_id( 'post_align' ),
		] );

		$this->skin->add_control(
			'columns_vertical_align',
			[
				'label' => __( 'Vertical Alignment', 'jupiterx-core' ),
				'type' => 'choose',
				'label_block' => false,
				'default' => '',
				'options' => [
					'top' => [
						'title' => __( 'Top', 'jupiterx-core' ),
						'icon' => 'eicon-v-align-top',
					],
					'middle' => [
						'title' => __( 'Middle', 'jupiterx-core' ),
						'icon' => 'eicon-v-align-middle',
					],
					'bottom' => [
						'title' => __( 'Bottom', 'jupiterx-core' ),
						'icon' => 'eicon-v-align-bottom',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .raven-post-inside' => 'align-items: {{VALUE}};',
				],
				'selectors_dictionary' => [
					'top' => 'flex-start',
					'middle' => 'center',
					'bottom' => 'flex-end',
				],
				'condition' => [
					$this->skin->get_control_id( 'show_image' ) => 'yes',
				],
			]
		);

		$this->skin->end_injection();
	}

	protected function update_controls() {

		$this->skin->update_control(
			'show_image',
			[
				'default' => 'yes',
			]
		);
	}

	public function render_post( $instance ) {
		$this->skin = $instance;

		$show_image = $this->skin->get_instance_value( 'show_image' );
		$hover_effect = $this->skin->get_instance_value( 'post_hover_effect' );
		$post_classes = [ 'raven-post' ];
		$content      = ! $this->has_overlay() || 'cover' !== $this->skin->get_id();

		if ( 'yes' === $show_image ) {
			$post_classes[] = 'raven-post-inside';
		}

		if ( ! empty( $hover_effect ) ) {
			$post_classes[] = 'elementor-animation-' . $hover_effect;
		}

		?>

		<div class="slick-item">
			<div class="raven-post-wrapper">
				<div class="<?php echo esc_attr( implode( ' ', $post_classes ) ); ?>">
					<?php
					$this->render_image();

					if ( $content ) {
						?>
						<div class="raven-post-content">
							<?php
							$this->render_ordered_content();
							$this->render_button();
							?>
						</div>
						<?php
					}
					?>
				</div>
			</div>
		</div>
		<?php
	}

	protected function render_image() {
		if ( ! $this->skin->get_instance_value( 'show_image' ) ) {
			return;
		}

		$settings = [
			'image_size' => $this->skin->get_instance_value( 'post_image_size_size' ),
			'image' => [
				'id' => get_post_thumbnail_id(),
			],
			'image_custom_dimension' => $this->skin->get_instance_value( 'post_image_size_custom_dimension' ),
		];

		$image_html = \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings );

		if ( empty( $image_html ) ) {
			return;
		}

		$classes = [
			'raven-post-image',
			'raven-image-fit'
		];

		$html_tag = $this->disabled_overlay() ? 'a' : 'div';

		?>
		<div class="raven-post-image-wrap">
			<?php
			printf(
				'<%1$s class="%2$s" %3$s><span class="raven-post-image-overlay">%6$s</span>%4$s %5$s</%1$s>',
				$html_tag,
				implode( ' ', $classes ),
				( 'a' === $html_tag ) ? 'href="' . get_permalink() . '"' : '',
				( isset( $fit_image ) ) ? $fit_image : '',
				$image_html,
				$this->get_render_overlay()
			);
			?>
		</div>
		<?php
	}
}
