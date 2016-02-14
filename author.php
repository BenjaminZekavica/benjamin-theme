<?php get_header(); ?>    
    <article>
    	<div class="container">
        	<div class="row">
            	<div class="col-md-8"> 
                	<div class="content-seite">
				           <article>   
                           		<h2>Autor : <?php the_author(); ?></h2><br>
                           <?php
						if(isset($_GET['author_name'])) :
						$curauth = get_userdatabylogin($author_name);
						else :
						$curauth = get_userdata(intval($author));
						endif;
						?>
						<!– The Loop –>
						<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<div class="beitragsbild">
                                 <?php
                                        if ( has_post_thumbnail() ) { 
                                          the_post_thumbnail();
                                        } 
                                ?></div>
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
                                       <?php the_excerpt(); ?>
                             <br>
                             <div class="weiterlesen"><a href="<?php the_permalink();?>"><button type="button" class="btn btn-primary"><i class="fa fa-hand-pointer-o"></i> weiterlesen</button></a></div><hr style: margin-top: 10px;></hr><br>
						<?php endwhile; else: ?>
						<p><?php _e('No posts by this author.'); ?></p>
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