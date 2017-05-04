<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Road_Themes
 * @since Road Themes 1.0
 */

global $road_opt;

get_header();

?>
	<div class="main-container error404">
		<div class="container">
			<div class="search-form-wrapper">
				<h2><?php esc_html_e( "Oops, that page can't be found.", "roadthemes" ); ?></h2>
				<p class="home-link"><?php esc_html_e( "Can't find what you need, Take a moment and do a search below", 'sozo' ); ?></p>
				<?php get_search_form(); ?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>