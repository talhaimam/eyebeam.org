UPDATE wp_options SET option_value = replace(option_value, 'eyebeam.org', 'eyebeam.local') WHERE option_name = 'home' OR option_name = 'siteurl';UPDATE wp_posts SET guid = replace(guid, 'eyebeam.org','eyebeam.local');UPDATE wp_posts SET post_content = replace(post_content, 'eyebeam.org', 'eyebeam.local');

UPDATE wp_postmeta SET meta_value = replace(meta_value,'eyebeam.org','eyebeam.local');
