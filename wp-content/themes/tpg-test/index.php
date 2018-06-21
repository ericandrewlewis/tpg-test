<?php get_header(); ?>
<section class="listq-banner listq-set-pd-sm">
	<div class="container text-center">
		<h3>Posts</h3>
	</div>
</section>
<section class="recent-place recent-place-v1 listq-set-bg listq-set-pd-sm">
	<div class="container">
		<ul class="row set-width-responsive">
			<?php while ( have_posts() ): the_post(); ?>
			<li class="col-md-3 col-sm-6">
				<div class="box">
					<div class="content text-center">
						<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
					</div>
				</div>
			</li>
			<?php endwhile; ?>
		</ul>
	</div>
</section>
<?php get_footer();
