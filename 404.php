<?php get_header(); ?>
	<div class="no-fluid">
		<div class="no-header">
			<h1 class="page-title"><?php _e( 'Es wurde nichts gefunden!', 'benjaminzekavica' ); ?></h1>
		</div>
	       <div class="no-wrapper">
               <div class="page-content">
                  <h2><?php _e( 'Was genau suchst du?', 'benjaminzekavica' ); ?></h2>
                  <p><?php _e( 'Ich kann dir gerne bei der Suche helfen. Schreibe das Suchbegriff einfach hier in diesem Suchfeld ein.', 'benjaminzekavica' ); ?></p>
               </div>   
           <div id="suchboxaufdernopage"><?php get_search_form() ?> </div>
               <div class="webseitebuttton"><a href="<?php bloginfo('url'); ?>"><button type="button" class="btn btn-success">Startseite besuchen</button></a></div>
           </div>
<?php get_footer(); ?>