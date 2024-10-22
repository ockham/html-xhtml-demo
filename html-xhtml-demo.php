<?php
/**
 * Plugin Name:       HTML vs XHTML Demo.
 * Description:       Demonstrate rendering HTML vs XHTML in the browser.
 * Version:           0.1.0
 * Requires at least: 6.6
 */

defined( 'ABSPATH' ) || exit;

function hello_html_template( $template ) {
	if ( 'hello-html' === get_query_var('pagename') ) {
		return __DIR__ . '/hello-world.html';
	}
	if ( 'hello-xhtml' === get_query_var('pagename') ) {
		return __DIR__ . '/hello-world.xml';
	}
    return $template;
}
add_filter( 'template_include', 'hello_html_template', 99 );

function set_content_type_to_xhtml( $headers, $wp ) {
	if ( $wp->request === 'hello-xhtml' ) {
		$headers['Content-Type'] = "application/xhtml+xml";
	}
	return $headers;
}
add_filter( 'wp_headers', 'set_content_type_to_xhtml', 10, 2 );
