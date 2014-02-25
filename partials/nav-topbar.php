<div class="large-12 columns show-for-medium-up">
	<div class="contain-to-grid sticky">
		<nav class="top-bar" data-topbar>
		<?php get_search_form(); ?>

			<ul class="title-area">
				<!-- Title Area -->
				<li class="name">
					 <a href="<?php echo home_url(); ?>" rel="nofollow">
					 		<img src="wp-content/themes/irods-wp-theme/library/images/irods-upper-logo.png" />
					 </a>
					<!--<h2> <a href="<?php echo home_url(); ?>" rel="nofollow"><?php bloginfo('name'); ?></a></h2>-->
				</li>
				<li class="toggle-topbar menu-icon">
					<a href="#"><span>Menu</span></a>
				</li>
			</ul>		
			<section class="top-bar-section">
				<ul style="float: left;">
					<li>
						<a href="" ><span class="wiki-span">WIKI</span></a>
					</li>
				</ul>
				<?php joints_main_nav(); ?>
			</section>
		</nav>
	</div>
</div>