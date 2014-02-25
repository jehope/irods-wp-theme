			<footer class="footer" role="contentinfo">
			
				<div id="inner-footer" class="row clearfix">
				
					<div class="large-12 medium-12 columns">
						<!--<nav role="navigation">
    						<?php //joints_footer_links(); ?>
    					</nav>-->
						<?php if ( is_active_sidebar( 'footer1' ) ) : ?>
							<?php dynamic_sidebar( 'footer1' ); ?>
						<?php endif; ?>
						<?php if ( is_active_sidebar( 'footer2' ) ) : ?>
							<?php dynamic_sidebar( 'footer2' ); ?>
						<?php endif; ?>
						<?php if ( is_active_sidebar( 'footer3' ) ) : ?>
							<?php dynamic_sidebar( 'footer3' ); ?>
						<?php endif; ?>
						<?php if ( is_active_sidebar( 'footer4' ) ) : ?>
							<?php dynamic_sidebar( 'footer4' ); ?>
						<?php endif; ?>
    				</div>
	               				
				</div> <!-- end #inner-footer -->
				
			</footer> <!-- end footer -->
		
		</div> <!-- end #container -->
		</div>
		</div>
				
		<!-- all js scripts are loaded in library/joints.php -->
		<?php wp_footer(); ?>

	</body>

</html> <!-- end page -->
