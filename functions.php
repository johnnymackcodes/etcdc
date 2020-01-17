<?php

// =============================================================================
// FUNCTIONS.PHP
// -----------------------------------------------------------------------------
// Overwrite or add your own custom functions to Pro in this file.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Enqueue Parent Stylesheet
//   02. Additional Functions
// =============================================================================

// Enqueue Parent Stylesheet
// =============================================================================

add_filter( 'x_enqueue_parent_stylesheet', '__return_true' );


// Additional Functions
// =============================================================================

function getProject( $atts, $content = null ) {
	$type = 'project';

	$a = shortcode_atts( array(
		'category' => 'category',
	), $atts );

	$args = array(
		'post_type'     => $type,
		'post_status'   => 'publish',
		'showposts'     => - 1,
		'order'         => 'ASC',
		'category_name' => $atts['category']
	);

	$my_query      = new WP_Query( $args );
	$return_string = '<div class="projects">';

	if ( $my_query->have_posts() ) {
		while ( $my_query->have_posts() ) : $my_query->the_post();
			$post_id      = get_the_id();
			$post_title   = get_the_title();
			$post_content = get_the_content();
			$image        = get_the_post_thumbnail_url( $post_id, 'medium' );
			$link         = get_the_permalink( $post_id );

			$return_string .= '<div class="project-block" style="background: url(' . $image . ') no-repeat center / cover;"><a href="' . $link . '"><h6>' . $post_title . '</h6></a>';
			$return_string .= '<span class="content-block"></span>';
			$return_string .= '</div >';
		endwhile;
	}

	$return_string .= '</div>';

	wp_reset_query();
	wp_reset_postdata();

	return $return_string;
}

add_shortcode( 'projects', 'getProject' );

function getStaff( $atts, $content = null ) {
	$type = 'staff';

	$a = shortcode_atts( array(
		'category' => 'category',
	), $atts );

	$args = array(
		'post_type'     => $type,
		'post_status'   => 'publish',
		'showposts'     => - 1,
		'order'         => 'DESC',
		'category_name' => $atts['category']
	);

	$my_query      = new WP_Query( $args );
	$return_string = '<div class="staff">';

	if ( $my_query->have_posts() ) {
		while ( $my_query->have_posts() ) : $my_query->the_post();
			$post_id      = get_the_id();
			$post_title   = get_the_title();
			$title        = get_field( 'title', $post_id );
			$post_content = get_the_content();
			$image        = get_the_post_thumbnail_url( $post_id, 'full' );
			$link         = get_the_permalink( $post_id );

			$return_string .= '<div class="staff-block"><div class="feat-img" style="background:url(' . $image . ') no-repeat center / cover;"></div><div class="staff-content"><h5>' . $post_title . '</h5><span class="staff-title">' . $title . '</span>';
			$return_string .= '<span class="staff-content-block">' . $post_content . '</span></div>';
			$return_string .= '</div >';
		endwhile;
	}

	$return_string .= '</div>';

	wp_reset_query();
	wp_reset_postdata();

	return $return_string;
}

add_shortcode( 'staff', 'getStaff' );
