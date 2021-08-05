<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package appzend
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<div id="page" class="site">

	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'appzend-commerce' ); ?></a>
	<?php
	$header_class = array();
	$menu_style = get_theme_mod('appzend-menu-style', 'sidebar');
	$header_class[] = 'menu-style-'.$menu_style;
	if(get_theme_mod('appzend_menu_relative', 'enable') == 'enable') $header_class[] = 'relative-menu';
	if(get_theme_mod('appzend_menu_sticky', 'disable') == 'enable') $header_class[] = 'sticky-menu';

	?>
	<header id="masthead" class="site-header <?php echo implode( ' ' , $header_class ); ?>">
		<div class="nav-classic">
			<div class="container">
				<div class="header-middle-inner">
					<div class="site-branding">
						<?php the_custom_logo(); ?>

						<h1 class="site-title">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
								<?php bloginfo( 'name' ); ?>
							</a>
						</h1>
						<?php 
							$appzend_description = get_bloginfo( 'description', 'display' );
							if ( $appzend_description || is_customize_preview() ) : ?>
								<p class="site-description"><?php echo $appzend_description; /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */ ?></p>
						<?php endif; ?>
					</div> <!-- .site-branding -->
					<div class="header-search">
						<?php get_search_form(  ) ?>
					</div>
					<div class="nav-menu flex-align text-right">
						<?php if(get_theme_mod('appzend_button_enable', 'disable') == 'enable'): ?>
						<div class="extralmenu-item">
							<div class="right-btn <?php echo esc_attr(get_theme_mod('appzend-button-class')); ?>">
								<a class="btn btn-primary" <?php if(get_theme_mod('appzend-button-open-link-new-tab')): echo 'target="_blank"'; endif; ?> href="<?php echo esc_url(get_theme_mod('appzend-button-url', "#")); ?>"><?php echo esc_html(get_theme_mod('appzend-button-text', 'Shop Now')); ?></a>
							</div>
						</div>
						<?php endif; ?>
						<?php if(get_theme_mod('appzend_call_button', 'disable') == 'enable'):
							$call_text = get_theme_mod('appzend-call-button-text', __('Call Anytime', 'appzend-commerce'));
							$call_number = get_theme_mod('appzend-call-phone-text', __('+1 000 000', 'appzend-commerce'));
						?>
						<div class="link-box">
                            <div class="call-us">
                                <a class="link" href="tel:666-888-0000">
									<i class="<?php echo esc_attr(get_theme_mod('appzend-call-phone-icon', 'far fa-comments')); ?>"></i>
									<span class="text-wrapper">
										<?php if($call_text): ?>
										<span class="sub-text"><?php echo esc_html($call_text); ?></span>
										<?php endif; ?>
										<?php if($call_number): ?>
										<span class="number"><?php echo esc_html($call_number); ?></span>
										<?php endif; ?>
									</span>
                                </a>
                            </div>
                        </div>
						<?php endif; ?>

						<?php 
                        if(get_theme_mod('appzend-show-cart', 'enable') == 'enable'):
                            do_action('appzend_woocommerce_header_cart');
                        endif;
                        ?>

						<?php do_action('appzend_menu_toggle'); ?>
					</div>
				</div>
			</div> <!-- container -->


			<?php
				if($menu_style == 'normal'):
				$alignment = get_theme_mod('appzend_menu_alignment'); 
				$alignment_class = get_zppzend_alignment_class($alignment);
			?>
			<div class="nav-menu full-width-nav-menu flex-align <?php echo esc_attr($alignment_class); ?>">
				<div class="container">
					<nav class="box-header-nav main-menu-wapper" aria-label="<?php echo esc_attr__( 'Main Menu', 'appzend-commerce' ); ?>" role="navigation">
						<?php
							wp_nav_menu( array(
									'theme_location'  => 'menu-1',
									'container'       => '',
									'container_class' => '',
									'container_id'    => '',
									'menu_class'      => 'main-menu',
								)
							);
						?>
					</nav>
				</div><!-- .container end -->
			</div>
			<?php endif; ?>
			
		</div>
	</header><!-- #masthead -->

	<?php 
		if ( is_front_page() && get_theme_mod('appzend_banner_slider_section', 'enable') == 'enable' ) {
			get_template_part( 'section/home', 'slider' );
		}


		if (!is_front_page() ) {
			/**
			 * appzend_breadcrumbs hook
			 *
			 * @since 1.0.0
			 */
			do_action( 'appzend_breadcrumbs' );
		}
	?>