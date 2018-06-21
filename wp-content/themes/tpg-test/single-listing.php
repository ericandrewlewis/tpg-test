<?php get_header(); ?>
<!-- BEGIN RECENT PLACE -->
<section class="listq-banner listq-set-pd-sm">
	<div class="container text-center">
		<h3>LISTING DETAIL</h3>
	</div>
</section>
<!-- END BANNER -->
<!-- BEGIN LISTING DETAIL -->
<?php while ( have_posts() ): the_post(); ?>
<section class="listing-detail listq-set-bg listq-set-pd-sm">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-sm-12 col-xs-12">
				<div class="content-listing">
					<div class="box">
						<h3>contact</h3>
						<div class="box-contact">
							<ul class="contact-info">
								<li><p><i>Address:</i> <span><?php echo get_post_meta( get_the_ID(), 'contact_information_address', true); ?></span></p></li>
								<li><p><i>Phone:</i> <a href="tel:+44020331020000"><?php echo get_post_meta( get_the_ID(), 'contact_information_phone', true); ?></a></p></li>
								<li><p><i>Email:</i> <a href="mailto:<?php echo get_post_meta( get_the_ID(), 'contact_information_email', true); ?>"><?php echo get_post_meta( get_the_ID(), 'contact_information_email', true); ?></a></p></li>
								<li><p><i>Website:</i> <a href="<?php echo get_post_meta( get_the_ID(), 'contact_information_website', true); ?>"><?php echo get_post_meta( get_the_ID(), 'contact_information_website', true); ?></a></p></li>
							</ul>
						</div>
					</div>
					<div class="box">
						<h3>description</h3>
						<div class="box-description">
							<?php the_content(); ?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-12 col-xs-12">
				<div class="listq-sidebar">
					<div class="box-sidebar">
						<h3>Type</h3>
						<div class="box-tags">
							<ul class="tags">
								<?php echo get_the_term_list( get_the_ID(), 'listing-type', '<li>', '</li><li>', '</li>' ); ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php endwhile; ?>
<?php get_footer();
