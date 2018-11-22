<button class="button <?php echo esc_attr($button_color_class)?> <?php echo esc_attr($button_size)?> <?php echo esc_attr($button_mode)?> <?php echo esc_attr($classes)?> <?php echo $button_flat ? "flat-button" : "" ?> <?php echo $button_outline ? "outline" : "" ?> <?php echo $button_shadow ? "drop-shadow" : "" ?>"
    <?php echo $id ? 'id="'.esc_attr($id).'"' : '' ?>
    <?php echo 'type="'.esc_attr($type).'"' ?>
    <?php echo $title ? 'title="'.esc_attr($title).'"' : '' ?>
    <?php if ( ! empty( $onclick ) ) echo 'onclick="' . esc_js( $onclick ) . '"'; ?>
    <?php if ($button_color || $text_color) {?>
    style="<?php echo $button_color ? 'background:'.esc_attr($button_color).';' : '' ?> <?php echo $text_color ? 'color:'.esc_attr($text_color).';' : '' ?> "
    <?php }?>
>
    <?php
    if( ! empty( $icon_image_url ) ) {
        ?><div class="sow-icon-image" style="<?php echo 'background-image: url(' . sow_esc_url( $icon_image_url ) . ')' ?>"></div><?php
    }
    else {
        $icon_styles = array();
        if ( ! empty( $icon_color ) ) $icon_styles[] = 'color: ' . $icon_color;
        if ( ! empty( $icon_size ) ) $icon_styles[] = 'font-size: ' . $icon_size;
        echo siteorigin_widget_get_icon( $icon, $icon_styles );
    }
    ?>

    <span><?php echo wp_kses_post( $text ) ?></span>
</button>
