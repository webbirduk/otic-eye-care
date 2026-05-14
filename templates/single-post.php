<?php
/**
 * Template for single posts
 */
get_header();

if ( did_action( 'elementor/loaded' ) ) {
	$widget = \Elementor\Plugin::$instance->elements_manager->create_element_instance( [
		'elType' => 'widget',
		'widgetType' => 'otic_single_post_page',
		'id' => 'automatic-single-post',
		'settings' => [],
	] );

	if ( $widget ) {
		$widget->print_element();
	}
} else {
	while ( have_posts() ) : the_post();
		the_content();
	endwhile;
}

get_footer();
