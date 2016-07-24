  <?php
                  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                  $loopb = new WP_Query( array( 'post_type' => 'index','category_name' => 'maps','taxonomy'=>'maps','order' =>	'desc', 'posts_per_page' => 2, 'paged' => $paged ) ); ?>
                  <?php while ( $loopb->have_posts() ) : $loopb->the_post(); ?>

                    <!-- Anfang des Inhalts (Spalte 1) -->
                   <div class="container-fluid">
                       <div class="row">
                         <div class="col-md-6">
                           <h4><strong><?php the_title();?></strong></h4>
                           <img class="img-responsive" alt="produktbild" src="<?php the_field('produktbild');?>"/>
                         </div>
                         <!-- Zweite Spalte -->
                         <div class="col-md-6 inhaltsbereich-omsi">
                           <p><?php 	the_field('produktbeschreibung'); ?></p>
                           <h5>Erweiterungen/Add-ons</h5>
                           <div class="eingabe">
                             <?php the_field('erweiterungen'); ?>
                           </div>
                           <h5><strong>Downloads & Links</strong></h5>
                           <a target="_blank" class="btn btn-success" href="<?php the_field('downloadlink'); ?>" role="button">Jetzt herunterladen!</a> &nbsp;&nbsp;
                           <a target="_blank" class="btn btn-info" href="<?php the_field('quellen'); ?>" role="button">Weitere Informationen</a>
                         </div>
                       </div>
                       <hr>
                   </div>
                 <!-- Ende der Auflistung -->
                  <?php endwhile; ?>
                  <?php
                  if($loopb->max_num_pages>1){?>
                      <p class="navrechts">
                      <?php
                      for($i=1;$i<=$loopb->max_num_pages;$i++){?>
                          <a href="<?php echo '?paged=' . $i; ?>" <?php echo ($paged==$i)? 'class="selected"':'';?>><?php echo $i;?></a>
                          <?php
                      }
                      if($paged!=$loopb->max_num_pages){?>
                          <a href="<?php echo '?paged=' . $i; //next link ?>">></a>
                      <?php } ?>
                      </p>
                  <?php } ?>

            <?php wp_reset_postdata(); ?>
