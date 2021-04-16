<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>La Pizzeria</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> >

	<header class="side-header">
		<div class='container'>
				<div class="logo">
					<a href="<?php echo esc_url( home_url('/') ) ; ?>">
						<img src="<?php echo get_template_directory_uri() ?>/files la pizzeria/img/logo.Svg" class="logoimage">
					</a>
				</div>  <!-- logo -->
				<div class="header-information">
					<div class="socials">
						<?php
							$args = array(

								'theme_location' => 'social-menu',
								'container'		 => 'nav',
								'container_class'=> 'socials',
								'container_id'   => 'socials',
								'link_before'	 => '<span class="sr-text">',
								'link_after'	 => '</span>',
							);
							wp_nav_menu($args);
						?>
					</div> <!--socials-->
					<div class="address">
						<p>8179 Bay Avenue  Mountain View, CA 94043</p>
						<p>Phone Number: +1-92-456-7890</p>
					</div>
				</div><!-- header-information-->
		</div> <!--container-->
	</header>

	<div class="main-menu">
		<div class="mobile-menu">
			<a href="#" class="mobile"><i class="fa fa-bars"></i> Menu</a>
		</div>



		<div class="navigation container">
			<?php

				$args = array(
					'theme_location' => 'header-menu',
					'container' 	 => 'nav',
					'container_class'=>	'site-nav',

				);

				wp_nav_menu($args);

			?>
			</nav>
		</div>

	</div>
