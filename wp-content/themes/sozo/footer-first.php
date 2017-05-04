<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Road_Themes
 * @since Road Themes 1.0
 */
?>
<?php global $road_opt; ?>

	<div class="footer">
	
		<?php if(isset($road_opt)) { ?>
		<div class="footer-top">
			<div class="container-fluid">
				<div class="row">	
					<?php
					if( isset($road_opt['footer_menu1']) && $road_opt['footer_menu1']!='' ) {
						$menu1_object = wp_get_nav_menu_object( $road_opt['footer_menu1'] );
						$menu1_args = array(
							'menu_class'      => 'nav_menu',
							'menu'         => $road_opt['footer_menu1'],
						); ?>
						<div class="col-sm-6  col-md-2 col-lg-2">
							<div class="widget widget_menu">
								<h3 class="widget-title"><?php echo esc_html($menu1_object->name); ?></h3>
								<?php wp_nav_menu( $menu1_args ); ?>
							</div>
						</div>
					<?php }
					if( isset($road_opt['footer_menu2']) && $road_opt['footer_menu2']!='' ) {
						$menu2_object = wp_get_nav_menu_object( $road_opt['footer_menu2'] );
						$menu2_args = array(
							'menu_class'      => 'nav_menu',
							'menu'         => $road_opt['footer_menu2'],
						); ?>
						<div class="col-sm-6  col-md-2 col-lg-2">
							<div class="widget widget_menu">
								<h3 class="widget-title"><?php echo esc_html($menu2_object->name); ?></h3>
								<?php wp_nav_menu( $menu2_args ); ?>
							</div>
						</div>
					<?php }
					if( isset($road_opt['footer_menu3']) && $road_opt['footer_menu3']!='' ) {
						$menu3_object = wp_get_nav_menu_object( $road_opt['footer_menu3'] );
						$menu3_args = array(
							'menu_class'      => 'nav_menu',
							'menu'         => $road_opt['footer_menu3'],
						); ?>
						<div class="col-sm-6  col-md-2 col-lg-2">
							<div class="widget widget_menu">
								<h3 class="widget-title"><?php echo esc_html($menu3_object->name); ?></h3>
								<?php wp_nav_menu( $menu3_args ); ?>
							</div>
						</div>
					<?php } ?>
					
					
					<?php if(isset($road_opt['contact_us']) && $road_opt['contact_us']!=''){ ?>
					<div class="col-sm-6  col-md-3 col-lg-3">
						<div class="widget widget_contact_us">
						<?php echo wp_kses($road_opt['contact_us'], array(
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
					</div>
					<?php } ?>

					<div class="col-sm-6  col-md-3 col-lg-3">
						<?php
						if ( isset($road_opt['newsletter_form']) ) {
							if(class_exists( 'WYSIJA_NL_Widget' )){
								the_widget('WYSIJA_NL_Widget', array(
									'title' => esc_html($road_opt['newsletter_title']),
									'form' => (int)$road_opt['newsletter_form'],
									'id_form' => 'newsletter1',
									'success' => '',
								));
							}
						}
						?>
						
						<div class="widget-payment">
							<?php if(isset($road_opt['payment_icons']) && $road_opt['payment_icons']!='' ) {
								echo wp_kses($road_opt['payment_icons'], array(
									'a' => array(
										'href' => array(),
										'title' => array()
									),
									'img' => array(
										'src' => array(),
										'alt' => array()
									),
								)); 
							} ?>
						</div>

					</div>
				</div>
			</div>
		</div>
		<?php } ?>
		<div class="footer-bottom">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-8 col-md-8 col-sm-8">
						<?php if( isset($road_opt['logo_footer']['url']) ){ ?>
							<div class="widget-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo esc_url($road_opt['logo_footer']['url']); ?>" alt="" /></a></div>
						<?php } ?>

						<div class="widget-copyright">
							<?php 
							if( isset($road_opt['copyright']) && $road_opt['copyright']!='' ) {
								echo wp_kses($road_opt['copyright'], array(
									'a' => array(
										'href' => array(),
										'title' => array()
									),
									'br' => array(),
									'em' => array(),
									'strong' => array(),
								));
							} else {
								echo 'Copyright <a href="'.esc_url( home_url( '/' ) ).'">'.get_bloginfo('name').'</a> '.date('Y').'. All Rights Reserved';
							}
							?>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4">
					
						<div class="widget widget-social">
							
							<?php
							if(isset($road_opt['social_icons'])) {
								echo '<ul class="social-icons">';
								foreach($road_opt['social_icons'] as $key=>$value ) {
									if($value!=''){
										if($key=='vimeo'){
											echo '<li><a class="'.esc_attr($key).' social-icon" href="'.esc_url($value).'" title="'.ucwords(esc_attr($key)).'" target="_blank"><i class="fa fa-vimeo-square"></i></a></li>';
										} else {
											echo '<li><a class="'.esc_attr($key).' social-icon" href="'.esc_url($value).'" title="'.ucwords(esc_attr($key)).'" target="_blank"><i class="fa fa-'.esc_attr($key).'"></i></a></li>';
										}
									}
								}
								echo '</ul>';
							}
							?>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>