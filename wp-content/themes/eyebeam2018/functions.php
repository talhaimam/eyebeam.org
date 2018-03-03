<?php
/*

Hello, this is the eyebeam2018 functions file.
(20180220/dphiffer)

*/


// We need this filters so that ACF can handle symlinked folders.
// (20180222/dphiffer)
function eyebeam2018_acf_get_dir($dir) {
	if (preg_match('#/wp-content/themes/.+$#', $dir, $matches)) {
		return $matches[0];
	}
	return $dir;
}
add_filter('acf/helpers/get_dir', 'eyebeam2018_acf_get_dir');

// Libraries
$dir = __DIR__;
include_once("$dir/lib/advanced-custom-fields/acf.php");
include_once("$dir/lib/acf-repeater/acf-repeater.php");
include_once("$dir/lib/custom-post-types.php");

// Enable WP_DEBUG in wp-config.php to edit fields
// WP_DEBUG = true / custom fields come from the database
// WP_DEBUG = false / custom fields are included via PHP
if (! defined('WP_DEBUG') || ! WP_DEBUG) {

	define('ACF_LITE', true); // hide the editing UI

	include_once("$dir/lib/custom-fields/board.php");
	include_once("$dir/lib/custom-fields/community.php");
	include_once("$dir/lib/custom-fields/events.php");
	include_once("$dir/lib/custom-fields/interns.php");
	include_once("$dir/lib/custom-fields/media-release.php");
	include_once("$dir/lib/custom-fields/page.php");
	include_once("$dir/lib/custom-fields/post.php");
	include_once("$dir/lib/custom-fields/recent-press.php");
	include_once("$dir/lib/custom-fields/residency.php");
	include_once("$dir/lib/custom-fields/residents.php");
	include_once("$dir/lib/custom-fields/staff.php");
	include_once("$dir/lib/custom-fields/youth.php");
}

