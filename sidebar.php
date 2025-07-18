
<!-- this checks if  sidebar is active means widget area is there but it will not show the sidebar--> 
<?php
 if(is_active_sidebar('sidebar-1'))
 	{?>
 	<ul class="sidebar">
 		<?php dynamic_sidebar('sidebar-1'); ?>
 	</ul>

 	<?php } 
 	?>


