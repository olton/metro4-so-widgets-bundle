<?php
/*
Widget Name: Metro 4 Button
Description: A push button widget.
Author: Metro 4
Author URI: https://metroui.org.ua
*/

class Metro4_SOW_Button_Widget extends SiteOrigin_Widget {
    function __construct() {

        parent::__construct(
            'metro4-sow-button',
            __('Metro 4 Button', 'metro4-so-widgets-bundle'),
            array(
                'description' => __('A customizable button widget.', 'metro4-so-widgets-bundle'),
                'help' => 'https://github.com/olton/metro4-so-widgets-bundle.git'
            ),
            array(

            ),
            false,
            plugin_dir_path(__FILE__)
        );

    }

    function get_template_name($instance) {
        return 'button-template';
    }

    function get_widget_form() {
        return array(
            'text' => array(
                'type' => 'text',
                'label' => __('Button text', 'metro4-so-widgets-bundle'),
            ),

            'design' => array(
                'type' => 'section',
                'label' => __('Design', 'metro4-so-widgets-bundle'),
                'hide' => true,
                'fields' => array(
                    'button_size' => array(
                        'type' => 'select',
                        'label' => __( 'Button Size', 'metro4-so-widgets-bundle' ),
                        'default' => '',
                        'options' => array(
                            ''  => __( 'Default', 'metro4-so-widgets-bundle' ),
                            'mini'  => __( 'Mini', 'metro4-so-widgets-bundle' ),
                            'small'  => __( 'Small', 'metro4-so-widgets-bundle' ),
                            'large'  => __( 'Large', 'metro4-so-widgets-bundle' ),
                        ),
                    ),

                    'button_color_class' => array(
                        'type' => 'select',
                        'label' => __( 'Button Color Class', 'metro4-so-widgets-bundle' ),
                        'default' => '',
                        'options' => array(
                            ''  => __( 'Default', 'metro4-so-widgets-bundle' ),
                            'primary'  => __( 'Primary', 'metro4-so-widgets-bundle' ),
                            'secondary'  => __( 'Secondary', 'metro4-so-widgets-bundle' ),
                            'success'  => __( 'Success', 'metro4-so-widgets-bundle' ),
                            'alert'  => __( 'Alert', 'metro4-so-widgets-bundle' ),
                            'warning'  => __( 'Warning', 'metro4-so-widgets-bundle' ),
                            'info'  => __( 'Info', 'metro4-so-widgets-bundle' ),
                            'yellow'  => __( 'Yellow', 'metro4-so-widgets-bundle' ),
                            'dark'  => __( 'Dark', 'metro4-so-widgets-bundle' ),
                            'light'  => __( 'Light', 'metro4-so-widgets-bundle' ),
                        ),
                    ),

                    'button_outline' => array(
	                    'type' => 'checkbox',
	                    'label' => __( 'Outline button?', 'widget-form-fields-text-domain' ),
	                    'default' => false
                    ),

                    'button_flat' => array(
	                    'type' => 'checkbox',
	                    'label' => __( 'Flat button?', 'widget-form-fields-text-domain' ),
	                    'default' => false
                    ),

                    'button_shadow' => array(
	                    'type' => 'checkbox',
	                    'label' => __( 'Drop shadow', 'widget-form-fields-text-domain' ),
	                    'default' => false
                    ),

                    'button_mode' => array(
	                    'type' => 'select',
	                    'label' => __( 'Button mode', 'metro4-so-widgets-bundle' ),
	                    'default' => '',
	                    'options' => array(
		                    ''  => __( 'Default', 'metro4-so-widgets-bundle' ),
		                    'square'  => __( 'Square', 'metro4-so-widgets-bundle' ),
		                    'cycle'  => __( 'Cycle', 'metro4-so-widgets-bundle' ),
	                    ),
                    ),

                    'button_color' => array(
                        'type' => 'color',
                        'label' => __('Button color', 'metro4-so-widgets-bundle'),
                    ),

                    'text_color' => array(
                        'type' => 'color',
                        'label' => __('Text color', 'metro4-so-widgets-bundle'),
                    ),
                ),
            ),

            'button_icon' => array(
                'type' => 'section',
                'label' => __('Icon', 'metro4-so-widgets-bundle'),
                'fields' => array(
                    'icon_selected' => array(
                        'type' => 'icon',
                        'label' => __('Icon', 'metro4-so-widgets-bundle'),
                    ),

                    'icon_size' => array(
                        'type' => 'measurement',
                        'label' => __('Icon Size', 'widget-form-fields-text-domain'),
                        'default' => '1em',
                    ),

                    'icon_color' => array(
                        'type' => 'color',
                        'label' => __('Icon color', 'metro4-so-widgets-bundle'),
                    ),

                    'icon' => array(
                        'type' => 'media',
                        'label' => __('Image icon', 'metro4-so-widgets-bundle'),
                        'description' => __('Replaces the icon with your own image icon.', 'so-widgets-bundle'),
                    ),

                ),
            ),

            'attributes' => array(
                'type' => 'section',
                'label' => __('Other attributes and SEO', 'metro4-so-widgets-bundle'),
                'hide' => true,
                'fields' => array(
                    'id' => array(
                        'type' => 'text',
                        'label' => __('Button ID', 'metro4-so-widgets-bundle'),
                        'description' => __('An ID attribute allows you to target this button in Javascript.', 'metro4-so-widgets-bundle'),
                    ),

                    'type' => array(
                        'type' => 'select',
                        'label' => __('Button type', 'metro4-so-widgets-bundle'),
                        'description' => __('Select button type.', 'metro4-so-widgets-bundle'),
                        'options' => array(
                            '' => __( 'Default', 'widget-form-fields-text-domain' ),
                            'button' => __( 'Button', 'widget-form-fields-text-domain' ),
                            'submit' => __( 'Submit', 'widget-form-fields-text-domain' ),
                            'reset'  => __( 'Reset', 'widget-form-fields-text-domain' ),
                        )
                    ),

                    'classes' => array(
                        'type' => 'text',
                        'label' => __('Button Classes', 'metro4-so-widgets-bundle'),
                        'description' => __('Additional CSS classes added to the button link.', 'metro4-so-widgets-bundle'),
                    ),

                    'url' => array(
                        'type' => 'text',
                        'label' => __('URI', 'metro4-so-widgets-bundle'),
                        'description' => __('Link href.', 'metro4-so-widgets-bundle'),
                    ),

                    'rel' => array(
	                    'type' => 'select',
	                    'label' => __('Link rel', 'metro4-so-widgets-bundle'),
	                    'description' => __('Adds a rel attribute to the button link.', 'metro4-so-widgets-bundle'),
	                    'options' => array(
		                    '' => __( 'Default', 'widget-form-fields-text-domain' ),
		                    'alternate' => __( 'alternate', 'widget-form-fields-text-domain' ),
		                    'author' => __( 'author', 'widget-form-fields-text-domain' ),
		                    'bookmark' => __( 'bookmark', 'widget-form-fields-text-domain' ),
		                    'help' => __( 'help', 'widget-form-fields-text-domain' ),
		                    'license' => __( 'license', 'widget-form-fields-text-domain' ),
		                    'next' => __( 'next', 'widget-form-fields-text-domain' ),
		                    'nofollow' => __( 'nofollow', 'widget-form-fields-text-domain' ),
		                    'noreferrer' => __( 'noreferrer', 'widget-form-fields-text-domain' ),
		                    'prev' => __( 'prev', 'widget-form-fields-text-domain' ),
		                    'search' => __( 'search', 'widget-form-fields-text-domain' ),
		                    'tag' => __( 'tag', 'widget-form-fields-text-domain' ),
	                    )
                    ),

                    'target_blank' => array(
	                    'type' => 'checkbox',
	                    'default' => false,
	                    'label' => __('Open in a new window', 'so-widgets-bundle'),
                    ),

                    'target' => array(
	                    'type' => 'select',
	                    'label' => __('Link rel', 'metro4-so-widgets-bundle'),
	                    'description' => __('Link target.', 'metro4-so-widgets-bundle'),
	                    'options' => array(
		                    '' => __( 'No defined', 'widget-form-fields-text-domain' ),
		                    '_self' => __( '_self', 'widget-form-fields-text-domain' ),
		                    '_blank' => __( '_blank', 'widget-form-fields-text-domain' ),
		                    '_parent' => __( '_parent', 'widget-form-fields-text-domain' ),
		                    '_top' => __( '_top', 'widget-form-fields-text-domain' ),
	                    )
                    ),

                    'onclick' => array(
                        'type' => 'text',
                        'label' => __('Onclick', 'metro4-so-widgets-bundle'),
                        'description' => __('Run this Javascript when the button is clicked. Ideal for tracking.', 'metro4-so-widgets-bundle'),
                    )
                )
            ),
        );
    }

