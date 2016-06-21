<?php
 
// Haupmenü
function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Hauptmenü' ),
      'footer-menu' => __( 'Footermenü' )
    )
  );
}
add_action( 'init', 'register_my_menus' );

// Anpassungen im Theme

function bornholm_add_theme_support() {
    add_theme_support( 'custom-header' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-formats', array(
        'aside',
        'link',
        'gallery',
        'status',
        'quote',
        'image',
        'video',
        'audio',
        'chat'
    ) );
    add_theme_support( 'html5', array(
        'comment-list',
        'comment-form',
        'search-form',
        'gallery',
        'caption',
    ) );
    add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'bornholm_add_theme_support' );



// Sidebar registrien

function benjamin_sidebars() {
    register_sidebar( array(
        'name'          => __( 'Blogseiten Anpassungen', 'benjaminzekavica' ),
        'id'            => 'sidebar',
        'description'   => __( 'Hier kommen die jeweiligen Widgets hinein.' ),
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>'
    ) );
}
add_action( 'widgets_init', 'benjamin_sidebars' );


// Suchfeld auf der 404 Seite.

function fb_get_search_form() {
	do_action( 'get_search_form' );

	$form = '<form method="get" id="searchform" action="' . get_option('home') . '/" >
	<div><label class="screen-reader-text" for="s">' . __('Search for:') . '</label>
	<input type="text" value="' . esc_attr(apply_filters('the_search_query', get_search_query())) . '" name="s" id="s" onfocus="clearSearch();" />
	<input type="submit" id="searchsubmit" value="'. esc_attr__('Search') .'" />
	</div>
	</form>';

	echo apply_filters('get_search_form', $form);
}

// Bilder im Blog

add_filter( 'post_thumbnail_html', 'my_post_image_html', 10, 3 );

function my_post_image_html( $html, $post_id, $post_image_id ) {
	$html = '<a href="' . get_permalink( $post_id ) . '" title="' . esc_attr( get_the_title( $post_id ) ) . '">' . $html . '</a>';
	return $html;
}


// Pagination

function navi() {

    global $wp_query;
    $max_page = $wp_query->max_num_pages;
    $nump=6;

    if($max_page > 1) echo '<div class="navigation"><span class="pages">Seite :</span>';

    if ($max_page!=1) {
        $paged = intval(get_query_var('paged'));
        if(empty($paged) || $paged == 0) $paged = 1;

        if($paged!=1)echo '<a href="'.get_pagenum_link($paged-1).'" class="prev" title="Previous">&laquo;</a>';

        if($paged!=1) echo '<a href="'.get_pagenum_link(1).'"> 1</a>';
        else echo '<span class="current"> 1</span>';

        if($paged-$nump>1) $start=$paged-$nump; else $start=2;
        if($paged+$nump<$max_page) $end=$paged+$nump; else $end=$max_page-1;

        if($start>2) echo " ... ";

        for ($i=$start;$i<=$end;$i++) {
            $zero = '';
            if($i < '10') $zero = '0';
            if($paged!=$i) echo '<a href="'.get_pagenum_link($i).'">'.$zero.$i.'</a>';
            else echo '<span class="current">'.$zero.$i.'</span>';
        }

        if($end<$max_page-1) echo "";

        if($paged!=$max_page) echo '<a href="'.get_pagenum_link($paged+1).'" class="next" title="weitere"> &raquo;</a>';

        if($paged!=$max_page) echo '<a href="'.get_pagenum_link($max_page).'" class="last" title="letzte"> &raquo;&raquo;</a>';
            else echo '<span class="current">'.$max_page.'</span>';
    }

    if($max_page > 1) echo '</div>';

}  


// Kommentare aktiveren und anpassen

function mytheme_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>
	<<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
	<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<?php endif; ?>
	<div class="comment-author vcard">
	<?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
	<?php printf( __( '<cite class="fn">%s</cite> <span class="says">says:</span>' ), get_comment_author_link() ); ?>
	</div>
	<?php if ( $comment->comment_approved == '0' ) : ?>
		<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em>
		<br />Be
	<?php endif; ?>

	<div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
		<?php
		
			printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)' ), '  ', '' );
		?>
	</div>

	<?php comment_text(); ?>

	<div class="reply">
	<?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
	</div>
	<?php if ( 'div' != $args['style'] ) : ?>
	</div>
	<?php endif; ?>
<?php
}

$args = array (
	'number'         => '10',
);

$comment_query = new WP_Comment_Query;
$comments = $comment_query->query( $args );

// Adminmenü oben

function custom_toolbar() {
	global $wp_admin_bar;

	$args = array(
		'id'     => 'unique_id',
		'title'  => __( 'Meine Theme Optionen', 'text_domain' ),
		'href'   => 'http://.../',
	);
	$wp_admin_bar->add_menu( $args );

}
add_action( 'wp_before_admin_bar_render', 'custom_toolbar', 999 );


// WooCommerce 

	
add_theme_support( 'woocommerce' );

// Kleine Bilder werden beschnitten 

add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size(200, 200, true); // Normal post thumbnails

// Scripte

function scripts_and_styles_register() {
	$template_url = get_template_directory_uri();
	wp_enqueue_script( 'jquery' );
	wp_register_script( 'animation', $template_url .'/js/animations.js', false, false, false );
	wp_enqueue_style( 'bootstrap-style', $template_url . '/css/bootstrap.min.css' );
    wp_enqueue_style( 'font-awesome-style', $template_url . '/css/font-awesome.min.css');

	//Main Style
	wp_enqueue_style( 'main-style', get_stylesheet_uri() );

	// Load Thread comments WordPress script.
	if ( is_singular() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'scripts_and_styles_register', 1 );
