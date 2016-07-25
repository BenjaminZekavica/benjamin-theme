<?php get_header(); global $gp;

// Page header
ghostpool_page_header( get_the_ID() );

// Load page variables
ghostpool_loop_variables();

?>
<style>

.col-md-6.inhaltsbereich-omsi {
    margin-top: 57px;
}

</style>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<div id="gp-content-wrapper"<?php if ( $GLOBALS['ghostpool_layout'] != 'gp-fullwidth' ) { ?> class="gp-container"<?php } ?>>

		<div id="gp-content">

			<?php if ( isset( $GLOBALS['ghostpool_hub_header'] ) && $GLOBALS['ghostpool_hub_header'] == true ) { ?>
				<header class="gp-entry-header">
					<h1 class="gp-entry-title" itemprop="headline"><?php echo ghostpool_prefix_hub_title( get_the_ID() ); ?></h1>
				</header>
			<?php } ?>
			<div class="gp-entry-content gp-<?php if ( isset( $GLOBALS['ghostpool_image_alignment'] ) ) { echo sanitize_html_class( $GLOBALS['ghostpool_image_alignment'] ); } ?>">

				<div class="gp-entry-text" itemprop="text">
        <!-- Anfang Post -->
				<article class="listung">
					<h3><?php the_title();?></h3>
					<p>GamesAry indexiert nur diese folgenden <?php the_title(); ?></p>
						<ul class="omsi">
              <?php 
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $loopb = new WP_Query( array( 'post_type' => 'omsi_index','tax_query' => array( 'taxonomy' => 'omsi_index', 'terms' => 'omsi-maps', 'field' => 'slug' ); 'order' => 'desc', 'posts_per_page' => 3, 'paged' => $paged ) ); ?>
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
		<?php echo ghostpool_pagination( $loop->max_num_pages ); ?>
                <?php/* 
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
                <?php } */ ?>

          <?php wp_reset_postdata();  ?>






					</ul><!-- end .freelancer -->

				</article>
        <!-- Ende des Inhalts -->

			</div>
	</div>

		</div>

		<?php get_sidebar(); ?>

	</div>

<?php endwhile; endif; ?>

<?php get_footer(); ?>