    function get_template_variables( $instance, $args ) {

        $attributes = $instance['attributes'];
        $design = $instance['design'];

        $classes = [];

        if ( ! empty($design['button_color_class']) ) {
        	$classes[] = $design['button_color_class'];
        }
        if ( ! empty($design['button_size']) ) {
        	$classes[] = $design['button_size'];
        }
        if ( ! empty($design['button_mode']) ) {
        	$classes[] = $design['button_mode'];
        }
	    if ($design['button_outline']) {
		    $classes[] = "outline";
	    }
	    if ($design['button_flat']) {
		    $classes[] = "flat-button";
	    }
	    if ($design['button_shadow']) {
		    $classes[] = "drop-shadow";
	    }
	    if (! empty( $attributes['classes'] )) {
		    $classes[] = $attributes['classes'];
	    }

	    $classes = implode( ' ', array_map( 'sanitize_html_class',$classes ));

        $id = false;
        if ( ! empty( $attributes['id'] ) ) {
            $id = $attributes['id'];
        }

        $title = false;
        if ( ! empty( $attributes['title'] ) ) {
            $title = $attributes['title'];
        }

        $type = $attributes['type'] != "" ? $attributes['type'] : false;
        $rel = $attributes['rel'] != "" ? $attributes['rel'] : false;
        $url = ! empty( $attributes['url'] ) ? $attributes['url'] : false;
        $target = ! empty( $attributes['target'] ) ? $attributes['target'] : false;


        $button_color = isset($design['button_color']) ? $design['button_color'] : false;
        $text_color = isset($design['text_color']) ? $design['text_color'] : false;

        $icon_image_url = '';
        if( ! empty( $instance['button_icon']['icon'] ) ) {
            $attachment = wp_get_attachment_image_src( $instance['button_icon']['icon'] );

            if ( ! empty( $attachment ) ) {
                $icon_image_url = $attachment[0];
            }
        }

        return array(
            'onclick' => ! empty( $attributes['onclick'] ) ? $attributes['onclick'] : '',
            'text' => $instance['text'],
            'classes' => $classes,
            'title' => $title,
            'id' => $id,
            'type' => $type,
            'rel' => $rel,
            'button_color' => $button_color,
            'text_color' => $text_color,
            'icon_image_url' => $icon_image_url,
            'icon' => $instance['button_icon']['icon_selected'],
            'icon_color' => $instance['button_icon']['icon_color'],
            'icon_size' => $instance['button_icon']['icon_size'],
            'url' => $url,
            'target' => $target,
        );
    }
}

siteorigin_widget_register('metro4-sow-button', __FILE__, 'Metro4_SOW_Button_Widget');
