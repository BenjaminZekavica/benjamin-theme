	<footer>
    <a href="#" class="scrollToTop"></a>
    	<div class="container-fluid footer">
        	<div class="row">
            	<div class="col-md-6">
                	<div class="copyright">
                    	&copy; Copyright <strong>2015-<?php echo date('Y'); ?></strong> by Benjamin Zekavica. Alle Rechte vorbehalten! <br>Webdesign und Webprogrammierung: <a href="http://www.benjamin-zekavica.de">Benjamin Zekavica</a>
                    </div>
                </div>
                <div class="col-md-6">
                	<div class="navigation-footer">
                    	<div class="menu-fo">
                        	<ul>
                            	<?php wp_nav_menu( array( 'theme_location' => 'footer-menu' ) ); ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <?php wp_footer(); ?>
    </body>
</html>