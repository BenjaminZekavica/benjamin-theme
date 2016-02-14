<?php get_header(); ?>    
    <article>
    	<div class="container">
        	<div class="row">
            	<div class="col-md-8"> 
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
                            	  <div class="titel-art">
                                    <h2><?php the_title(); ?></h2>
                                  </div>
                                 <p class="postmetadata">
                                    <i class="fa fa-user autor"></i><strong> Autor : </strong><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_the_author_link(); ?></a>
                                    <strong> | </strong>
                                       <i class="fa fa-calendar date"></i></i> <strong>Datum :</strong> <?php  echo the_time('j.F.Y'); ?> 
                                    <strong> | </strong>
                                       <i class="fa fa-th-list"></i>  <strong>Kategorie :</strong> <?php the_category(', ') ?>
                                </p>
                                 <div class="entry">
                                    <?php the_content(); ?>
                                 </div>
                                 <div class="autorenbox">
                                 	<h3><strong>Dieser Autor hat diesen Beitrag verfasst:</strong></h3><br>
                                 	<?php echo get_avatar(get_the_author_meta('ID'), 
										 $size = 80,
										 $default = '', 
										 $alt = 'Dies ist nur ein Gravatar'); ?>
										<strong><h4><?php the_author(); ?></h4></strong>
										<p><?php the_author_meta('description'); ?></p><br>
                                        <h4><p>Hier gibt es weitere Beiträge des Autors:</p></h4>
                                        <br> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><button type="button" class="btn btn-default">Weitere Artikel durchlesen.</button></a>
                                 </div>
                                    <div class="kommentare">
                                            <div class="kommentar-bereich">
                                            	  <?php comments_template(); ?>
                                            </div>
                                    </div>
                              <?php endwhile; endif; ?>
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