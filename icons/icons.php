<?php
function metro4_so_widgets_icon_families_filter( $families ){
    $bundled = array(
        'mif' => __( 'Metro 4 Icons', 'metro4-so-widgets-bundle' )
    );

    foreach ( $bundled as $font => $name) {
        include_once 'filter.php';
        $families[$font] = array(
            'name' => $name,
            'style_uri' => plugin_dir_url(__FILE__) . 'style.css',
            'icons' => apply_filters('siteorigin_widgets_icons_' . $font, array() ),
        );
    }

    return $families;
}
add_filter( 'siteorigin_widgets_icon_families', 'metro4_so_widgets_icon_families_filter' );