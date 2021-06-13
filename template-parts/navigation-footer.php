<nav class="footer__menu mega-menu">

    <?php $menuObject = glzr_rest_to_object('menu', 'header'); ?>


        <?php foreach ($menuObject as $key => $menuItem) {

            $id = "item-" . $menuItem->item_id;


            $children_attribute = ($menuItem->has_children)?"data-has-children=true":"";

            echo "<dt id='$id' $children_attribute class='footer-menu__item '>";

            if ($menuItem->has_children) {

                echo "<span href='$menuItem->url' class='is-hoverbox-black'>$menuItem->title</span>";

                echo "<ul data-menu-parent='$id' data-menu-level='1' class='mega-menu__list mega-menu__list--secondary has-white-background-color'>";

                foreach ($menuItem->children as $menuSecondaryItem) {

                    $id = "item-" . $menuSecondaryItem->item_id;
                    $children_attribute = ($menuSecondaryItem->has_children)?"data-has-children=true":"";

                    echo "<li id='$id' data-aos='fade-up' $children_attribute class='mega-menu__item'>";

                    if ($menuSecondaryItem->has_children) {

                        echo "<span href='$menuSecondaryItem->url' class='has-primary-hoverline'>$menuSecondaryItem->title</span>";

                        echo "<ul data-menu-level='2' data-menu-parent='$id' class='mega-menu__list mega-menu__list--tertiary has-light-grey-background-color'>";

                        foreach ($menuSecondaryItem->children as $menuTertiaryItem) {

                            echo "<li data-aos='fade-up' class='mega-menu__item mega-menu__item--tertiary'>";

                            switch ($menuTertiaryItem->post_type) {

                                case "post" :
                                    $post = get_post($menuTertiaryItem->ID);
                                    setup_postdata($post);
                                    get_template_part( 'template-parts/teaser-card', get_post_format(), array('small' => true, 'class' => 'mega-menu__teaser') );
                                    break;

                                default :
                                    echo "<a href='$menuTertiaryItem->url'>$menuTertiaryItem->title</a>";
                                    break;

                            }

                            echo "</li>";

//                                          "<a href='$menuTertiaryItem->url'>$menuTertiaryItem->title</a></li>";
                        }

                        echo "</ul>";

                    }

                    else {
                        echo "<a href='$menuSecondaryItem->url' class='has-primary-hoverline'>$menuSecondaryItem->title</a>";
                    }

                    echo "</li>";


                }

                echo "</ul>";

            }

            else {
                echo "<a href='$menuItem->url' class='is-hoverbox-black'>$menuItem->title</a>";
            }

            echo "</dt>";

        }  ?>

    </dl>

</nav>