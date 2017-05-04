<?php
/**
 * Plugin Name: RoadThemes Helper
 * Plugin URI: http://roadthemes.com/
 * Description: The helper plugin for RoadThemes themes.
 * Version: 1.0.0
 * Author: RoadThemes
 * Author URI: http://roadthemes.com/
 * Text Domain: roadthemes
 * License: GPL/GNU.
 /*  Copyright 2014  RoadThemes  (email : support@roadthemes.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

require_once( plugin_dir_path( __FILE__ ).'loader.php' );

// Add shortcodes
function road_skill_shortcode( $atts ) {
	$atts = shortcode_atts( array(
		'title' => 'Skill',
		'percent' => '100'
	), $atts, 'skill' );
	
	$html = '<div class="skill-wrapper">';
	$html.= '<div class="percent"><div class="percent_color" style="width: '.$atts['percent'].'%;"></div></div>';
	$html.= '<div class="percent_text">'.$atts['title'].'<span>'.$atts['percent'].'%</span></div>';
	$html.= '</div>';
	
	return $html;
}
add_shortcode( 'skill', 'road_skill_shortcode' );

function road_contact_map( $atts ) {
	global $road_opt;
	
	$html = '';
	
	if($road_opt['enable_map']) {
			$html.='<div class="map-wrapper">';
				$html.='<div id="map"></div>';
			$html.='</div>';
	}
	return $html;
}
add_shortcode( 'roadthemesmap', 'road_contact_map' );

function road_brands_shortcode( $atts ) {
	global $road_opt;
	$brand_index = 0;
	$brandfound=count($road_opt['brand_logos']);
	$atts = shortcode_atts( array(), $atts, 'ourbrands' );
	
	$html = '';
	
	if($road_opt['brand_logos']) {
		$html .= '<div class="brands-carousel">';
			foreach($road_opt['brand_logos'] as $brand) {
				if(is_ssl()){
					$brand['image'] = str_replace('http:', 'https:', $brand['image']);
				}
				$brand_index ++;
				if ( (0 == ( $brand_index - 1 ) % 2 ) || $brand_index == 1) {
					$html .= '<div class="group">';
				}
				$html .= '<div>';
				$html .= '<a href="'.$brand['url'].'" title="'.$brand['title'].'">';
					$html .= '<img src="'.$brand['image'].'" alt="'.$brand['title'].'" />';
				$html .= '</a>';
				$html .= '</div>';
				if ( ( ( 0 == $brand_index % 2 || $brandfound == $brand_index ))  ) {
					$html .= '</div>';
				}
			}
		$html .= '</div>';
	}
	
	return $html;
}
add_shortcode( 'ourbrands', 'road_brands_shortcode' );

function road_latestposts_shortcode( $atts ) {
	global $road_opt;
	
	$atts = shortcode_atts( array(
		'posts_per_page' => 5,
		'order' => 'DESC',
		'orderby' => 'post_date',
		'image' => 'wide', //square
		'length' => 20
	), $atts, 'latestposts' );

	
	if($atts['image']=='wide'){
		$imagesize = 'sozo-post-thumbwide';
	} else {
		$imagesize = 'sozo-post-thumb';
	}
	$html = '';

	$postargs = array(
		'posts_per_page'   => $atts['posts_per_page'],
		'offset'           => 0,
		'category'         => '',
		'category_name'    => '',
		'orderby'          => $atts['orderby'],
		'order'            => $atts['order'],
		'include'          => '',
		'exclude'          => '',
		'meta_key'         => '',
		'meta_value'       => '',
		'post_type'        => 'post',
		'post_mime_type'   => '',
		'post_parent'      => '',
		'post_status'      => 'publish',
		'suppress_filters' => true );
	
	$postslist = get_posts( $postargs );

	$html.='<div class="posts-carousel">';

			foreach ( $postslist as $post ) {
				$html.='<div class="item-col">';
					$html.='<div class="post-wrapper">';
						
						$html.='<div class="post-thumb">';
							$html.='<a href="'.get_the_permalink($post->ID).'">'.get_the_post_thumbnail($post->ID, $imagesize).'</a>';
						$html.='</div>';
						
						$html.='<div class="post-info">';
						
							$html.='<h3 class="post-title"><a href="'.get_the_permalink($post->ID).'">'.get_the_title($post->ID).'</a></h3>';
							
							$html.='<span class="post-date"><span class="day">'.get_the_date('d', $post->ID).'</span><span class="month">'.get_the_date('M', $post->ID).'</span></span>';
							
							$html.='<div class="post-excerpt">';
								$html.=road_excerpt_by_id($post, $length = $atts['length']);
							$html.='</div>';
							
						$html.='</div>';

					$html.='</div>';
				$html.='</div>';

			}
	$html.='</div>';

	wp_reset_postdata();
	
	return $html;
}
add_shortcode( 'latestposts', 'road_latestposts_shortcode' );

function road_popular_category_shortcode( $atts ) {

	$atts = shortcode_atts( array(
		'category' => '',
		'image' => ''
	), $atts, 'popular_category' );
	
	$html = '';
	
	$html .= '<div class="category-wrapper">';
		$pcategory = get_term_by( 'slug', $atts['category'], 'product_cat', 'ARRAY_A' );
		if($pcategory){
			$html .= '<div class="category-list">';
				$html .= '<h3><a href="'. get_term_link($pcategory['slug'], 'product_cat') .'">'. $pcategory['name'] .'</a></h3>';
				
				$html .= '<ul>';
					$args2 = array(
						'taxonomy'     => 'product_cat',
						'child_of'     => 0,
						'parent'       => $pcategory['term_id'],
						'orderby'      => 'name',
						'show_count'   => 0,
						'pad_counts'   => 0,
						'hierarchical' => 0,
						'title_li'     => '',
						'hide_empty'   => 0
					);
					$sub_cats = get_categories( $args2 );

					if($sub_cats) {
						foreach($sub_cats as $sub_category) {
							$html .= '<li><a href="'.get_term_link($sub_category->slug, 'product_cat').'">'.$sub_category->name.'</a></li>';
						}
					}
				$html .= '</ul>';
			$html .= '</div>';

			if ($atts['image']!='') {
			$html .= '<div class="cat-img">';
				$html .= '<a href="'.get_term_link($pcategory['slug'], 'product_cat').'"><img class="category-image" src="'.esc_attr($atts['image']).'" alt="" /></a>';
			$html .= '</div>';
			}
		}
	$html .= '</div>';
	
	return $html;
}
add_shortcode( 'popular_category', 'road_popular_category_shortcode' );

function road_icon_shortcode( $atts ) {
	$atts = shortcode_atts( array(
		'icon' => ''
	), $atts, 'roadicon' );
	
	$html = '<i class="fa '.$atts['icon'].'"></i>';
	
	
	return $html;
}
add_shortcode( 'roadicon', 'road_icon_shortcode' );

//Add less compiler
function compileLessFile($input, $output, $params) {
    // include lessc.inc
    require_once( plugin_dir_path( __FILE__ ).'less/lessc.inc.php' );
	
	$less = new lessc;
	$less->setVariables($params);
	
    // input and output location
    $inputFile = get_template_directory().'/less/'.$input;
    $outputFile = get_template_directory().'/css/'.$output;

    try {
		$less->compileFile($inputFile, $outputFile);
	} catch (Exception $ex) {
		echo "lessphp fatal error: ".$ex->getMessage();
	}
}

function road_excerpt_by_id($post, $length = 10, $tags = '<a><em><strong>') {
 
	if(is_int($post)) {
		// get the post object of the passed ID
		$post = get_post($post);
	} elseif(!is_object($post)) {
		return false;
	}
 
	if(has_excerpt($post->ID)) {
		$the_excerpt = $post->post_excerpt;
		return apply_filters('the_content', $the_excerpt);
	} else {
		$the_excerpt = $post->post_content;
	}
 
	$the_excerpt = strip_shortcodes(strip_tags($the_excerpt), $tags);
	$the_excerpt = preg_split('/\b/', $the_excerpt, $length * 2+1);
	$excerpt_waste = array_pop($the_excerpt);
	$the_excerpt = implode($the_excerpt);
 
	return apply_filters('the_content', $the_excerpt);
}