<?php get_header(); ?>    
    <article>
    	<div class="container">
        	<div class="row">
            	<div class="col-md-8"> 
                	<div class="content-seite">
                     <h2><?php wp_title(); ?></h2>  
				           <article>                
                                <?php 
                                $temp = $wp_query; $wp_query= null;
                                $wp_query = new WP_Query(); $wp_query->query('showposts=' . '&paged='.$paged);
                                while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
                           		<br>
                              <?php if ( has_post_thumbnail() ) : ?>
                                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                <?php the_post_thumbnail(); ?>
                             <br>
                              <h2><a href="<?php the_permalink(); ?>" title="Weiterlesen"><?php the_title(); ?></a></h2>
                             <p class="postmetadata">
                                <i class="fa fa-user autor"></i><strong> Autor : </strong><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_the_author_link(); ?></a>
                                <strong> | </strong>
                                   <i class="fa fa-calendar date"></i></i> <strong>Datum :</strong> <?php  echo the_time('j. F. Y'); ?> 
                                   <strong> | </strong>
                                       <i class="fa fa-th-list"></i>  <strong>Kategorie :</strong> <?php the_category(', ') ?>
                                </p>
                                </a>                            
                            <?php endif; ?>
                                <?php the_excerpt(); ?>
                             <br>
                             <div class="weiterlesen"><a href="<?php the_permalink();?>"><button type="button" class="btn btn-primary"><i class="fa fa-hand-pointer-o"></i> weiterlesen</button></a></div>
                       		 <hr>
                                <?php endwhile; ?>
								<nav><ul class="pagination pagination-lg">
                                	<?php navi(); ?>
                                </ul></nav>
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