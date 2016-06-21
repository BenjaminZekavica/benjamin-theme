<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<!DOCTYPE html>
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->  
<html <?php language_attributes(); ?> class="no-js">
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="Webdesigner und Programmierer des Themes" content="Benjamin Zekavica"/>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" /><meta charset="utf-8" />
    <link rel="icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico" type="<?php bloginfo('template_directory'); ?>/image/x-icon"/>
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Titillium+Web:400,700"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script type="text/javascript" src="<?php bloginfo("template_url"); ?>/js/animations.js"></script>
	<?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
  	<header id="menu">
       <div class="fixierter-header">
        <div class="container-fluid top-header">
            <div class="row">
                <div class="col-md-6">
                    <div class="top-header-links">
                        <div class="inhalt-header-links">
                            <i class="fa fa-envelope email-icon-header"></i><p>Kontaktieren Sie mich: <a class="header" href="mailto:info@benjamin-zekavica.de">info@benjamin-zekavica.de</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="top-header-rechts">
                         <div class="inhalt-header-rechts">
                                <p>Folgen Sie mir: </p>
                                <ul>
                                    <li><a href="http://www.facebook.com/benjamin.zekavica"><i class="fa fa-facebook-official 1"></i></a></li>
                                    <li><a href="https://plus.google.com/+BenjaminZekavicaAachen"><i class="fa fa-google-plus 2"></i></a></li>
                                    <li><a href="http://www.github.com/BenjaminZekavica"><i class="fa fa-github-alt 3"></i></a></li>
                                </ul>
                         </div>
                    </div>
                </div>
            </div> 
        </div>
      <div class="header">
      <div class="container-fluid top-menu">
      	 <div class="row">
        	<div class="col-md-4 logo-header">
            	<div class="logo"><a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_directory'); ?>/img/logo.svg" alt="Benjamin Zekavica Logo"></a></div>
            </div>
           <div class="col-md-8 logo-navigation">
            	<div class="navigation">
                	<div class="respon-men">Menü öffnen</div>
                	<nav>
                    	<ul id="navigation">
                        	  <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
                        </ul>
                    </nav>
                </div>
            </div>
         </div>
       </div>
      </div>
     </div>
   </header> 
