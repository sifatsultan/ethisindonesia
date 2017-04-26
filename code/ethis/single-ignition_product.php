<?php
/**
 * The Template for displaying all single projects.
 */
get_header(); ?>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.modal.js" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/jquery.modal.css" type="text/css" media="screen" />


	<?php while ( have_posts() ) : the_post(); 

		$project_id = get_post_meta( $post->ID, 'ign_project_id', true );
		$author = get_user_by( 'id', $post->post_author );
		$updates = html_entity_decode( stripslashes( apply_filters( 'idcf_updates_text', get_post_meta( $post->ID, 'ign_updates', true ) ) ) );
		$faqs = html_entity_decode( stripslashes( get_post_meta( $post->ID, 'ign_faqs', true ) ) );
		$video = get_post_meta( $post->ID, 'ign_product_video', true );
		$pro_images = get_post_meta( $post->ID, 'project_images', true );
		$pro_loc = get_post_meta( $post->ID, 'project_location', true );
		$pro_name = get_post_meta( $post->ID, 'project_name', true );

		$img_1 = has_post_thumbnail( $post->ID ) ? wp_get_attachment_url( get_post_thumbnail_id(), 'full' ) : get_post_meta( $post->ID, 'ign_product_image1', true );
		$gallery = array(
			$img_1,
			get_post_meta( $post->ID, 'ign_product_image2', true ),
			get_post_meta( $post->ID, 'ign_product_image3', true ),
			get_post_meta( $post->ID, 'ign_product_image4', true )
		);
		$project_long_desc = get_post_meta( $post->ID, 'ign_project_long_description', true );

		$retina = krown_retina();

	?>

		<div id="project-container" class="krown-tabs responsive-on clearfix">

			<ul class="titles clearfix">
				<li><h5><?php _e( 'Overview', 'krown' ); ?></h5></li>
				<?php if ( $faqs != '' ) : ?><li><h5><?php _e( 'Project Description', 'krown' ); ?></h5></li><?php endif; ?>
				<?php if ( $pro_loc != '' ) : ?><li><h5><?php _e( 'Location', 'krown' ); ?></h5></li><?php endif; ?>
				<?php if ( $pro_images != '' ) : ?><li><h5><?php _e( 'Images', 'krown' ); ?></h5></li><?php endif; ?>
				<?php if ( $updates != '' ) : ?><li><h5><?php _e( 'Updates', 'krown' ); ?></h5></li><?php endif; ?>
				<?php if ( comments_open() && ot_get_option( 'krown_allow_id_comments', 'true' ) == 'true' ) : ?><li><h5><?php _e( 'Comments', 'krown' ); ?></h5></li><?php endif; ?>
				<?php if ( ot_get_option( 'krown_allow_id_backers', 'false' ) == 'true'  || ot_get_option( 'krown_allow_id_backers', 'false' ) == 'trueidc' ) : ?><li><h5><?php _e( 'Backers', 'krown' ); ?></h5></li><?php endif; ?>
			</ul>

			<div class="contents clearfix">

				<div id="description">

					<div class="project-header">

						<?php if ( $video != '' ) : ?>

							<div class="video-container">
								<?php if ( strpos( $video, 'iframe' ) > -1 ) {
									echo html_entity_decode( stripslashes( $video ) );
								} else {
									echo $wp_embed->run_shortcode( '[embed width="845" height="474"]' . $video . '[/embed]' );
								}  ?>
							</div>

						<?php else : ?>

							<div class="flexslider mini">
								<ul class="slides">

								<?php foreach ( $gallery as $slide ) {

									if ( $slide != '' ) {

										$img = aq_resize( $slide, $retina === 'true' ? 1690 : 845, null, false, false );   
										echo '<li class="slide"><img src="' . $img[0]. '" width="' . $img[1] . '" height="' . $img[2] . '" alt="" /></li>';

									}

								} ?>

								</ul>
							</div>

						<?php endif; ?>

					</div>

					<div class="project-content">

						<!--<?php krown_share_buttons( $post->ID ); ?>-->

						<?php

							echo do_action( 'id_content_before', $project_id );
							do_action( 'id_before_content_description', $project_id, $post->ID );

							the_content();

							if ( function_exists( 'idstretch_install' ) ) {
								echo do_shortcode( '[project_stretch_goals product="' . $project_id . '"]' ); 
							}

							echo do_action( 'id_content_after', $project_id );

						?>

					</div>

				</div>

				<?php if ( $faqs != '' ) : ?>
					
					<div id="faqs" class="project-content">

					<?php if ( is_user_logged_in() ) { ?>

						<?php 

							echo do_shortcode( $faqs );				
							do_action( 'id_faqs', array( 'product' => $project_id ) );

						?>

						<?php
							} else {
							    echo '<p>Please <a href="/my-account/">login</a> to view the contents.</p>';
							}
						?>


					</div>

				<?php endif; ?>
				
				<?php if ( $pro_loc != '' ) : ?>

					<div id="pro_loc" class="project-content">

					<?php if ( is_user_logged_in() ) { ?>

						<?php if(get_field('project_location')) { 
							echo '<p>' . get_field('project_location') . '</p>'; 
						} ?>

						<?php
							} else {
							    echo '<p>Please <a href="/my-account/">login</a> to view the contents.</p>';
							}
						?>

					</div>

				<?php endif; ?>			

				<?php if ( $pro_images != '' ) : ?>

					<div id="pro_images" class="project-content">

					<?php if ( is_user_logged_in() ) { ?>

						<?php if(get_field('project_images')) { 
							echo '<p>' . get_field('project_images') . '</p>'; 
						} ?>

						<?php
							} else {
							    echo '<p>Please <a href="/my-account/">login</a> to view the contents.</p>';
							}
						?>

					</div>

				<?php endif; ?>				
				<?php if ( $updates != '' ) : ?>

					<div id="updates" class="project-content">
				
						<?php if ( is_user_logged_in() ) { ?>

						    <?php 
							    echo do_shortcode( $updates );
								do_action( 'id_updates', array( 'product' => $project_id ) ); 
							?>

						<?php
							} else {
							    echo '<p>Please <a href="/my-account/">login</a> to view the contents.</p>';
							}
						?>

				</div>

				<?php endif; ?>


				<?php if ( comments_open() && ot_get_option( 'krown_allow_id_comments', 'true' ) == 'true' ) : ?>

					<div id="comments" class="project-content">
						<?php comments_template(); ?>
					</div>

				<?php endif; ?>

				<?php if ( ot_get_option( 'krown_allow_id_backers', 'false' ) == 'true' || ot_get_option( 'krown_allow_id_backers', 'false' ) == 'trueidc' ) : ?>

					<div id="backers" class="project-content">

						<?php if ( ot_get_option( 'krown_allow_id_backers' ) == 'trueidc' ) : 

							mdid_backers_list( $project_id );

						else :

							$project = new ID_Project( $project_id );
							$post_id = $project->get_project_postid();
							$the_project = $project->the_project();
							$project_orders = ID_Order::get_orders_by_project( $project_id );

							echo '<h3 id="comments_title">' . __( 'Backers', 'krown' ) . ' (' . sizeof( $project_orders ) . ')' . '</h3>';

							if ( ! empty( $project_orders ) ) : ?>

								<ol id="comments-list">

								<?php foreach( array_reverse( $project_orders ) as $order ) : ?>

									<li class="comment clearfix">

										<div class="comment-avatar"><?php echo get_avatar( $order->email, ( isset( $retina ) && $retina === 'true' ? 130 : 65 ), $default='' ); ?></div>

										<div class="comment-content">

											<div class="comment-meta clearfix">

												<h6 class="comment-title"><?php echo $order->first_name . ' ' . $order->last_name; ?>&nbsp;</h6>
												<span class="comment-date"><?php echo krown_id_ago( strtotime( $order->created_at ) ); ?></span>

											</div>

											<strong class="comment-price"><?php echo apply_filters( 'id_display_currency', apply_filters( 'id_price_format', $order->prod_price, $order->id ), $order->id ); ?></strong>

										</div>

									</li>

								<?php endforeach; ?>

								</ol>

							<?php else : ?>

								<p class="post-excerpt"><?php _e( 'Nobody has backed this project yet. Be the first one!', 'krown' ); ?></p>

							<?php endif; ?>

						<?php endif; ?>

					</div>

				<?php endif; ?>

			</div>

			<aside id="project-sidebar">

				<!--<div class="rtitle"><p><?php _e( 'Back this Project', 'krown' ); ?></p></div>-->
				
				<?php 

					if ( function_exists( 'id_projectPageWidget' ) ) {
						echo id_projectPageWidget( array( 'product' => $project_id ) ); 
				} ?>

				<?php if( get_field('invest_popup') ): ?>
				<?php { ?>
				
				<!-- Modal HTML -->
				<div id="investpop" style="display:none;">
				
				<!-- Gravity Form -->
				
				<?php echo do_shortcode('[gravityform id="1" title="true" description="true" ajax="true"]'); ?>
				
				<!--<p><em>Prefer to talk to a Human?</em> <a href="/schedule-call/">Schedule a Call</a></p>-->
				
				</div>

				<!-- Link to open the modal -->
				<!--<p><a href="#ex1" rel="modal:open">Open Modal</a></p>-->
				<div id="invest-other">
				<p>Invest other amounts. Click to submit your interest.</p>
				</div>
				<div class="btn-container2">
					<a href="#investpop" rel="modal:open" class="main-btn krown-button medium color">Investment Application</a>
				</div>

				<?php } ?>
				<?php endif; ?>
			</aside>
		</div>
	<?php endwhile; ?>

<?php get_footer(); ?>