<?php
/*
*	Equation Custom Post Type
*/




/* 
*	Create Custom Post Type in Dashboard
*/
add_action('init', 'lt_equation');
 
function lt_equation() {
 
	$labels = array(
		'name' => _x('Equations', 'post type general name'),
		'singular_name' => _x('Equation', 'post type singular name'),
		'add_new' => _x('Add New', 'equation item'),
		'add_new_item' => __('Add New Equation'),
		'edit_item' => __('Edit Equation'),
		'new_item' => __('New Equation'),
		'view_item' => __('View Equation'),
		'search_items' => __('Search Equations'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);
 
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'menu_position' => 5,
		'query_var' => true,
		'rewrite' => array("slug" => "equation", "with_front" => false),
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title', 'editor', 'thumbnail')
	  ); 
 
	register_post_type( 'equation' , $args );
}




/*
*	Register Taxonomy
*/
register_taxonomy("Difficulty", array("equation"), array("hierarchical" => true, "label" => "Difficulty", "singular_label" => "Difficulty", "rewrite" => true));



/*
* Custom meta boxes
*/
add_action("admin_init", "equation_init");
 
function equation_init(){
  add_meta_box("equation_comment_meta", "Equation Comments", "equation_comment_meta", "equation", "normal", "low");
}
 
function equation_comment_meta() {
  global $post;
  $custom = get_post_custom($post->ID);
  $equation_comment = $custom["equation_comment"][0];
  ?>
  <textarea cols="10" rows="2" name="equation_comment" style="width:100%;"><?php echo $equation_comment; ?></textarea>
  <?php
}

add_action('save_post', 'save_equation_comment');

function save_equation_comment(){
  global $post;
 
  update_post_meta($post->ID, "equation_comment", $_POST["equation_comment"]);
}




/*
*	Add columns to main list page
*/
add_action("manage_posts_custom_column",  "equation_custom_columns");
add_filter("manage_edit-equation_columns", "equation_edit_columns");
 
function equation_edit_columns($columns){
  $columns = array(
    "cb" => "<input type=\"checkbox\" />",
    "title" => "Equation Title",
    "equation" => "Equation",
    "difficulty" => "Difficulty",
    "author" => "Author"
  );
 
  return $columns;
}
function equation_custom_columns($column){
  global $post;
 
  switch ($column) {
    case "equation":
      the_content();
      break;
    case "difficulty":
      echo get_the_term_list($post->ID, 'Difficulty', '', ', ','');
      break;
    case "author":
      the_author();
      break;
  }
}




/*
*	Add custom post count to Right Now Content column on dashboard
*/
add_action('right_now_content_table_end', 'add_equation_counts');

function add_equation_counts() {
        if (!post_type_exists('equation')) {
             return;
        }

        $num_posts = wp_count_posts( 'equation' );
        $num = number_format_i18n( $num_posts->publish );
        $text = _n( 'Equation', 'Equations', intval($num_posts->publish) );
        if ( current_user_can( 'edit_posts' ) ) {
            $num = "<a href='edit.php?post_type=equation'>$num</a>";
            $text = "<a href='edit.php?post_type=equation'>$text</a>";
        }
        echo '<td class="first b b-equation">' . $num . '</td>';
        echo '<td class="t equation">' . $text . '</td>';

        echo '</tr>';

        if ($num_posts->pending > 0) {
            $num = number_format_i18n( $num_posts->pending );
            $text = _n( 'Equation Pending', 'Equations Pending', intval($num_posts->pending) );
            if ( current_user_can( 'edit_posts' ) ) {
                $num = "<a href='edit.php?post_status=pending&post_type=equation'>$num</a>";
                $text = "<a href='edit.php?post_status=pending&post_type=equation'>$text</a>";
            }
            echo '<td class="first b b-equation">' . $num . '</td>';
            echo '<td class="t equation">' . $text . '</td>';

            echo '</tr>';
        }
}

?>