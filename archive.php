<?php get_header(); ?>    
    <article>
    	<div class="container">
        	<div class="row">
            	<div class="col-md-8"> 
                	<div class="content-seite">
				           <article>
                           <?php if (have_posts()) : ?>
                                <h2>Die Kategorie: <?php single_cat_title(); ?></h2><br>
                                <?php
                                $current_category = single_cat_title("", false);
                                $image = '/wp-content/uploads/images/' . strtolower(str_replace(' ', '-', $current_category)) . '.jpg';
                                if (file_exists(ABSPATH . $image)) {
                                echo '<img src="' . get_bloginfo('url') . $image . '" alt="' . $current_category . '" />';
                                }
                                ?>
                                <?php while (have_posts()) : the_post(); ?>
                                
                                <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">
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
                                <?php endwhile; ?>
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