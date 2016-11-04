<?php

$theme_color_option = get_option( 'vuetiful-theme-color' );
$theme_colors       = vuetiful_get_theme_colors();
$theme_color_names  = array_keys( $theme_colors );

if ( ! in_array( $theme_color_option, $theme_color_names ) ) {
	$theme_color_option = $theme_color_names[0];
}

$theme_color = $theme_colors[ $theme_color_option ][1];

$css = <<<CSS
* { margin: 0; padding: 0; outline: 0; }

body, html { height: 100%; }

body {
	font-size: 14px;
	line-height: 1.3;
	font-family: 'Open Sans', arial, helvetica, sans-serif;
	color: #000;
	background: #eee;
}

h1,
h2,
h3,
h4,
h5,
h6 { font-weight: 400; padding-bottom: 0.3em; }

a { color: #777; text-decoration: none; cursor: pointer; transition: color 0.3s; }
a:hover { color: {$theme_color}; }
a img { border: 0; }
p { padding-bottom: 15px; }
img { max-width: 100%; height: auto; }

input, textarea, select { font-size: 14px; font-family: arial, sans-serif; }
textarea { overflow: auto; }

.cl { display: block; height: 0; font-size: 0; line-height: 0; text-indent: -4000px; clear: both; }
.notext { font-size: 0; line-height: 0; text-indent: -4000px; }
.left, .alignleft { float: left; display: inline; }
.right, .alignright { float: right; display: inline; }

.shell { max-width: 1200px; margin: 0 auto; border-bottom: 1px solid {$theme_color}; }

.header .shell,
.page-entry,
.pagination,
.footer .shell,
.widget { background: #fff; border-bottom: 2px solid {$theme_color}; box-shadow: 0 0 5px rgba(0, 0, 0, 0.15); border-radius: 4px; }

.header { padding: 20px; }
.header .shell { max-width: 1160px; padding: 10px 20px 0; background: #fff; }
.header h1 { letter-spacing: 2px; }
.header h1 a { color: #000; }
.header h1 a:hover { color: {$theme_color}; }
.header h2 { color: #666; font-size: 13px; line-height: 18px; font-style: italic; }

.main { padding: 0 20px; }
.main .shell { padding-bottom: 20px; border-bottom: 0; }
.main .shell:after { content: "."; display: block; clear: both; visibility: hidden; line-height: 0; height: 0; } 

.content { width: 75%; float: left; }
.sidebar { width: 23%; float: right; }

.navigation { font-size: 0; line-height: 0; padding-top: 10px; }
.navigation li { display: inline-block; vertical-align: top; }
.navigation li.current-menu-item a { color: #fff; background: {$theme_color}; }
.navigation a { font-size: 12px; line-height: 15px; display: block; padding: 2px 14px; }

.page-head { padding-bottom: 15px; }
.page-head h3 { font-size: 20px; line-height: 24px; }

.page-entry { padding: 20px; }
.page-entry + .page-entry { margin-top: 20px; }
.page-entry a.read-more { color: {$theme_color}; }

.pagination { margin-top: 20px; font-size: 0; line-height: 0; padding: 0 5px; }
.pagination a { display: inline-block; vertical-align: top; font-size: 14px; line-height: 24px; min-width: 24px; text-align: center; margin: 10px 5px; }
.pagination a { color: {$theme_color}; border: 1px solid {$theme_color}; border-radius: 4px; }
.pagination a.current { color: #fff; background: {$theme_color}; border-color: {$theme_color}; }

.page-content ul,
.page-content ol { list-style-position: inside; padding: 0 0 14px 14px; }
.page-content ul ul,
.page-content ul ol,
.page-content ol ul,
.page-content ol ol { padding-bottom: 0; }
.page-content img.alignleft { margin: 0 14px 14px 0; }
.page-content img.alignright { margin: 0 0 14px 14px; }
.page-content p { padding-bottom: 18px; }

.footer { padding: 0 0 20px; }
.footer .shell { padding: 10px 0; }
.footer p { padding-bottom: 0; text-align: center; }

.widget_calendar caption,
h4.widget-title { font-weight: 700; padding-bottom: 5px; margin-bottom: 5px; border-bottom: 1px solid {$theme_color}; }

.widget { padding: 10px; }
.widget + .widget { margin-top: 15px; }
.widget ul { list-style: none; }
.widget li + li { padding-top: 4px; }

.widget_calendar table { width: 100%; border-collapse: collapse; border-spacing: 0; }
.widget_calendar tfoot { display: none; }
.widget_calendar th,
.widget_calendar td { text-align: center; border: 1px solid #999; color: #333; padding: 5px; }
.widget_calendar #today { color: #fff; font-weight: 700; background: {$theme_color}; }
.widget_calendar a { font-weight: bold; color: #000; }

.widget_search .screen-reader-text { display: none; }
.widget_search form { position: relative; padding-right: 60px; }
.widget_search label { display: block; }
.widget_search input[type="search"] { width: 100%; display: block; box-sizing: border-box; border: 1px solid {$theme_color}; color: #666; padding: 5px 8px; border-radius: 4px 0 0 4px; }
.widget_search input[type="submit"] { position: absolute; top: 0; right: 0; width: 60px; height: 28px; color: #fff; border: 0; background: {$theme_color}; cursor: pointer; border-radius: 0 4px 4px 0; }

@media screen and (max-width: 768px) {
	.content,
	.sidebar { width: 100%; float: none; }
}
CSS;

echo $css;
