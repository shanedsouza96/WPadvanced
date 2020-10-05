<?php
	// Theme Support
	function adv_theme_support(){
		// Featured Image Support
		add_theme_support('post-thumbnails');

		// Nav Menus
		register_nav_menus(array(
			'primary' 	=> __('Primary Menu'),
			'footer'	=> __('Footer Menu')
		));

		// Post Format Support
		add_theme_support('post-formats', array('aside', 'gallery', 'link'));
	}

	add_action('after_setup_theme', 'adv_theme_support');

	// Excerpt Length
	function adv_set_excerpt_length(){
		return 25;
	}

	add_filter('excerpt_length','adv_set_excerpt_length');

//Sub menu for child pages
	function get_top_parent(){
		global $post;
		if($post->post_parent){
			$ancestors = get_post_ancestors( $post-> ID );
			return $ancestors;
		}
		return $post->ID;

	}

//TO tell if page has no child
function page_is_parent(){
	global $post;
	$pages = get_pages('child_of='.$post->ID);
	return count($pages);
}

//Widget Location
function init_widget($id){
	register_sidebar(array(
		'name'					=> 'Sidebar',
		'id'   					=> 'sidebar',
		'before_widget' => '<div class="block side-widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>'
	));

	register_sidebar(array(
		'name'					=> 'Showcase',
		'id'   					=> 'showcase',
		'before_widget' => '<div class="showcase">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>'
	));

	register_sidebar(array(
		'name'					=> 'Box1',
		'id'   					=> 'box1',
		'before_widget' => '<div class="box box1">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>'
	));

	register_sidebar(array(
		'name'					=> 'Box2',
		'id'   					=> 'box2',
		'before_widget' => '<div class="box box2">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>'
	));

	register_sidebar(array(
		'name'					=> 'Box3',
		'id'   					=> 'box3',
		'before_widget' => '<div class="box box3">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>'
	));


}
add_action('widgets_init', 'init_widget');

//Add comments
function add_theme_comments($comment, $args, $depth){
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if('div' == $args['style']){
		$tag='div';
		$add_below = 'comment';
	}
	else{
		$tag = 'li class="well comment-item"';
		$add_below = 'div-comment';
	}
}
