<?php  /**
    * Template Name: My Form
    */
get_header();?>


	<div class="custom-form-mydata">

		<form method="post" action="">
			<input type="hidden" name="action" value="create-event"/>
			    <h2 class="text-center">Events</h2>
		  <div class="form-group">
		    <label for="event-title">Event Title</label>
		    <input type="text" name="event-title" class="form-control" id="event-title" aria-describedby="event-title" placeholder="Event Title" value="">
		  </div>
		  <div class="form-group">
		    <label for="event-start-date">Start Date</label>
		    <input type="date" name="start-date" class="form-control" id="event-start-date" placeholder="Start Date" value="">
		  </div>
		 <div class="form-group">
		    <label for="event-end-date">End Date</label>
		    <input type="date" name="end-date" class="form-control" id="event-end-date" placeholder="End Date" value="">
		  </div>
		 <div class="fetch-link">
		 	<input type="submit" name="submit" value="submit">
        </div>
		</form>
 </div>

<?php
get_footer();?>