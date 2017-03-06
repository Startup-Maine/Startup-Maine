<?php
//temporary, will go away soon
$tickets = 'https://ticketbud.com/events/32582f4c-eb1c-11e6-999e-afbf3b0f7479/register';

//include wordpress actions from actions folder
foreach (glob(get_stylesheet_directory() . '/actions/*.php') as $file) {
	$action = basename($file, '.php');
	add_action($action, function() use ($action) {
		require_once('actions/' . $action . '.php');
	});
	if (substr($action, 0, 8) == 'wp_ajax_') {
		add_action('wp_ajax_nopriv_' . substr($action, 8), function() use ($action) {
			require_once('actions/' . $action . '.php');
		});
	}
}

//include wordpress filters from filters folder
foreach (glob(get_stylesheet_directory() . '/filters/*.php') as $file) {
	$filter = basename($file, '.php');
	add_action($filter, function($input) use ($filter) {
		require_once('filters/' . $filter . '.php');
		return $input;
	});
}

//helper function
function dd($var) {
	echo '<pre>';
	print_r($var);
	exit;
}

function mscw_circle_triangle() {
	global $tickets;
	?>
	<div id="triangle">
		<div class="shape"></div>
		<div class="text">
			June 19–23<br>
			Portland ME
			<a href="<?php echo $tickets?>" target="_blank">Reserve Tickets!</a>
		</div>
	</div>
	<?php
	/*
	<div id="circle">
		<small>What's New?</small>
		Just announced: keynote for MSCW 2017, Marvin Ammori. Ammori is General Counsel for Hyperloop One and will be
		<a href="/whatsnew">[more&hellip;]</a>
	</div>
	*/
}

//social icons: replace strings with icons
class mscw_social_icons extends Walker_Nav_Menu {
 
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        global $wp_query;
        $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent
 
        // Depth-dependent classes.
        $depth_classes = array(
            ( $depth == 0 ? 'main-menu-item' : 'sub-menu-item' ),
            ( $depth >=2 ? 'sub-sub-menu-item' : '' ),
            ( $depth % 2 ? 'menu-item-odd' : 'menu-item-even' ),
            'menu-item-depth-' . $depth
        );
        $depth_class_names = esc_attr( implode( ' ', $depth_classes ) );
 
		$icons = array(
			'email' => 'fa fa-envelope',
			'facebook' => 'fa fa-facebook-official',
			'twitter' => 'fa fa-twitter',
			'youtube' => 'fa fa-youtube-play',
			'help' => 'fa fa-question-circle',
		);
		
		$title = sanitize_title_with_dashes($item->title);
		
        // Passed classes.
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );
 
        // Build HTML.
        $output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . '">';
 
        // Link attributes.
        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
        $attributes .= ' class="menu-link ' . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '" title="' . $item->title . '"';
 
        // Build HTML output and pass through the proper filter.
        $item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
            $args->before,
            $attributes,
            $args->link_before,
            array_key_exists($title, $icons) ? '<i class="' . $icons[$title] .'"></i>' : apply_filters( 'the_title', $item->title, $item->ID ),
            $args->link_after,
            $args->after
        );
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
}