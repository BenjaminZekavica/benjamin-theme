<aside id="sidebar" role="complementary">
    <div id="sidebar-content">
        <?php if ( is_active_sidebar( 'sidebar' ) ) {
            dynamic_sidebar( 'sidebar' );
        } ?>
    </div>
</aside>