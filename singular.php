<?php get_header();?>

<div class="site-content">
		<!-- it is just fetching the post not displaying -->
		<?php 
		if ( have_posts() ) :

			while ( have_posts() ):
			 
				the_post();
			
		?>

		<article <?php post_class();?>>

			<header class="entry-header">
				<?php the_title('<h1 class="entry-title">','</h1>');?>
			</header> <!-- .entry-header -->

			<div>
				<?php the_field('movie_cast');?>
				<?php the_field('movie_reating');?>
			</div>

			<!-- this code shows the featured image -->
			<?php
			the_post_thumbnail('my-custom-image-size');
			?>

			<div class="entry-content">
					<?php the_content( esc_html__( 'Continue reading &rarr;', 'my-custom-theme' ) ); ?>
					
			</div> <!--.entry-content -->

		</article> <!-- #post class-->

		<?php if (comments_open() || get_comments_number()):
			 comments_template();
			endif;
		endwhile;

	else :
		?>
		<?php get_template_part('content-none');?>
		<?php 
		endif; 
		?>
	</div><!--.site-content-->


<?php get_footer();?>
