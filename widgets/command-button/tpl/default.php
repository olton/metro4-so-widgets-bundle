<button class="command-button <?php echo esc_attr($button_color_class)?> <?php echo $button_outline ? "outline" : "" ?> <?php echo $icon_right ? "icon-right" : "" ?>"
	<?php echo $id ? 'id="'.esc_attr($id).'"' : '' ?>
	<?php echo "type='".esc_attr($type)."'" ?>
	<?php echo $title ? 'title="'.esc_attr($title).'"' : '' ?>
	<?php if ( ! empty( $onclick ) ) echo 'onclick="' . esc_js( $onclick ) . '"'; ?>
	<?php if ($button_color || $text_color) {?>
		style="<?php echo $button_color ? 'background:'.esc_attr($button_color).';' : '' ?> <?php echo $text_color ? 'color:'.esc_attr($text_color).';' : '' ?> "
	<?php }?>
>
	<?php
	if( ! empty( $icon_image_url ) ) {
		?><div class="sow-icon-image icon" style="<?php echo 'background-image: url(' . sow_esc_url( $icon_image_url ) . ')' ?>"></div><?php
	}
	else {
		$icon_styles = array();
		$icon_styles[] = "font-size: 2rem; width: 2.6875rem; height: 2.6875rem; line-height: 2.6875rem";
		if ( ! empty( $icon_color ) ) $icon_styles[] = 'color: ' . $icon_color;
		if ( $icon_right ) $icon_styles[] = 'order: 2;'; else $icon_styles[] = 'order: 1;';
		echo siteorigin_widget_get_icon( $icon, $icon_styles );
	}
	?>
	<span class="caption">
        <?php echo wp_kses_post( $text ) ?>
        <small><span><?php echo wp_kses_post( $secondary_text ) ?></span></small>
    </span>
</button>