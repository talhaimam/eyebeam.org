<?php

echo "<div class=\"module module-toc module-one_third\">\n";
echo "<ul>\n";

foreach ($GLOBALS['eyebeam2018']['modules'] as $module) {
	extract($module);
	if ($type == 'toc' || $toc_status == 'hide') {
		continue;
	}
	if (! empty($toc_title)) {
		$title = $toc_title;
		$hash = sanitize_title($title);
	}
	echo "<li><a href=\"#$hash\">$title</a></li>\n";
}

echo "</ul>\n";
echo "</div>\n";
