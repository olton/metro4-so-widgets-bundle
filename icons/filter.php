<?php
function metro4_so_widgets_icons_filter($icons) {
	$svg = file_get_contents(dirname(__FILE__)."/font/metro.svg");
	$xml = simplexml_load_string($svg);
	$filter = [];
	foreach ($xml->defs->font->glyph as $glyph) {
		if (!isset($glyph['glyph-name'])) continue;
		$filter[(string)$glyph['glyph-name']] = (string)$glyph['unicode'];
	}

    return array_merge($icons, $filter);
}
add_filter('siteorigin_widgets_icons_mif', 'metro4_so_widgets_icons_filter');