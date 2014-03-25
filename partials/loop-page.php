<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
						

	<header class="article-header">
		<?php 
			if(!is_front_page()){
				echo '<h1 class="page-title">';
			the_title();
				echo '</h1>';
			}
		 ?>
	</header> <!-- end article header -->
					
    <section class="entry-content clearfix" itemprop="articleBody">
	    <?php the_content('<button type="button">Read More</button>'); ?>
	    <?php wp_link_pages(); ?>
	</section> <!-- end article section -->
						
	<footer class="article-footer">
		<p class="clearfix"><?php the_tags('<span class="tags">' . __('Tags:', 'jointstheme') . '</span> ', ', ', ''); ?></p>
	</footer> <!-- end article footer -->
						    
	<?php comments_template(); ?>
					
</article> <!-- end article -->
