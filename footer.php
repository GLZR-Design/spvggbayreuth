
            </div>
            <!-- /wrapper -->


            <footer class="footer has-black-background-color">
            <section class="footer__sponsors mb-lg">
                <?php     get_template_part("template-parts/sponsors/glzr-block-sponsor-gallery", null, array(
                    "cat" => 'hauptsponsoren',
                    "grid-size" => '5'
                )); ?>
            </section>
			<div class="footer__menu">

                <nav class="sitemap">

                <?php

                $menuObject = glzr_rest_to_object('menu', 'footer');

                foreach ($menuObject as $menuColumn) {

                    echo "<dl class='sitemap__list'>";

                    echo "<dd class=' sitemap__title'>$menuColumn->title</dd>";

                    if ($menuColumn->has_children) {

                        foreach ($menuColumn->children as $menuItem) {

                            echo "<dt class='sitemap__item'><a href='$menuItem->url'>$menuItem->title</a></dt>";

                        }

                    }

                    echo "</dl>";

                } ?>

                </nav>

			</div>


			<div class="footer__meta mt-lg" role="contentinfo">

                <?php

                $menuArray = wp_get_nav_menu_items('meta');

                if (!empty($menuArray)) { ?>
                    <ul class="footer__meta-nav">
                <?php

                foreach ($menuArray as $item) { ?>
                    <li class="footer__meta-nav-item">
                        <a class="has-regular-font-size mx-xs" href="<?php echo $item->url?>"><?php echo $item->title ?></a>
                    </li>
                <?php } ?>

                    </ul>

                <?php } ?>

			</div>

                <div class="footer__social-media text-center mt-md">
                    <?php

                    $menuArray = wp_get_nav_menu_items('social-media');

                    foreach ($menuArray as $item) { ?>


                        <a class="has-subline-font-size mx-xs" href="<?php echo $item->url?>"><i class="fab fa-<?php echo $item->post_name ?>"></i></a>

                    <?php }

                    ?>
                </div>

                <!-- copyright -->
                <p class="copyright text-center mt-md has-small-font-size">
                    &copy; <?php echo esc_html( date( 'Y' ) ); ?> SpVgg Oberfranken Bayreuth</a>
                </p>

            </footer>
			<!-- /footer -->



		<?php wp_footer(); ?>

		<!-- analytics -->
		<script>
		(function(f,i,r,e,s,h,l){i['GoogleAnalyticsObject']=s;f[s]=f[s]||function(){
		(f[s].q=f[s].q||[]).push(arguments)},f[s].l=1*new Date();h=i.createElement(r),
		l=i.getElementsByTagName(r)[0];h.async=1;h.src=e;l.parentNode.insertBefore(h,l)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-XXXXXXXX-XX', 'yourdomain.com');
		ga('send', 'pageview');
		</script>

	<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

		<script>
$(function() {
  AOS.init();
});
		</script>

	</body>
</html>
