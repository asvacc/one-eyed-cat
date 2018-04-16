<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package One_Eyed_Cat_Brewing
 */

?>
<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="wrapper">
	<div class="mobile-mask"></div>
	<nav class="mobile-nav">
		<?php
			wp_nav_menu( array(
				'theme_location' => 'mobile-menu',
				'menu_id'        => 'mobile-menu'
			));

			wp_nav_menu( array(
				'theme_location' => 'mobile-menu-icons',
				'menu_id'        => 'mobile-menu-icons'
			));
		?>
	</nav>
	<nav class="desktop-nav">
		<div class="container">
			<a href="<?php echo get_site_url();?>"><img src="<?php echo TEMPLATE_DIR_URI . '/images/logo_with_text.png';?>" alt="Logo" class="logo"></a>
			<div class="desktop-menu">
				<?php
					wp_nav_menu( array(
						'theme_location' => 'desktop-menu',
						'menu_id'        => 'primary-menu'
					));
				?>
			</div>
			<div class="burger">
				<div class="burger-icon"></div>
			</div>
		</div>
	</nav>
	<div class="content">
