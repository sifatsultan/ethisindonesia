<?php
/**
 * The footer of the theme
 */
?>

		</div>

		<?php krown_sidebar(); ?>
	
		<!-- Inner Wrapper End -->
		</div>

	<!-- Main Wrapper End -->
	</div>

	<!-- Footer #1 Wrapper Start -->

	<?php if(get_option('rb_o_ftrtype', 'full') == 'full') : ?>

	<footer id="footer1" class="footer clearfix">

		<div class="krown-column-row wrapper clearfix">

			<?php if( get_option( 'rb_o_ftrareas', 'four' ) == 'four' ) : ?>

				<div class="krown-column-container span3">
					<?php if ( is_active_sidebar( 'krown_footer_widget_1' ) )
						dynamic_sidebar( 'krown_footer_widget_1' ); ?>
				</div>

				<div class="krown-column-container span3 clearfix">
					<?php if ( is_active_sidebar( 'krown_footer_widget_2' ) )
						dynamic_sidebar( 'krown_footer_widget_2' ); ?>
				</div>

				<div class="krown-column-container span3 clearfix">
					<?php if ( is_active_sidebar( 'krown_footer_widget_3' ) )
						dynamic_sidebar( 'krown_footer_widget_3' ); ?>
				</div>

				<div class="krown-column-container span3">
					<?php if ( is_active_sidebar( 'krown_footer_widget_4' ) )
						dynamic_sidebar( 'krown_footer_widget_4' ); ?>
				</div>

			<?php elseif ( get_option( 'rb_o_ftrareas' ) == 'three' ) : ?>

				<div class="krown-column-container span4">
					<?php if ( is_active_sidebar('krown_footer_widget_1' ) )
						dynamic_sidebar( 'krown_footer_widget_1' ); ?>
				</div>

				<div class="krown-column-container span4 clearfix">
					<?php if ( is_active_sidebar( 'krown_footer_widget_2' ) )
						dynamic_sidebar( 'krown_footer_widget_2' ); ?>
				</div>

				<div class="krown-column-container span4">
					<?php if ( is_active_sidebar( 'krown_footer_widget_3' ) )
						dynamic_sidebar( 'krown_footer_widget_3' ); ?>
				</div>

			<?php elseif ( get_option( 'rb_o_ftrareas' ) == 'two' ) : ?>

				<div class="krown-column-container span6">
					<?php if ( is_active_sidebar( 'krown_footer_widget_1' ) )
						dynamic_sidebar( 'krown_footer_widget_1' ); ?>
				</div>

				<div class="krown-column-container span6">
					<?php if ( is_active_sidebar( 'krown_footer_widget_2' ) )
						dynamic_sidebar( 'krown_footer_widget_2' ); ?>
				</div>

			<?php elseif ( get_option( 'rb_o_ftrareas' ) == 'one' ) : ?>

				<div class="krown-column-container span12">
					<?php if ( is_active_sidebar( 'krown_footer_widget_1' ) )
						dynamic_sidebar( 'krown_footer_widget_1' ); ?>
				</div>

			<?php endif; ?>

		</div>

    </footer>

    <?php endif; ?>

	<!-- Footer #1 Wrapper End -->

	<!-- Footer #2 Wrapper Start -->

	<footer id="footer2" class="footer clearfix">

		<div class="wrapper clearfix">

			<div class="left clearfix">
				<?php if ( is_active_sidebar( 'krown_footer_widget_5' ) )
					dynamic_sidebar( 'krown_footer_widget_5' ); ?>
			</div>

			<div class="right clearfix">
				<?php if ( is_active_sidebar('krown_footer_widget_6' ) )
					dynamic_sidebar( 'krown_footer_widget_6' ); ?>
			</div>

		</div>

    </footer>
	<!-- Footer End -->

	<!-- GTT Button -->
	<a id="top" href="#"></a> 

	<!-- IE7 Message Start -->
	<div id="oldie">
		<p><?php _e('This is a unique website which will require a more modern browser to work!', 'krown'); ?><br /><br />
		<a href="https://www.google.com/chrome/" target="_blank"><?php _e('Please upgrade today!', 'krown'); ?></a>
		</p>
	</div>
	<!-- IE7 Message End -->

	<?php wp_footer(); ?>

<!-- Calendly badge widget begin -->
<link href="https://calendly.com/assets/external/widget.css" rel="stylesheet">
<script src="https://calendly.com/assets/external/widget.js" type="text/javascript"></script>
<script type="text/javascript">Calendly.initBadgeWidget({url: 'https://calendly.com/ethisinvestors', text: 'Schedule a Call', color: '#03A678', branding: false});</script>
<!-- Calendly badge widget end -->

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-90754758-1', 'auto');
  ga('send', 'pageview');

</script>​
</body>
</html>