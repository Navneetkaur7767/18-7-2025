
<?php

function my_custom_theme_menus(){
// <!-- *Register navigation menus uses wp_nav_menu in five places. -->
register_nav_menus( array(
	'menu-1'=>__( 'Primary Menu' ,'my-custom-theme' ),
    'menu-2'=>__('Footer Menu','my-custom-theme'),
));
}
add_action('init', 'my_custom_theme_menus');
/*
* Register the side bar (they are like widgets)
*/
function my_custom_theme_sidebar(){
	register_sidebar(
		array(
			'name' => __('Primary-sidebar' , 'my-custom-theme'),
			'id' => 'sidebar-1',

	));
}

add_action('widgets_init', 'my_custom_theme_sidebar');


/*
* Register the featured image (we need to tell the theme support featured images)
*/
add_theme_support( 'post-thumbnails' );

// add image size
add_image_size( 'my-custom-image-size', 640, 999 );


/*
* adding the custom css
*/
function my_custom_theme_enqueue(){

	
	wp_enqueue_style( 'custom_style', get_template_directory_uri() . '/assets/css/style.css'); 
    wp_enqueue_style( 'bootstrap',get_template_directory_uri() . '/assets/css/bootstrap.min.CSS'); 
    wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array(),"",true); 
    wp_enqueue_style('my-custom-theme-style',get_stylesheet_uri());

}
add_action('wp_enqueue_scripts','my_custom_theme_enqueue');


/*
* support for the title tag it will show the title tag
*/
add_theme_support('title-tag');

