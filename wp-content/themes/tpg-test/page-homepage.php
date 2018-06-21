<?php get_header(); ?>
<section class="listq-banner listq-set-pd-sm">
	<div class="container text-center">
		<h3>Featured Listings</h3>
	</div>
</section>
<section class="recent-place recent-place-v1 listq-set-bg listq-set-pd-sm">
	<div class="container">
		<ul class="row set-width-responsive">
			<?php $query = z_get_zone_query( 'featured-listings' ); ?>
			<?php while ( $query->have_posts() ):		$query->the_post(); ?>
			<li class="col-md-3 col-sm-6">
				<div class="box">
					<div class="listq-image-fullwidth">
						<?php the_post_thumbnail('listing-thumbnail'); ?>
					</div>
					<div class="content text-center">
						<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
						<p><span class="fa fa-map-marker"></span><?php echo get_post_meta( get_the_ID(), 'contact_information_address', true); ?></p>
						<p><span class="fa fa-phone"></span>Phone: 
							<a 
							href="tel:<?php echo get_post_meta( get_the_ID(), 'contact_information_phone', true); ?>"
							>
								<?php echo get_post_meta( get_the_ID(), 'contact_information_phone', true); ?>
							</a>
						</p>
					</div>
				</div>
			</li>
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
		</ul>
	</div>
</section>
<section class="recent-place recent-place-v1 listq-set-bg listq-set-pd-sm">
	<div class="container">
		<div class="listq-title text-center">
			<h3>All Listings</h3>
		</div>
		<ul class="row set-width-responsive">
			<?php $listings_query = new WP_Query( array('post_type' => 'listing', 'posts_per_page' => 6) ); ?>
			<?php while ( $listings_query->have_posts() ): $listings_query->the_post(); ?>
			<li class="col-md-3 col-sm-6">
				<div class="box">
					<div class="listq-image-fullwidth">
						<?php the_post_thumbnail('listing-thumbnail'); ?>
					</div>
					<div class="content text-center">
						<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
						<p><span class="fa fa-map-marker"></span><?php echo get_post_meta( get_the_ID(), 'contact_information_address', true); ?></p>
						<p><span class="fa fa-phone"></span>Phone: 
							<a 
							href="tel:<?php echo get_post_meta( get_the_ID(), 'contact_information_phone', true); ?>"
							>
								<?php echo get_post_meta( get_the_ID(), 'contact_information_phone', true); ?>
							</a>
						</p>
					</div>
				</div>
			</li>
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
		</ul>
		<ul class="listq-pagination text-center">
			<li class="active"><a href="<?php echo get_post_type_archive_link('listing') ?>">1</a></li>
			<?php $pages = min( $listings_query->found_posts / $listings_query->query['posts_per_page'], 3); ?>
			<?php for ($i = 2; $i <= $pages; $i++) : ?>
			<li><a href="<?php echo get_post_type_archive_link('listing') ?><?php echo $i ?>"><?php echo $i; ?></a></li>
			<?php endfor; ?>
			<li><a href="<?php echo get_post_type_archive_link('listing') ?>2" class="btn-arrow next">Next</a></li>
		</ul>
	</div>
</section>
<?php get_footer();
