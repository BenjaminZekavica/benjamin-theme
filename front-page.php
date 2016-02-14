<?php ?>
<?php get_header(); ?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="startseite-seite content-seite">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<section class="main">
							<article class="post" id="post-<?php the_ID(); ?>">
								<section class="post-content">
        							<div class="slider">
											<section class="example">
                                                <article class="content">
                                                   <p><?php echo the_content(); ?></p>
                                                </article>
                                            </section>
									    </div>
                                    </section>
					<?php endwhile; else: ?>
					<p><?php _e('Diese Seite gibt es nicht :('); ?></p>
					<?php endif; ?>
				</div> 
			</div>
		</div>
	</div>
<?php get_footer(); ?>
