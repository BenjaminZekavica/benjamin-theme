<?php get_header(); ?>    
    <article>
    	<div class="container">
        	<div class="row">
            	<div class="col-md-12"> 
                	<div class="content-seite">
				           <article>
                            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                                    <div class="bild-arti"> 
                                    <?php
                                        if ( has_post_thumbnail() ) { 
                                          the_post_thumbnail();
                                        } 
                                        ?> 
                                    </div>
                            	<div class="titel-contact">
                                    <h2>Portfolio</h2>
                                 </div>
                                 <div class="portfolio">
                                 	<p><?php echo the_content(); ?></p>
                                 </div>	
                              <?php endwhile; endif; ?>
                           </article>
                    </div>
                </div>
            </div>
        </div>
    </article>
  <?php get_footer(); ?>