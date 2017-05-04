<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Road_Themes
 * @since Road Themes 1.0
 */
?>
<?php global $road_opt; 
if(is_ssl()){
	$road_opt['logo_main']['url'] = str_replace('http:', 'https:', $road_opt['logo_main']['url']);
}
?>
		<div class="header-container">
			<?php if(isset($road_opt)) { ?>
				<div class="top-bar">
					<div class="container-fluid">
							<?php if( isset($road_opt['images_top_bar']['url']) ){ ?>
								<div class="images-top-bar"><a href="<?php echo esc_attr($road_opt['images_top_bar_link']);?>"><img src="<?php echo esc_url($road_opt['images_top_bar']['url']); ?>" alt="" /></a></div>
							<?php } ?>
						<div class="col-xs-12 col-lg-4 col-md-4">
							<div class="top-message"><?php echo esc_html($road_opt['welcome_message']); ?></div>
						</div>	
						<div class="col-xs-12 col-lg-8 col-md-8">
							<?php if(isset($road_opt) && $road_opt['countdown_date']!=''){ ?>
								<div class="countdown" data-time="<?php echo esc_attr($road_opt['countdown_date']);?>"><?php echo esc_html($road_opt['countdown_date']);?></div>
							<?php }?>
						</div>
					</div>
				</div>
			<?php } ?>
			<div class="header clearfix">
				<div class="container-fluid">
					<div class="row">
						<div class="col-xs-12 col-lg-7 col-lg-push-2 f-logo">
							<?php if( isset($road_opt['logo_main']['url']) ){ ?>
								<div class="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo esc_url($road_opt['logo_main']['url']); ?>" alt="" /></a></div>
							<?php
							} else { ?>
								<h1 class="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
								<?php
							} ?>

							<div class="horizontal-menu visible-large">
								<div class="visible-large">
									<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container_class' => 'primary-menu-container', 'menu_class' => 'nav-menu' ) ); ?>
								</div>
							</div>

						</div>
					
						<div class="col-xs-12 col-lg-2 col-lg-pull-7 visible-large">
							<div class="nav-categories">
								<?php
								$cat_menu_class = '';
								if(isset($road_opt['categories_menu_home']) && $road_opt['categories_menu_home']) {
									$cat_menu_class .=' show_home';
								}
								if(isset($road_opt['categories_menu_sub']) && $road_opt['categories_menu_sub']) {
									$cat_menu_class .=' show_inner';
								}
								?>
								<div class="categories-menu visible-large <?php echo esc_attr($cat_menu_class); ?>">
									<div class="catemenu-toggler"><span><?php if(isset($road_opt)) { echo esc_html($road_opt['categories_menu_label']); } else { esc_html_e('Category', 'sozo'); } ?></span><i class="fa fa-align-left"></i></div>
									<?php wp_nav_menu( array( 'theme_location' => 'categories', 'container_class' => 'categories-menu-container', 'menu_class' => 'categories-menu' ) ); ?>
									<div class="morelesscate">
										<span class="morecate"><i class="fa fa-plus"></i><?php if ( isset($road_opt['categories_more_label']) && $road_opt['categories_more_label']!='' ) { echo esc_html($road_opt['categories_more_label']); } else { esc_html_e('More Categories', 'sozo'); } ?></span>
										<span class="lesscate"><i class="fa fa-minus"></i><?php if ( isset($road_opt['categories_less_label']) && $road_opt['categories_less_label']!='' ) { echo esc_html($road_opt['categories_less_label']); } else { esc_html_e('Close Menu', 'sozo'); } ?></span>
									</div>
								</div>
								
								
								
							</div>		
						</div>
						<div class="col-xs-12 col-lg-3">
						
							<?php if (class_exists('SitePress')) { ?>
							<div class="switcher">
								<div class="currency"><?php do_action('currency_switcher'); ?></div>
								<?php do_action('icl_language_selector'); ?>
							</div>
							<?php } ?>
							
							<?php if( isset($road_opt['top_menu']) ) {
								$menu_object = wp_get_nav_menu_object( $road_opt['top_menu'] );
								$menu_args = array(
									'menu_class'      => 'nav_menu',
									'menu'         => $road_opt['top_menu'],
								); ?>
								<div class="top-menu widget">
									<?php wp_nav_menu( $menu_args ); ?>
								</div>
							<?php } ?>
						
						
							<?php if ( class_exists( 'WC_Widget_Cart' ) ) {
								the_widget('Custom_WC_Widget_Cart'); 
							} ?>
						
							<div class="visible-small mobile-menu">
									<div class="mbmenu-toggler"><?php echo esc_html($road_opt['mobile_menu_label']);?><span class="mbmenu-icon"><i class="fa fa-bars"></i></span></div>
									<div class="clearfix"></div>
									<?php wp_nav_menu( array( 'theme_location' => 'mobilemenu', 'container_class' => 'mobile-menu-container', 'menu_class' => 'nav-menu' ) ); ?>
							</div>
							
						</div>
					</div>
					
				</div>

			</div>
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-offset-2 col-xs-12">
						<?php if( class_exists('WC_Widget_Product_Categories') && class_exists('WC_Widget_Product_Search') ) { ?>
							<div class="header-search">
								<div class="cate-toggler"><?php esc_html_e('All Categories', 'sozo');?></div>
								<?php the_widget('WC_Widget_Product_Categories', array('hierarchical' => true, 'title' => 'Categories', 'orderby' => 'order')); ?>
								<?php the_widget('WC_Widget_Product_Search', array('title' => 'Search')); ?>
							</div>
						<?php } ?>
						
						<?php if(isset($road_opt['header_shipping']) && $road_opt['header_shipping']!=''){ ?>
							<div class="header-shipping">
								<?php echo wp_kses($road_opt['header_shipping'], array(
									'a' => array(
										'href' => array(),
										'title' => array()
									),
									'img' => array(
										'src' => array(),
										'alt' => array()
									),
									'ul' => array(),
									'li' => array(),
									'i' => array(
										'class' => array()
									),
									'br' => array(),
									'em' => array(),
									'strong' => array(),
									'p' => array(),
								)); ?>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>