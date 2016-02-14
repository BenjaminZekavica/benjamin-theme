<?php get_header(); ?>    
    <article>
    	<div class="container">
        	<div class="row">
            	<div class="col-md-8"> 
                	<div class="content-seite">
				           <article>
                          	 <?php if (have_posts()) : ?>
                                 <p class="info">Deine Suchergebnisse f&uuml;r <strong><?php echo $s ?></strong></p>
                         
                                 <?php while (have_posts()) : the_post(); ?>
                                    <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                                    <div class="entry">
                                       <?php the_content(); ?>
                                    </div>
                                 <?php endwhile; ?>
                         
                                 <p align="center"><?php next_posts_link('&laquo; &Auml;ltere Eintr&auml;ge') ?> | <?php previous_posts_link('Neuere Eintr&auml;ge &raquo;') ?></p>
                         
                              <?php else : ?>
                                 <h2>Leider nichts gefunden</h2>
                         
                              <?php endif; ?> 
                           </article>
                    </div>
                </div>
                <div class="col-md-4">
                	<div class="sidebar">
                          <aside>
                             <?php get_sidebar(); ?>
                          </aside>
                    </div>
                </div>
            </div>
        </div>
    </article>
  <?php get_footer(); ?>