function eyebeam2018_setup() {

	// Flip some WordPress switches to turn on features
	add_theme_support('automatic-feed-links');
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');

	// Main navigation
	register_nav_menus(array(
		'top' => 'Top nav',
		'bottom' => 'Bottom nav'
	));

	// Don't show the version of WordPress (security, yo)
	remove_action('wp_head', 'wp_generator');

	// Weird that this is even necessary...
	add_theme_support('html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	));

	// Yeah, globals are bad, but at least we namespace ours
	$GLOBALS['eyebeam2018'] = array(
		'heroes' => array(),
		'modules' => array()
	);
}
add_action('init', 'eyebeam2018_setup');

function eyebeam2018_enqueue_css($path, $deps = array()) {
	$name = 'eyebeam2018-' . str_replace('/[^a-z0-9-]/', '-', $path);
	$url = get_stylesheet_directory_uri() . "/$path";
	$version = filemtime(__DIR__ . "/$path");
	wp_enqueue_style($name, $url, $deps, $version);
}

function eyebeam2018_enqueue_js($path, $deps = array(), $bottom = true) {
	$name = 'eyebeam2018-' . str_replace('/[^a-z0-9-]/', '-', $path);
	$url = get_stylesheet_directory_uri() . "/$path";
	$version = filemtime(__DIR__ . "/$path");
	wp_enqueue_script($name, $url, $deps, $version, $bottom);
}

// Add our CSS and JavaScript tags
function eyebeam2018_enqueue() {
	eyebeam2018_enqueue_css('fonts/eyebeam-bold.css');
	eyebeam2018_enqueue_css('fonts/arial-monospaced.css');
	eyebeam2018_enqueue_css('style.css');
	eyebeam2018_enqueue_js('js/eyebeam2018.js', array('jquery'));
}
add_action('wp_enqueue_scripts', 'eyebeam2018_enqueue');

// Helper for theme images
function eyebeam2018_img_src($path) {
	$version = filemtime(__DIR__ . "/$path");
	echo get_stylesheet_directory_uri() . "/$path?ver=$version";
}

// Register a hero item
function eyebeam2018_hero($hero) {
	$GLOBALS['eyebeam2018']['heroes'][] = $hero;
}

// Register a module item
function eyebeam2018_module($module) {
	$GLOBALS['eyebeam2018']['modules'][] = $module;
}

// Render each hero item's template
function eyebeam2018_render_heroes() {
	foreach ($GLOBALS['eyebeam2018']['heroes'] as $hero) {

		// See this curr_hero global? It's important! It's how the
		// page template knows what stuff to show.
		$GLOBALS['eyebeam2018']['curr_hero'] = $hero;

		get_template_part('templates/page-hero', $hero['type']);
	}
}

// Render each module item's template
function eyebeam2018_render_modules() {

	$class = 'module-container';

	// Okay this is weird, but it's necessary for getting the module order
	// right on mobile. Basically, we swap the TOC with the first module.
	if (count($GLOBALS['eyebeam2018']['modules']) > 1 &&
	    $GLOBALS['eyebeam2018']['modules'][0]['type'] == 'toc') {

		$toc = $GLOBALS['eyebeam2018']['modules'][0];
		$module = $GLOBALS['eyebeam2018']['modules'][1];

		$GLOBALS['eyebeam2018']['modules'][0] = $module;
		$GLOBALS['eyebeam2018']['modules'][1] = $toc;

		$class .= ' module-swap-toc';
	}

	echo "<div class=\"$class\">\n";

	foreach ($GLOBALS['eyebeam2018']['modules'] as $module) {

		// See this curr_module global? It's important! It's how the
		// page template knows what stuff to show.
		$GLOBALS['eyebeam2018']['curr_module'] = $module;

		get_template_part('templates/page-module', $module['type']);
	}

	echo "<br class=\"clear\">\n";
	echo "</div>\n";
}

// Returns an array of resident posts for a given year
function eyebeam2018_get_residents($year = null) {

	if (empty($year)) {
		$year = date('Y');
	}
	$year = intval($year);

	$args = array(
		'post_type' => 'resident',
		'posts_per_page' => -1,
		'orderby'=> 'meta_value_num',
		'meta_key' => 'end_year',
		'meta_query' => array(
			'relation' => 'AND',
			'start_clause' => array(
				'key'=> 'start_year',
				'value'=> $year,
				'compare'=> '<='
			),
			'end_clause' => array(
				'key'=> 'end_year',
				'value' => $year,
				'compare'=> '>='
			),
		)
	);

	$posts = get_posts($args);
	return $posts;
}

// AJAX handler for resident requests (by year)
function eyebeam2018_ajax_residents() {
	if (empty($_GET['year'])) {
		die('No year specified');
	}
	$year = $_GET['year'];
	$residents = eyebeam2018_get_residents($year);

	foreach ($residents as $resident) {
		$GLOBALS['eyebeam2018']['curr_collection_item'] = $resident;
		get_template_part('templates/collection-resident-item');
	}
	exit;
}
add_action('wp_ajax_eyebeam2018_residents', 'eyebeam2018_ajax_residents');
add_action('wp_ajax_nopriv_eyebeam2018_residents', 'eyebeam2018_ajax_residents');

function eyebeam2018_video_embed($video_url) {

	// TODO: make this work with more video hosts, currently we only support
	// YouTube. I mean, should we let oembed or shortcodes handle this? It's
	// not like this is the first video to get embedded onto WordPress. for
	// now we just do it the dumb/easy way. (20180303/dphiffer)

	if (preg_match('/youtube\.com\/watch\?v=([^&]+)/', $video_url, $matches)) {
		$id = $matches[1];
		$src = "https://www.youtube.com/embed/$id";
		$dimensions = 'width="640" height="360"';
		$args = 'frameborder="0" allow="autoplay; encrypted-media" allowfullscreen';
		$embed = "<iframe $dimensions src=\"$src\" $args></iframe>";
		$embed = "<div class=\"video-container\">$embed</div>\n";
		echo $embed;
	} else {
		echo "<!-- could not render video embed for $video_url -->\n";
	}
}

// AJAX handler for email subscribers
function eyebeam2018_subscribe() {

	if (! empty($_POST['first_name']) &&
	    ! empty($_POST['last_name']) &&
	    ! empty($_POST['email']) &&
	    preg_match('/\w+@\w+\.\w+/', $_POST['email'])) {
		$first_name = $_POST['first_hame'];
		$last_name = $_POST['last_hame'];
		$email = $_POST['email'];

		// Something something subscribe to email list

		$rsp = array(
			'ok' => 1
		);
	} else {
		$rsp = array(
			'ok' => 0
		);
	}

	$headers = apache_request_headers();
	if (! empty($headers['X-Requested-With']) &&
	    $headers['X-Requested-With'] == 'XMLHttpRequest') {
		header('Content-Type: application/json');
		echo json_encode($rsp);
		exit;
	} else if (! empty($headers['Referer'])) {
		$redirect = $headers['Referer'];
		$result = "subscribed={$rsp['ok']}";
		if (preg_match('/subscribed=[^&]+/', $redirect)) {
			$redirect = preg_replace('/subscribed=[^&]+/', $result, $redirect);
		} else if (strpos($redirect, '?') === false) {
			$redirect .= "?$result";
		} else {
			$redirect .= "&$result";
		}
		$redirect .= '#subscribe';
		header("Location: $redirect");
		exit;
	} else if ($rsp['ok'] == 1) {
		echo "Thanks for subscribing!";
	} else {
		echo "That didn’t work for some reason.";
	}
}
add_action('wp_ajax_eyebeam2018_subscribe', 'eyebeam2018_subscribe');
add_action('wp_ajax_nopriv_eyebeam2018_subscribe', 'eyebeam2018_subscribe');

// This requires that DBUG_PATH is set in wp-config.php.
function dbug() {
	if (empty($GLOBALS['dbug_fh'])) {
		if (! defined('DBUG_PATH')) {
			return;
		}
		$fh = fopen(DBUG_PATH, "a");
		$GLOBALS['dbug_fh'] = $fh;
		$GLOBALS['dbug_start'] = microtime(true);
		fwrite($fh, "----------------------\n");
	}
	$fh = $GLOBALS['dbug_fh'];
	$sec = microtime(true) - $GLOBALS['dbug_start'];
	$sec = number_format($sec, 2);
	$sec = ($sec < 10) ? "0$sec" : $sec;
	$args = func_get_args();
	foreach ($args as $arg) {
		if (! is_scalar($arg)) {
			$arg = print_r($arg, true);
			$arg = trim($arg);
		}
		fwrite($fh, "[$sec] $arg\n");
	}
}
