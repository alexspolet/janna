<?php

get_header();

if ( have_posts() ):
	while ( have_posts() ): the_post();
?>

	<article class="post">
        <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
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