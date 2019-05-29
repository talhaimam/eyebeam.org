<div class="module-container">
<ul>
<li id="module-auction" class="module module-one_third">
	<?php

	$auction_query = new WP_Query(array(
		'post_type' => 'page',
		'posts_per_page' => 1,
		'name' => 'auction'
	));

	$auction_query->the_post();

	?>
	<div class="item-container">
		<h2 class="module-title one_half eyebeam-sans auction-title">
			<a href="<?php the_permalink($post); ?>"><?php the_title(); ?></a>
		</h2>
		<div class="auction-description">
			<?php the_content(); ?>
		</div>
	</div>
	<?php wp_reset_postdata(); ?>
</li>
<li class="module module-two_thirds">
	<?php

	while (have_posts()) {
		the_post();
		get_template_part('templates/auction-artwork');
	}

	?>
</li>
</ul>
</div>
