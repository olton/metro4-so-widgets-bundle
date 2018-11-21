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
                'label' => __('Design and layout', 'metro4-so-widgets-bundle'),
                'hide' => true,
                'fields' => array(
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
                            'button' => __( 'Simple button', 'widget-form-fields-text-domain' ),
                            'submit' => __( 'Submit button', 'widget-form-fields-text-domain' ),
                            'reset'  => __( 'Reset button', 'widget-form-fields-text-domain' ),
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

        return array(
            'onclick' => ! empty( $attributes['onclick'] ) ? $attributes['onclick'] : '',
            'text' => $instance['text'],
            'classes' => $classes,
            'title' => $title,
            'id' => $id,
            'type' => $type,
            'button_color' => $button_color,
            'text_color' => $text_color,
        );
    }
}

siteorigin_widget_register('metro4-sow-button', __FILE__, 'Metro4_SOW_Button_Widget');
