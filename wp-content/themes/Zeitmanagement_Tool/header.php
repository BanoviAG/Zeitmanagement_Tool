<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<title><?php wp_title(''); ?><?php if (wp_title('', false)) {
										echo ' :';
									} ?> <?php bloginfo('name'); ?></title>

	<link href="//www.google-analytics.com" rel="dns-prefetch">

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php bloginfo('description'); ?>">
	<link rel="stylesheet" href="https://use.typekit.net/tke5rpr.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

	<!-- wrapper -->
	<div class="wrapper">

		<!-- header -->
		<header class="header clear" role="banner">

			<div class="nav flex-column sidebar">
						
				<nav>

					<?php 	

						if (current_user_can('administrator')){
							wp_nav_menu(
								array(
									'menu' => 'superadmin-menu',
									'container' => '',
									'menu_class' => 'navbar-nav',
								)
							);
						} 

						else if (current_user_can('_administrator')){
								wp_nav_menu(
								array(
									'menu' => 'admin-menu',
									'container' => '',
									'menu_class' => 'navbar-nav',
								)
							);
						} 

						else {
								wp_nav_menu(
								array(
									'menu' => 'main-menu',
									'container' => '',
									'menu_class' => 'navbar-nav',
								)
						);}

					?>

				</nav>

				<a href="localhost/Zeitmanagement_Tool/profil"><i class="fa fa-user" aria-hidden="true"></i></a>

			</div>

		</header>
		<!-- /header -->