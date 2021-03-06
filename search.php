<?php get_header(); ?>
			
			<div id="content">

				<div id="inner-content" class="row clearfix">
			
					<div id="main" class="large-8 medium-8 columns first clearfix" role="main">
						<h1 class="archive-title"><span><?php _e('Search Results for:', 'jointstheme'); ?></span> <?php echo esc_attr(get_search_query()); ?></h1>

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
							<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
						
								<header class="article-header">

									<h3 class="search-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
                  <p class="byline vcard"><?php
                    printf(__('Posted <time class="updated" datetime="%1$s" pubdate>%2$s</time> by <span class="author">%3$s</span> <span class="amp">&</span> filed under %4$s.', 'jointstheme'), get_the_time('Y-m-j'), get_the_time(__('F jS, Y', 'jointstheme')), joints_get_the_author_posts_link(), get_the_category_list(', '));
                  ?></p>
						
								</header> <!-- end article header -->
					
								<section class="entry-content">
								    <?php the_excerpt('<span class="read-more">' . __('Read more &raquo;', 'jointstheme') . '</span>'); ?>
					
								</section> <!-- end article section -->
						
								<footer class="article-footer">
							
								</footer> <!-- end article footer -->
					
							</article> <!-- end article -->
					
						<?php endwhile; ?>	
					
						    <?php if (function_exists('joints_page_navi')) { ?>
						        <?php joints_page_navi(); ?>
						    <?php } else { ?>
						        <nav class="wp-prev-next">
						            <ul class="clearfix">
						    	        <li class="prev-link"><?php next_posts_link(__('&laquo; Older Entries', "jointstheme")) ?></li>
						    	        <li class="next-link"><?php previous_posts_link(__('Newer Entries &raquo;', "jointstheme")) ?></li>
						            </ul>
						        </nav>
						    <?php } ?>		
					
					    <?php else : ?>
					
    					    <article id="post-not-found" class="hentry clearfix">
    					    	<header class="article-header">
    					    		<p><?php _e("Sorry, No Results.", "jointstheme"); ?></p>
    					    	</header>
    					    	<section class="entry-content">
    					    		<p><?php _e("Try your search again.", "jointstheme"); ?></p>
    					    	</section>
    					    </article>
					
					    <?php endif; ?>
			
				    </div> <!-- end #main -->
    			
    			    <?php get_sidebar(); ?>
    			
    			</div> <!-- end #inner-content -->
    
			</div> <!-- end #content -->

<?php get_footer(); ?>