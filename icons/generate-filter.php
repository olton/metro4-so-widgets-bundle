<?php
$svg = file_get_contents("font/metro.svg");
$xml = simplexml_load_string($svg);
$prefix = "&#x";
$filter = [];
foreach ($xml->defs->font->glyph as $glyph) {
	$filter[(string)$glyph['glyph-name']] = (string)$glyph['unicode'];
}
var_dump($filter);