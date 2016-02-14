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
                                    <h2>Kontaktieren Sie mich!</h2>
                                 </div>
                                  	<div class="map"><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d10092.6088683241!2d6.1092055!3d50.7727518!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x13acdd219ae4e236!2sBenjamin+Zekavica!5e0!3m2!1sde!2sde!4v1452289325252" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe></div>
                                  
                              <?php endwhile; endif; ?>
                           </article>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
        	<div class="row">
            	<div class="col-md-8 forms">
                	<h3>Schreiben Sie mich an!&nbsp;<i class="fa fa-envelope"></i></h3>
                    <div class="formular"><?php if (function_exists('iphorm')) echo iphorm(1); ?></div>
				</div>
                <div class="col-md-4 daten">
                	<h3>Hier befinde ich mich&nbsp;<i class="fa fa-map-marker icon-mapstamp"></i></h3>
                    <p style="margin-top:10px; font-size:16px; margin-bottom: -10px; ">Benjamin Zekavica<br>
                    Oranienstraße 12<br>
                    52066 Aachen <br></p>
				<p style="margin-top: 30px; font-size:16px;">E-Mail:&nbsp;<a href="mailto:info@benjamin-zekavica.de">info@benjamin-zekavica.de</a></p>
                </div>
            </div>
        </div>
    </article>
  <?php get_footer(); ?>