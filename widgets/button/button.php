<?php
/*
Widget Name: Metro 4 Button
Description: A powerful yet simple button widget for your sidebars or Page Builder pages.
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
        return 'default';
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

                    'title' => array(
                        'type' => 'text',
                        'label' => __('Title attribute', 'metro4-so-widgets-bundle'),
                        'description' => __('Adds a title attribute to the button link.', 'metro4-so-widgets-bundle'),
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

        $button_color_class = ! empty($design['button_color_class']) ? $design['button_color_class'] : '';
        $button_size = ! empty($design['button_size']) ? $design['button_size'] : '';

        $classes = ! empty( $attributes['classes'] ) ? $attributes['classes'] : '';
        $classes = implode( ' ',
            array_map( 'sanitize_html_class',
                explode( ' ', $classes )
            )
        );

        $id = false;
        if ( ! empty( $attributes['id'] ) ) {
            $id = $attributes['id'];
        }

        $title = false;
        if ( ! empty( $attributes['title'] ) ) {
            $title = $attributes['title'];
        }

        $type = $attributes['type'];

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
            'button_color' => $button_color,
            'text_color' => $text_color,
            'icon_image_url' => $icon_image_url,
            'icon' => $instance['button_icon']['icon_selected'],
            'icon_color' => $instance['button_icon']['icon_color'],
            'icon_size' => $instance['button_icon']['icon_size'],
            'button_color_class' => $button_color_class,
            'button_size' => $button_size,
        );
    }
}

siteorigin_widget_register('metro4-sow-button', __FILE__, 'Metro4_SOW_Button_Widget');
