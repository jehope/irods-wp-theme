<div class="large-12 columns show-for-medium-up">
	<div class="sticky">
		<nav class="top-bar" data-topbar>
		<?php get_search_form(); ?>

			<ul class="title-area">
				<!-- Title Area -->
				<li class="name">
					 <a href="<?php echo home_url(); ?>" rel="nofollow">
					 	<img alt="<?php bloginfo('name'); ?>" src="<?php echo get_template_directory_uri(); ?>/library/images/irods-upper-logo.png" />
					 </a>
				</li>
				<li class="toggle-topbar menu-icon">
					<a href="#"><span>Menu</span></a>
				</li>
			</ul>		
			<section class="top-bar-section">
				<?php joints_main_nav(); ?>
			</section>
		</nav>
	</div>
</div>