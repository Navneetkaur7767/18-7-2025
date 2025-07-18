<?php  /**
    * Template Name: Show Event
    */
get_header();?>

<?php 
global $wpdb;
$results[]='';
$results = $wpdb->get_row("SELECT * from wp_events WHERE id = 3");
print_r($results);

?>

 <div class="custom-form-mydata">

 <form method="post" action="">
			<input type="hidden" name="action" value="show-event"/>
			    <h2 class="text-center">Events  Form</h2>
			    <div class="form-group"> 
			    	<input type="text" name="id" class="form-control" value="<?php echo ($results->id);?>" disabled >
			    </div>
		  <div class="form-group">
		    <label for="event-title">Event Title</label>
		    <input type="text" name="event-title" class="form-control" id="event-title" aria-describedby="event-title" placeholder="Event Title" value="<?php echo ($results->event_title);?>" />
		  </div>
		  <div class="form-group">
		    <label for="event-start-date">Start Date</label>
		    <input type="text" name="start-date" class="form-control" id="event-start-date" placeholder="Start Date" value="<?php echo ($results->startdate);?>" />
		  </div>
		 <div class="form-group">
		    <label for="event-end-date">End Date</label>
		    <input type="text" name="end-date" class="form-control" id="event-end-date" placeholder="End Date" value="<?php echo ($results->enddate);?>" />
		  </div>
		 <div class="fetch-link">
		 <input type="submit" value="Submit">
        </div>
		</form>
</div>

<?php get_footer();?>