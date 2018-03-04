<?php

$content = get_the_content();

// This is so that we can pull out the intro text (everything up until the
// first <hr>). (20180303/dphiffer)
add_filter('the_content', 'eyebeam2018_extract_intro');

$content = apply_filters('the_content', $content);
$GLOBALS['eyebeam2018']['post_content'] = $content;

echo "<div class=\"post\">\n";

get_template_part('templates/post-intro');
get_template_part('templates/post-meta');
get_template_part('templates/post-content');

echo "</div>\n";