/*
* support for custom logo
*/
$logo_width  = 120;
$logo_height = 90;
add_theme_support(
		'custom-logo',
		array(
			'height'      => $logo_height,
			'width'       => $logo_width,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

/*
* How to create custom post types for product and taxanomies
*/
function create_custom_post_type() {
register_post_type('product',
    array(
        'labels' => array(
            'name' => __('Products'),
            'singular_name' => __('Product')
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'products'),
        // 'label'               => __( 'movies', 'twentytwentyone' ),
        // 'description'         => __( 'Movie news and reviews', 'twentytwentyone' ),
        // 'labels'              => $labels,
        // // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'comments', 'revisions', 'custom-fields', ),
        // // You can associate this CPT with a taxonomy or custom taxonomy. 
        // 'taxonomies'          => array( 'genre'),
        // /* A hierarchical CPT is like Pages and can have
        // * Parent and child items. A non-hierarchical CPT
        // * is like Posts.
        // */
        'hierarchical'        => true,
        // 'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        // 'show_in_nav_menus'   => true,
        // 'show_in_admin_bar'   => true,
        // 'menu_position'       => 5,
        // 'can_export'          => true,
        // 'has_archive'         => true,
        // 'exclude_from_search' => false,
        // 'publicly_queryable'  => true,
        'capability_type'     => 'post',
        // 'show_in_rest' => true,

    )
);
}
add_action('init', 'create_custom_post_type');

function create_custom_taxonomy() {
register_taxonomy(
    'genre',
    'product',
    array(
        'label' => __('Genre'),
        'rewrite' => array('slug' => 'genre'),
        'hierarchical' => true,

    )
);
}
add_action('init', 'create_custom_taxonomy');

/*
* Creating a function to create our CPT for movies
*/
  
function custom_post_type() {
  
// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Movies', 'Post Type General Name', 'twentytwentyone' ),
        'singular_name'       => _x( 'Movie', 'Post Type Singular Name', 'twentytwentyone' ),
        'menu_name'           => __( 'Movies', 'twentytwentyone' ),
        'parent_item_colon'   => __( 'Parent Movie', 'twentytwentyone' ),
        'all_items'           => __( 'All Movies', 'twentytwentyone' ),
        'view_item'           => __( 'View Movie', 'twentytwentyone' ),
        'add_new_item'        => __( 'Add New Movie', 'twentytwentyone' ),
        'add_new'             => __( 'Add New', 'twentytwentyone' ),
        'edit_item'           => __( 'Edit Movie', 'twentytwentyone' ),
        'update_item'         => __( 'Update Movie', 'twentytwentyone' ),
        'search_items'        => __( 'Search Movie', 'twentytwentyone' ),
        'not_found'           => __( 'Not Found', 'twentytwentyone' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'twentytwentyone' ),
    );
      
// Set other options for Custom Post Type
      
    $args = array(
        'label'               => __( 'movies', 'twentytwentyone' ),
        'description'         => __( 'Movie news and reviews', 'twentytwentyone' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( 'genre'),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */
        'hierarchical'        => true,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest' => true,
  
    );
      
    // Registering your Custom Post Type
    register_post_type( 'movies', $args );
  
}
  
/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/
  
add_action( 'init', 'custom_post_type', 0 );

function custom_taxonomy_movies() {
register_taxonomy(
    'genre',
    'Movies',
    array(
        'label' => __('Genre'),
        'rewrite' => array('slug' => 'genre'),
        'hierarchical' => true,
    )
);
}
add_action('init', 'create_custom_taxonomy');



/*
* crearted custom post type news with taxanomy
*/
// adding new post type
function create_custom_post_type_news() {
register_post_type('news',
    array(
        'labels' => array(
            'name' => __('News'),
            'singular_name' => __('News')
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'news'),
    )
);
}
add_action('init', 'create_custom_post_type_news');

function create_custom_taxonomy_news() {
register_taxonomy(
    'local',
    'news',
    array(
        'label' => __('Local'),
        'rewrite' => array('slug' => 'local'),
        'hierarchical' => true,
    )
);
register_taxonomy(
    'national',
    'news',
    array(
        'label' => __('National'),
        'description'=> ('For all National Tags'),
        'rewrite' => array('slug' => 'national'),
        'hierarchical' => false,
        'show_ui'=> true,
        'hierarchical'        => false,
        // 'public'              => true,
        // 'show_ui'             => true,
        // 'show_in_menu'        => true,
        // 'show_in_nav_menus'   => false,
        // 'show_in_admin_bar'   => false,
        // // 'menu_position'       => 5,
        // 'can_export'          => true,
        // 'has_archive'         => true,
        // 'exclude_from_search' => false,
        // 'publicly_queryable'  => true,
        // 'capability_type'     => 'post',
        // 'show_in_rest' => true,
    )
);
}
add_action('init', 'create_custom_taxonomy_news');


/*
* function to render latest post
*/
function render_my_latest_post($attr){
   

return "current time".date("Y-m-d H:i:s");

}
add_shortcode('my-latest-post',"render_my_latest_post");



/*
* my practise function 
*/
function my_theme_messages() { 
  
// Things that you want to do.
$message = 'Hello world!'; 
  
// Output needs to be return
return $message;
}
// register shortcode

add_shortcode('greeting', 'my_theme_messages');


function my_form_code()
{
    ob_start();
    ?>
    <div class="custom-form-mydata">

        <form method="post" action="">
                <h2 class="text-center">Events</h2>
          <div class="form-group">
            <label for="event-title">Event Title</label>
            <input type="text" class="form-control" id="event-title" aria-describedby="event-title" placeholder="Event Title" value="">
          </div>
          <div class="form-group">
            <label for="start-date">Start Date</label>
            <input type="date" class="form-control" id=" event-start-date" placeholder="Start Date" value="">
          </div>
         <div class="form-group">
            <label for="end-date">End Date</label>
            <input type="date" class="form-control" id=" event-end-date" placeholder="End Date" value="">
          </div>
         <div class="fetch-link">
         <a href ="" class="" title ="Fetch">Fetch</a>
     </div>
        </form>
    </div>

<?php
return ob_get_clean();

}
add_shortcode('my-form', 'my_form_code');


// Reference function for wpdp
// function save_event_form_data(){
//     if(isset($_POST['action']) && $_POST['action']=='create-event'){
//         global $wpdb;
//         $wpdb->insert("wp_event",array("event_title"=>$_POST['event-title'],"startdate"=>$_POST['start-date']));

//         $wpdb->get_results("select * from wp_event where id=1 limit 1");

//         $wpdb->update("wp_event",array("event_title"=>$_POST['event-title'],"startdate"=>$_POST['start-date']),array("id"=>"1"));
//         $wpdb->query("insert table `");
//     }
// }
// add_action("init","save_event_form_data");


/*
* Save event Data 
*/
function save_event_data()
{
  
    if(isset($_POST['action']) && $_POST['action'] == 'create-event') {
        global $wpdb;
        $wpdb->insert('wp_events',array('event_title'=>$_POST['event-title'] ,'startdate'=>$_POST['start-date'],'enddate'=>$_POST['end-date']));
    }
}
add_action('init','save_event_data');


// function show_event_data()
// {
//     if(isset($_POST['action']) && $_POST['action'] == 'show-event' )
//     {
//         global $wpdb;
//         $wpdb->update('wp_events',array('event_title'=>$_POST['event-title'],'startdate'=>$_POST['start-date'],'enddate'=>$_POST['end-date']),array('id'=>''));

//     }
// }
// add_action('init','show_event_data');

function update_event_data()
{
    if(isset($_POST['action']) && $_POST['action'] == 'update-events' )
    {
        global $wpdb;
        $wpdb->update('wp_events',array('event_title'=>$_POST['event-title'],'startdate'=>$_POST['start-date'],'enddate'=>$_POST['end-date']),array('id'=>'1'));

    }
}
add_action('init','update_event_data');


function delete_event_data()
{
    global $wpdb;
    $wpdb->delete('wp_events',array('id'=>''));

}
add_action('init','delete_event_data');
















// function update_event_data()
// {

// }
// add_action('init','update_event_data');

// function fetch_event_data()
// {

// }
// add_action('init','fetch_event_data');
?>