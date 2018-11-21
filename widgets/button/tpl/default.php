<button class="button <?php echo esc_attr($classes)?>"
    <?php echo $id ? 'id="'.esc_attr($id).'"' : '' ?>
    <?php echo $type ? 'type="'.esc_attr($type).'"' : '' ?>
    <?php echo $title ? 'title="'.esc_attr($title).'"' : '' ?>
    <?php if ( ! empty( $onclick ) ) echo 'onclick="' . esc_js( $onclick ) . '"'; ?>
    <?php if ($button_color || $text_color) {?>
    style="<?php echo $button_color ? 'background:'.esc_attr($button_color).';' : '' ?> <?php echo $text_color ? 'color:'.esc_attr($text_color).';' : '' ?> "
    <?php }?>
>
    <?php echo wp_kses_post( $text ) ?>
</button>
