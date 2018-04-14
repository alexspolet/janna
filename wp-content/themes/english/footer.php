<footer class="site-footer">

    <nav class="site-nav">
		<?php $args = [
			'theme_location' => 'footer'
		] ?>

		<?php wp_nav_menu( $args ); ?>
    </nav>

    <p><?php bloginfo('name'); ?> - &copy; <?php echo date('Y'); ?></p>
</footer>
</div><!--end div.container-->
<?php wp_footer(); ?>
</body>
</html>