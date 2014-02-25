
<div class="row">
  <div class="small-12 large-centered columns">
	<ul class="example-orbit" data-orbit  data-options="animation:slide;
                  timer_speed:2000;
                  pause_on_hover:true;
                  animation_speed:500;
                  navigation_arrows:true;
                  bullets:false;">
	  <li>
	    <img src="http://foundation.zurb.com/docs/assets/img/examples/satelite-orbit.jpg" alt="slide 1" />
	    <div class="orbit-caption">
	      Caption One.
	    </div>
	  </li>
	  <li>
	    <img src="http://foundation.zurb.com/docs/assets/img/examples/andromeda-orbit.jpg" alt="slide 2" />
	    <div class="orbit-caption">
	      Caption Two.
	    </div>
	  </li>
	  <li>
	    <img src="http://foundation.zurb.com/docs/assets/img/examples/launch-orbit.jpg" alt="slide 3" />
	    <div class="orbit-caption">
	      Caption Three.
	    </div>
	  </li>
	</ul>
  </div>
</div>


<div id="splash">
		<?php if ( is_active_sidebar( 'splash' ) ) : ?>
			<?php dynamic_sidebar( 'splash' ); ?>
		<?php endif; ?>
</div>
