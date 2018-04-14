<?php

get_header();

if ( have_posts() ):
	while ( have_posts() ): the_post();
		?>

		<article class="post page">
            <!--column-container-->
            <div class="column-container clearfix">
                <!--title-column-->
                <h1 class="title-column">
	                <?php the_title(); ?>
                </h1><!--end h1.title-column-->

                <!--text-column-->
                <div class="text-column">
	                <?php the_content(); ?>
                </div><!--end div.text-column-->

            </div><!--end div.column-container-->
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