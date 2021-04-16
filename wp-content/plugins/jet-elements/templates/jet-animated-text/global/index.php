<?php
/**
 * Animated text list template
 */
$settings = $this->get_settings_for_display();
$data_settings = $this->generate_setting_json();

$classes[] = 'jet-animated-text';
$classes[] = 'jet-animated-text--effect-' . $settings['animation_effect'];

$tag = ! empty( $settings['html_tag'] ) ? $settings['html_tag'] : 'div';
?>
<<?php echo $tag; ?> class="<?php echo implode( ' ', $classes ); ?>" <?php echo $data_settings; ?>>
	<?php $this->_glob_inc_if( 'before-text', array( 'before_text_content' ) ); ?>
	<?php $this->_get_global_looped_template( 'animated-text', 'animated_text_list' ); ?>
	<?php $this->_glob_inc_if( 'after-text', array( 'after_text_content' ) ); ?>
</<?php echo $tag; ?>>