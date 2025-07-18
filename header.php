<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php body_class();?>>
	
	<header class="site-header">

			<nav class="navbar navbar-expand-sm navbar-light p-1 p-lg-0 p-md-0 p-sm-0">
			  <div class="container  flex-lg-row flex-md-colomn flex-sm-column">   	
				 <div class="site-logo">
					<?php if ( function_exists( 'the_custom_logo' ) ) {
					the_custom_logo();
					}?>
			    </div>
			    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
      			<span class="navbar-toggler-icon"></span>
   				</button>
    			<div class="collapse navbar-collapse justify-content-end justify-content-sm-center justify-content-xl-end
    			justify-content-lg-end justify-content-md-center" id="collapsibleNavbar">
				    <div class="justify-content-end" id="collapsibleNavbar">
				      <ul class="navbar-nav ">
				       <?php
										// it just checks the condition for safety
										if ( has_nav_menu( 'menu-2' ) ) {

											wp_nav_menu(
												array(
													'container'  => '',
													'items_wrap' => '%3$s',
													'theme_location' => 'menu-2',
												)
											);

										} ?>
				      </ul>
	   			 </div>
			  </div>
			  </div>
			</nav>
	</header>
