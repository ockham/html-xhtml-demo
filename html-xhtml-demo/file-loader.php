<?php

if ( 'hello-html' === get_query_var('pagename') ) {
	readfile( __DIR__ . '/hello-world.html' );
} elseif ( 'hello-xhtml' === get_query_var('pagename') ) {
	readfile( __DIR__ . '/hello-world.xml' );
}
