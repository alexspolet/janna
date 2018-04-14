<?php

/*
 Template Name: New Layout
 */

get_header();

if ( have_posts() ):
	while ( have_posts() ): the_post();
		?>
        <p>hui</p>
		<article class="post page">
			<h1><?php the_title(); ?></h1>
            <div class="info-box">
                <h4>Disclimer Title</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad animi ducimus et explicabo magnam nemo, nobis obcaecati odio optio provident quam suscipit veniam. Beatae ex hic magni officia sapiente velit?</p>
            </div>
			<?php the_content(); ?>
		</article>
	<?php
	endwhile;
else:
	?>
	<h2>No posts found</h2>
<?php
endif;

get_footer();

?>