<footer id="site-footer" class="header-footer-group">
				<div class="container">
					<div class="footer-row">
						<div class="row justify-content-center">
							<div class="col-lg-9 col-md-9">
								<div class="row text-lg-start text-center text-md-start ">
								<div class="col-lg-6 col-md-6">
								<div class="footer-items ">
									<h4>Contact us</h4>
										<!-- <div class="first-column"> -->
									<p><strong class="text-uppercase">phone:</strong><br>+123456789</p>
									<p><strong class="text-uppercase">email:</strong><br>contact@cedarviewhotel</p>
									<p><strong class="text-uppercase">address:</strong><br>123 Lake view NSW</p>
									<!-- </div> -->
								</div>			
							</div>
								<div class="col-lg-6 col-md-6">
									<div class="footer-items">
										<h4>Links</h4>
										<?php
										if ( has_nav_menu( 'menu-2' ) ) {

											wp_nav_menu(
												array(
													'container'  => '',
													'items_wrap' => '%3$s',
													'theme_location' => 'menu-2',
												)
											);

										} ?>
									</div>
								</div>
								
							</div>
						</div>
						<div class="col-11 col-lg-3 col-md-3">
							<img src="<?php echo site_url()?>/wp-content/uploads/2025/07/footer-small_03.png" width="100%" height="auto" 
							class="footer-img">			
						</div>
					</div>
				</div>
			</div>

			<!-- <div>
				<h4>New links</h4>
				<?php
						/*wp_nav_menu(
							array(
									'menu'=>'footer menu 2',
									'menu_class' =>'footermenu2',
									'menu_id'=>'',
								    'container'  => '',
									'items_wrap' => '%3$s',
									'theme_location' => 'footer',
									)
									 );

				 */?>
			</div> -->



				<div class="copyright1">&#169;<?php echo date("Y"); ?>-<?php echo esc_html( get_bloginfo( 'name' ) ); ?>- All right reserved
			</div>
			</footer>
			<!-- #site-footer -->

<?php wp_footer();?>


	

</body>
</html>